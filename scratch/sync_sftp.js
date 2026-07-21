const path = require('path');
const fs = require('fs');

// Load ssh2-sftp-client from scratch/node_modules
const Client = require(path.join(__dirname, 'node_modules', 'ssh2-sftp-client'));

// Load SFTP config
const sftpConfigPath = path.join(__dirname, '..', '.vscode', 'sftp.json');
const rawConfig = JSON.parse(fs.readFileSync(sftpConfigPath, 'utf8'));

const ignoreList = [
  '.git',
  '.vscode',
  'node_modules',
  'vendor',
  'scratch',
  'storage',
  'tests',
  '.env'
];

function shouldIgnore(relativePath) {
  return ignoreList.some(item => relativePath === item || relativePath.startsWith(item + '/') || relativePath.includes('/' + item + '/'));
}

function getAllFiles(dirPath, arrayOfFiles = [], rootPath = dirPath) {
  const files = fs.readdirSync(dirPath);

  files.forEach(file => {
    const fullPath = path.join(dirPath, file);
    const relPath = path.relative(rootPath, fullPath).replace(/\\/g, '/');

    if (shouldIgnore(relPath)) {
      return;
    }

    if (fs.statSync(fullPath).isDirectory()) {
      arrayOfFiles = getAllFiles(fullPath, arrayOfFiles, rootPath);
    } else {
      arrayOfFiles.push({ fullPath, relPath });
    }
  });

  return arrayOfFiles;
}

async function connectSFTP(sftpClient) {
  await sftpClient.connect({
    host: rawConfig.host,
    port: rawConfig.port || 22,
    username: rawConfig.username,
    password: rawConfig.password,
    readyTimeout: 30000,
    retries: 3
  });
}

async function sync() {
  const sftp = new Client();
  console.log(`📡 Connexion à ${rawConfig.host}:${rawConfig.port} en tant que ${rawConfig.username}...`);

  try {
    await connectSFTP(sftp);
    console.log('✅ Connecté avec succès au serveur SFTP !');

    const projectRoot = path.join(__dirname, '..');
    const filesToUpload = getAllFiles(projectRoot);
    const remoteBase = rawConfig.remotePath || 'www/';

    console.log(`📦 Début du téléversement de ${filesToUpload.length} fichiers vers ${remoteBase}...`);

    let uploadedCount = 0;
    const createdDirs = new Set();

    for (const item of filesToUpload) {
      const remoteFilePath = path.posix.join(remoteBase, item.relPath);
      const remoteDirPath = path.posix.dirname(remoteFilePath);

      let tries = 0;
      let success = false;

      while (tries < 3 && !success) {
        try {
          tries++;
          if (!createdDirs.has(remoteDirPath)) {
            await sftp.mkdir(remoteDirPath, true);
            createdDirs.add(remoteDirPath);
          }
          await sftp.fastPut(item.fullPath, remoteFilePath);
          uploadedCount++;
          success = true;
          
          if (uploadedCount % 15 === 0 || uploadedCount === filesToUpload.length) {
            console.log(` Progress: ${uploadedCount}/${filesToUpload.length} fichiers (dernier: ${item.relPath})`);
          }
        } catch (err) {
          console.warn(`⚠️ Essai ${tries} échoué pour ${item.relPath}: ${err.message}. Reconnexion...`);
          try {
            await sftp.end();
          } catch(e) {}
          await new Promise(r => setTimeout(r, 1000));
          try {
            await connectSFTP(sftp);
          } catch(e) {
            console.error('Reconnexion échouée:', e.message);
          }
        }
      }
    }

    console.log(`🎉 Synchronisation terminée ! ${uploadedCount}/${filesToUpload.length} fichiers téléversés avec succès sur ${rawConfig.host}:${remoteBase}`);
    await sftp.end();
  } catch (err) {
    console.error('❌ Erreur de connexion SFTP:', err.message);
  }
}

sync();

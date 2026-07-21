const fs = require('fs');
const path = require('path');

const partnersDir = path.join(__dirname, '..', 'public', 'images', 'partners');
if (!fs.existsSync(partnersDir)) {
    fs.mkdirSync(partnersDir, { recursive: true });
}

// Map of local target filename -> Wikimedia File Titles to try
const partnerFiles = [
    {
        name: 'gcf-logo',
        titles: ['File:Green Climate Fund logo.svg', 'File:Green Climate Fund.svg', 'File:Green_Climate_Fund_logo.png']
    },
    {
        name: 'undp-logo',
        titles: ['File:UNDP logo.svg', 'File:UNDP_logo_2022.svg', 'File:UNDP logo (2022).svg']
    },
    {
        name: 'worldbank-logo',
        titles: ['File:World Bank logo.svg', 'File:World Bank Group logo.svg', 'File:Logo The World Bank.svg']
    },
    {
        name: 'giz-logo',
        titles: ['File:Deutsche Gesellschaft für Internationale Zusammenarbeit Logo.svg', 'File:GIZ Logo.svg', 'File:GIZ-Logo.svg']
    },
    {
        name: 'unep-logo',
        titles: ['File:United Nations Environment Programme Logo.svg', 'File:UNEP logo.svg', 'File:UN Environment Programme logo.svg']
    }
];

const sleep = (ms) => new Promise(res => setTimeout(res, ms));

async function getWikimediaUrl(fileTitle) {
    const apiUrl = `https://commons.wikimedia.org/w/api.php?action=query&titles=${encodeURIComponent(fileTitle)}&prop=imageinfo&iiprop=url&format=json`;
    const res = await fetch(apiUrl, {
        headers: {
            'User-Agent': 'CCP-Site-App/1.0 (https://climatecatalystprize.org; contact@climatecatalystprize.org)'
        }
    });
    if (!res.ok) return null;
    const data = await res.json();
    const pages = data.query?.pages;
    if (!pages) return null;
    const pageId = Object.keys(pages)[0];
    if (pageId === '-1') return null; // Page not found
    const imageInfo = pages[pageId]?.imageinfo;
    if (imageInfo && imageInfo.length > 0) {
        return imageInfo[0].url;
    }
    return null;
}

async function downloadFile(url, destPath) {
    const res = await fetch(url, {
        headers: {
            'User-Agent': 'CCP-Site-App/1.0 (https://climatecatalystprize.org; contact@climatecatalystprize.org)'
        }
    });
    if (!res.ok) {
        throw new Error(`HTTP error! status: ${res.status}`);
    }
    const buffer = Buffer.from(await res.arrayBuffer());
    fs.writeFileSync(destPath, buffer);
}

async function main() {
    for (const item of partnerFiles) {
        console.log(`\n=== Finding logo for ${item.name} ===`);
        let downloaded = false;
        
        for (const title of item.titles) {
            try {
                console.log(`Checking Wikimedia title: ${title}...`);
                const directUrl = await getWikimediaUrl(title);
                if (directUrl) {
                    console.log(`Found direct URL: ${directUrl}`);
                    const ext = directUrl.endsWith('.png') ? '.png' : '.svg';
                    const targetSvgPath = path.join(partnersDir, `${item.name}.svg`);
                    const targetPngPath = path.join(partnersDir, `${item.name}.png`);
                    
                    const destPath = path.join(partnersDir, `${item.name}${ext}`);
                    await downloadFile(directUrl, destPath);
                    console.log(`SUCCESS downloaded ${item.name}${ext} (${fs.statSync(destPath).size} bytes)`);

                    // If we downloaded svg, also create a dummy/fallback or png copy if needed, or if png copy svg
                    if (ext === '.svg') {
                        // Also make sure .svg exists
                        fs.copyFileSync(destPath, targetSvgPath);
                    }
                    downloaded = true;
                    break;
                } else {
                    console.log(`Not found: ${title}`);
                }
            } catch (err) {
                console.error(`Error checking ${title}: ${err.message}`);
            }
            await sleep(500);
        }

        if (!downloaded) {
            console.error(`FAILED to find logo for ${item.name} on Wikimedia.`);
        }
        await sleep(1000);
    }

    console.log('\n--- Current files in partners directory ---');
    console.log(fs.readdirSync(partnersDir));
}

main().catch(err => console.error('Fatal main error:', err));

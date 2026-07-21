import urllib.request
import os

partners_dir = r'c:\Users\l\ccp-site\public\images\partners'
os.makedirs(partners_dir, exist_ok=True)

headers = {'User-Agent': 'CCP-Site-App/1.0 (https://climatecatalystprize.org; contact@climatecatalystprize.org)'}

urls = {
    'gcf-logo.svg': 'https://upload.wikimedia.org/wikipedia/en/e/eb/Green_Climate_Fund.svg',
    'undp-logo.svg': 'https://upload.wikimedia.org/wikipedia/commons/9/9f/UNDP_logo.svg',
    'worldbank-logo.svg': 'https://upload.wikimedia.org/wikipedia/commons/8/86/World_Bank_logo.svg',
    'giz-logo.svg': 'https://upload.wikimedia.org/wikipedia/commons/f/f4/Deutsche_Gesellschaft_f%C3%BCr_Internationale_Zusammenarbeit_Logo.svg',
    'unep-logo.svg': 'https://upload.wikimedia.org/wikipedia/commons/1/1d/United_Nations_Environment_Programme_Logo.svg'
}

for name, url in urls.items():
    filepath = os.path.join(partners_dir, name)
    try:
        req = urllib.request.Request(url, headers=headers)
        with urllib.request.urlopen(req) as response:
            data = response.read()
            # Clean leading NUL bytes or BOM/whitespace if present
            data = data.lstrip(b'\x00\r\n\t ')
            with open(filepath, 'wb') as out_file:
                out_file.write(data)
        print(f"Downloaded {name} successfully ({os.path.getsize(filepath)} bytes).")
    except Exception as e:
        print(f"Error downloading {name}: {e}")

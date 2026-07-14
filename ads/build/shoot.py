import json, subprocess, os, tempfile
from PIL import Image

BUILD = os.path.dirname(os.path.abspath(__file__))   # ads/build
ADS = os.path.dirname(BUILD)                          # ads
CRE = os.path.join(ADS, 'creatives')
EXP = os.path.join(ADS, 'exports')
os.makedirs(EXP, exist_ok=True)

CHROME = os.environ.get('CHROME', '/opt/pw-browsers/chromium-1194/chrome-linux/chrome')
m = json.load(open(os.path.join(BUILD, 'manifest.json')))

for c in m:
    w, h = c['w'], c['h']
    # Render in a window with extra height so Chromium honours the full layout,
    # then crop the top-left WxH region (the .ad sits at 0,0) for exact pixels.
    ww, wh = max(w, 400), h + 220
    tmp = tempfile.mktemp(suffix='.png')
    cmd = [CHROME, '--headless=new', '--no-sandbox', '--hide-scrollbars', '--disable-gpu',
           '--force-device-scale-factor=1', f'--window-size={ww},{wh}',
           '--virtual-time-budget=5000', f'--screenshot={tmp}',
           f'file://{CRE}/{c["file"]}.html']
    subprocess.run(cmd, capture_output=True)
    Image.open(tmp).convert('RGB').crop((0, 0, w, h)).save(f'{EXP}/{c["file"]}.png')
    os.remove(tmp)
    print(c['file'], '->', Image.open(f'{EXP}/{c["file"]}.png').size)
print('DONE')

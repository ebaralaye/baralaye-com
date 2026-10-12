import { spawnSync } from 'node:child_process';
import { fileURLToPath } from 'node:url';

const root = fileURLToPath(new URL('../', import.meta.url));
const base = fileURLToPath(new URL('../www/libs/', import.meta.url));
const result = spawnSync(process.execPath, [
  fileURLToPath(new URL('../node_modules/less/bin/lessc', import.meta.url)),
  '--math=always',
  '--source-map',
  `--source-map-basepath=${base}`,
  '--source-map-rootpath=../',
  'www/libs/less/index.less',
  'www/libs/css/index.css',
], { cwd: root, stdio: 'inherit' });
if (result.error) console.error(result.error.message);
process.exit(result.status ?? 1);

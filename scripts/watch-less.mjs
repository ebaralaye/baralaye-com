import { watch } from 'node:fs';
import { spawn } from 'node:child_process';
import { fileURLToPath } from 'node:url';

const root = fileURLToPath(new URL('../', import.meta.url));
let running = false;
let pending = false;
let timer;
let child;

function build() {
  if (running) {
    pending = true;
    return;
  }
  running = true;
  child = spawn(process.execPath, [process.env.npm_execpath, 'run', 'build'], {
    cwd: root,
    stdio: 'inherit',
  });
  child.on('error', (error) => {
    console.error(error.message);
    process.exit(1);
  });
  child.on('exit', (code) => {
    running = false;
    if (code !== 0) console.error('Build failed. Fix the Less file and save to retry.');
    if (pending) {
      pending = false;
      build();
    }
  });
}

const watcher = watch(new URL('../www/libs/', import.meta.url), { recursive: true }, (_event, filename) => {
  if (filename && !filename.endsWith('.less') && !(filename.endsWith('.css') && !/^css[\\/]/.test(filename))) return;
  clearTimeout(timer);
  timer = setTimeout(build, 150);
});
watcher.on('error', (error) => {
  console.error(error.message);
  process.exit(1);
});
for (const signal of ['SIGINT', 'SIGTERM']) {
  process.on(signal, () => {
    clearTimeout(timer);
    watcher.close();
    child?.kill(signal);
    process.exit(0);
  });
}
console.log('Watching Less sources and imported vendor styles. Press Control-C to stop.');
build();

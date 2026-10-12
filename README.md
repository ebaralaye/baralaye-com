# baralaye.com

PHP website with MySQL content and Less styles compiled to CSS.

## Development and live environments

Both remote environments are hosted on the same DigitalOcean Droplet, with
separate website folders, application settings, and MySQL databases.

| Environment | Website | Deployment branch | Application folder | Document root | Database |
| --- | --- | --- | --- | --- | --- |
| Development | `http://dev.baralaye.com` | `dev` | `/var/www/dev.baralaye.com` | `/var/www/dev.baralaye.com/www` | `dev_baralaye_com` |
| Live | `https://baralaye.com` | `master` | `/var/www/baralaye.com` | `/var/www/baralaye.com/www` | `baralaye_com` |

The server was last checked on October 12, 2026: PHP 5.3.10 and MySQL 5.5.37.
Local PHP 8.3 and MySQL 8.0 are newer, so successful local checks alone do not
establish server compatibility. Keep deployed PHP syntax compatible with the
remote runtime until it is upgraded, and verify SQL changes against the server's
MySQL version. The local Node build scripts run on the development computer;
the remote PHP runtime does not execute them.

### Website deployment

GitHub Actions runs the **Deploy website to droplet** workflow on pushes to
`dev` and `master`. A push to `dev` updates development; a push to `master`
updates the live site. The workflow can also be started manually from GitHub
Actions using the intended branch.

The workflow downloads the committed files, transfers them over SSH, then
checks `/cv` for a successful response containing “Curriculum Vitae”. Check the
workflow result and the affected pages after each deployment; the CV check does
not cover every route, image, or database change.

These paths are excluded from file deployment:

- `settings.php`: preserve each environment's server-specific settings.
- `database/`: SQL exports are not deployed or imported.
- `node_modules/`: installed build dependencies are not deployed.
- `.github/` and `.DS_Store`: workflow configuration and Mac metadata are excluded.

Build Less locally before committing style changes. Deployment transfers the
committed CSS; it does not run `npm ci` or compile Less on the server.

### Database updates and promotion

Code deployment does **not** synchronize MySQL content. Local, development,
and live databases must be updated separately.

1. Compare the local database with development and identify the intended record
   changes. Account for timestamp timezone differences when comparing exports.
2. Back up the development database before applying updates. Keep backups outside
   the public website folders and outside Git.
3. Apply the selected changes to `dev_baralaye_com`, verify the records, and review
   the affected pages on the development website.
4. After approval, compare against live and create a fresh live backup. Apply only
   the approved changes to `baralaye_com`; preserve unrelated live records.
5. Verify the live pages and retain the backup for recovery. Promote reviewed code
   to `master` separately when the update also requires code or image changes.

Prefer focused record updates over replacing an entire database. Do not import a
local dump directly into live without checking for newer or environment-specific
content. Database backups made during administration are kept in a private server
backup directory; confirm the specific backup path before each update.

### Access and private configuration

Server administration uses SSH key authentication. Obtain the server address,
SSH account details, private-key location, and database credentials through a
private channel. These access values are intentionally omitted from this
section. Store private keys outside the repository and protect them with a
passphrase.

Each remote environment has an existing, Git-ignored `settings.php`. It selects
its database using the site's hostname; command-line maintenance must set the
intended hostname explicitly rather than assuming the default connection points
to development. Never print or commit the database credentials.

GitHub Actions uses repository secrets for its deployment key and trusted SSH
host information. Manage these through GitHub's Actions secrets settings;
do not place their values in this README or committed scripts. Verify server
host keys when establishing SSH access.

## Local environment

The current Mac setup uses MAMP's installed server components directly. The
`start-local.command` and `stop-local.command` files control this custom setup;
they do not use MAMP PRO's Start/Stop buttons.

| Setting | Value |
| --- | --- |
| Website | `http://local.baralaye.com` |
| Document root | `<repo>/www` |
| PHP | MAMP PHP 8.3.30 with PDO MySQL |
| MySQL | MAMP MySQL 8.0, port `8889`, bound to `127.0.0.1` |
| Database | `baralaye_com_local` |
| MySQL socket | `/Applications/MAMP/tmp/mysql/mysql.sock` |
| Database files | `/Applications/MAMP/db/baralaye-local` |
| Apache configuration | `/Applications/MAMP/conf/baralaye-local/httpd.conf` |
| Apache PID | `/Applications/MAMP/conf/baralaye-local/httpd.pid` |
| Preview configuration | `/Applications/MAMP/conf/baralaye-local/httpd-preview.conf` (port `8888`) |
| Node | Node 24 LTS; exact version in `.nvmrc` |

The current checkout is at
`/Applications/MAMP/htdocs/baralaye-com`; its document root is
`/Applications/MAMP/htdocs/baralaye-com/www`.
Another Mac may use a different checkout path and username. The database,
`settings.php`, hosts entry, and Apache configuration are separate from Git.
Cloning this repository alone does not recreate them.

## Recreate the environment on another Mac

### 1. Install prerequisites and clone

Install MAMP with PHP 8.3 and MySQL 8.0, Node 24 LTS, Git, and Python 3
(the configuration-generation command below uses Python).
MAMP PRO is not required for this custom setup. These instructions expect
MAMP to be installed at `/Applications/MAMP`, including
`/Applications/MAMP/Library/bin/mysql80/bin/`.
If a newer MAMP release changes these paths, update the commands and launchers.

```sh
git clone --branch dev https://github.com/ebaralaye/baralaye-com.git
cd baralaye-com
npm ci
npm run build
```

Run the remaining setup commands from the repository root. Keep any existing
MAMP servers stopped during setup; the custom servers share their socket and
ports. Confirm Node is current with `node -v` and `npm -v`. If an older Node is
selected, correct your shell's PATH before installing or building dependencies.

### 2. Copy the content database

On the source Mac, export `baralaye_com_local` through phpMyAdmin's SQL Export
feature while MySQL is running. Transfer that export privately to the new Mac.
The database contains portfolio, exhibition, CV, news, and page content.
Use a fresh export if you want your latest edits, rather than an older backup.
Keep exports outside the repository (or in the ignored `database/` folder).

### 3. Create a separate local MySQL instance

These initialization commands are for a **new, empty** data directory. If
`/Applications/MAMP/db/baralaye-local` already contains an instance, preserve it
and skip initialization. Do not initialize over an existing database.

```sh
mkdir -p /Applications/MAMP/conf/baralaye-local /Applications/MAMP/db/baralaye-local
mkdir -p /Applications/MAMP/tmp/mysql

/Applications/MAMP/Library/bin/mysql80/bin/mysqld --no-defaults \
  --initialize-insecure \
  --basedir=/Applications/MAMP/Library/bin/mysql80 \
  --datadir=/Applications/MAMP/db/baralaye-local

/Applications/MAMP/Library/bin/mysql80/bin/mysqld --no-defaults \
  --basedir=/Applications/MAMP/Library/bin/mysql80 \
  --datadir=/Applications/MAMP/db/baralaye-local \
  --socket=/Applications/MAMP/tmp/mysql/mysql.sock \
  --port=8889 --bind-address=127.0.0.1 --mysqlx=OFF \
  --pid-file=/Applications/MAMP/conf/baralaye-local/mysql.pid \
  >>/Applications/MAMP/conf/baralaye-local/mysql.log 2>&1 &
```

Wait for the socket to appear. Initialization creates a root account without a
password; set its local password immediately. Open the MySQL prompt:

```sh
/Applications/MAMP/Library/bin/mysql80/bin/mysql --no-defaults \
  --socket=/Applications/MAMP/tmp/mysql/mysql.sock -u root
```

Enter the following SQL, replacing the password placeholder with your chosen
local password. This password is distinct from your Mac administrator password.

```sql
ALTER USER 'root'@'localhost' IDENTIFIED BY 'YOUR_LOCAL_PASSWORD';
CREATE DATABASE baralaye_com_local CHARACTER SET utf8mb4;
EXIT;
```

Import the export, substituting its actual path. `-p` asks for the password in
Terminal rather than including it in command arguments:

```sh
/Applications/MAMP/Library/bin/mysql80/bin/mysql --no-defaults \
  --socket=/Applications/MAMP/tmp/mysql/mysql.sock -u root -p \
  baralaye_com_local < "/absolute/path/to/local-database-export.sql"
```

### 4. Create local application settings

Create `settings.php` in the repository root. This file is ignored by Git.
Replace the password placeholder with the password chosen above:

```php
<?php
chdir(__DIR__);
set_include_path(__DIR__ . PATH_SEPARATOR . get_include_path());
function conf() {
    return array(
        'analytics' => false,
        'database' => array(
            'dsn' => 'mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=baralaye_com_local;charset=utf8mb4',
            'user' => 'root',
            'password' => 'YOUR_LOCAL_PASSWORD',
        ),
    );
}
```

The launchers prompt for the MySQL password, but PHP also needs the connection
password in this ignored settings file. Do not commit that file or use live
server credentials for the local instance.

### 5. Configure Apache for this checkout

MAMP's base Apache configuration and `/Applications/MAMP/fcgi-bin/php.fcgi`
provide the PHP handler. Check that the latter points to the installed PHP 8.3
runtime. The following generates separate custom configurations without editing
MAMP's original configuration. It uses the current Mac username and checkout
path, enables URL rewriting, and restricts requests to the local computer.

```sh
python3 - <<'PY'
from pathlib import Path
import getpass

repo = Path.cwd()
assert (repo / 'www/index.php').is_file(), 'Run from the repository root'
base = Path('/Applications/MAMP/conf/baralaye-local')
base.mkdir(parents=True, exist_ok=True)
conf = Path('/Applications/MAMP/conf/apache/httpd.conf').read_text()
conf = conf.replace('Listen 8888', 'Listen 127.0.0.1:80')
conf = conf.replace('User mamp', 'User ' + getpass.getuser())
conf = conf.replace('Group #-1', 'Group staff')
conf = conf.replace('#LoadModule rewrite_module', 'LoadModule rewrite_module')
conf = conf.replace('PidFile logs/httpd.pid', 'PidFile "' + str(base / 'httpd.pid') + '"')
conf += '''
<VirtualHost 127.0.0.1:80>
ServerName local.baralaye.com
DocumentRoot "{root}"
<Directory "{root}">
Options FollowSymLinks
AllowOverride All
Require local
</Directory>
</VirtualHost>
'''.format(root=repo / 'www')
(base / 'httpd.conf').write_text(conf)
(base / 'httpd-preview.conf').write_text(conf.replace('127.0.0.1:80', '127.0.0.1:8888'))
PY

/Applications/MAMP/Library/bin/httpd -t \
  -f /Applications/MAMP/conf/baralaye-local/httpd.conf
```

Expect `Syntax OK`. If MAMP's base configuration differs from the expected
version, inspect the generated file: its `Listen`, `User`, PHP handler,
`PidFile`, rewrite module, and virtual host must match this setup.
Moving the checkout later requires regenerating these configurations.

### 6. Add the local domain

Edit `/etc/hosts` with administrator privileges:

```sh
sudo nano /etc/hosts
```

Add this line if it is not already present:

```text
127.0.0.1 local.baralaye.com
```

### 7. Start and verify

Double-click `start-local.command`, or run from the repository root:

```sh
./start-local.command
```

It starts MySQL if needed, prompts for the local MySQL password to verify the
connection, and asks for your Mac administrator password to start Apache on port
80. Open `http://local.baralaye.com`, then check `/design`, `/sculpture`, and
`/cv` to verify database-backed content and styles.

To stop Apache and this custom MySQL instance:

```sh
./stop-local.command
```

The stop launcher requests passwords as needed. Avoid starting the MAMP GUI
servers at the same time as these custom servers.

## Database administration and troubleshooting

With the standard-port setup running, open
`http://local.baralaye.com/phpMyAdmin/` and select `baralaye_com_local`.
Use the local MySQL username and password if prompted.

For a temporary preview without administrator access to port 80:

```sh
/Applications/MAMP/Library/bin/httpd -k start \
  -f /Applications/MAMP/conf/baralaye-local/httpd-preview.conf
```

MySQL must already be running. Open `http://local.baralaye.com:8888/`;
phpMyAdmin is at `http://local.baralaye.com:8888/phpMyAdmin/`.
Stop the current Apache instance before switching between configurations.

Useful logs:

- Apache: `/Applications/MAMP/logs/apache_error.log`
- PHP: `/Applications/MAMP/logs/php_error.log`
- Custom MySQL: `/Applications/MAMP/conf/baralaye-local/mysql.log`

If the homepage reports a database connection error, check MySQL is running,
the socket exists, `settings.php` has the correct password, and the SQL export
was imported into `baralaye_com_local`. If pages show 404 responses, verify the
`www` document root, rewrite module, and `AllowOverride All` configuration.

## Responsive styling

The site uses Bootstrap as the foundation for responsive styling.
`www/libs/less/index.less` imports Bootstrap's Less sources from
`www/libs/vendor/bootstrap/less/bootstrap.less`, followed by the site's custom
Less files. Custom styles use Bootstrap grid mixins such as
`.make-sm-column()` and `.make-sm-column-offset()` for responsive layouts.

Edit the site's styles in `www/libs/less/`; the bundled Bootstrap sources are in
`www/libs/vendor/bootstrap/less/`. Both compile into `www/libs/css/index.css`
through the build commands below.

## Build styles locally

```sh
npm ci
npm run build
```

For automatic compilation while editing:

```sh
npm run watch
```

The watcher builds once at startup and rebuilds when Less files anywhere under
`www/libs/` or imported vendor CSS change. Press Control-C to stop it.
Compilation errors are shown in Terminal; save a corrected source file to retry.
A failed compile leaves the last working CSS intact.

Edit `www/libs/less/` and commit both the Less sources and generated
`www/libs/css/index.css` and `index.css.map`. The website serves the compiled CSS;
PHP/MySQL and the deployment server do not need Node installed.

The compiler uses `--math=always` to preserve the arithmetic behavior of the
existing Bootstrap and Less sources. Keep this setting until those expressions
are migrated and their output verified. The compiler reports a deprecation
warning for this compatibility setting; builds still succeed with the pinned
Less 4 version. `package-lock.json` records the dependency versions; use `npm ci`
on other computers for repeatable installs.

Installed `node_modules/` are ignored by Git. Gulp is no longer used.

## Search visibility and SEO

Production uses `https://baralaye.com` as its preferred origin. Apache redirects
production HTTP and `www` requests to that origin. Local and development hosts
are not redirected; they send `noindex,follow` through PHP and, when Apache's
headers module is enabled, for static files too. These directives prevent search
indexing; they do not provide authentication or privacy controls.

Public pages have canonical links. Work URLs use their stored category path and
name (or ID when no name exists); alternate ID routes point to the same canonical
URL. Tracking query parameters are omitted. Missing pages and missing database
records return HTTP 404 and `noindex`.

`/sitemap.xml` is generated from the current content database, using production
URLs, published work and news records, populated catalogs, and content pages.
Its image entries include existing large artwork files. It deliberately omits
invented update dates. The sitemap also receives `noindex` outside production.
`robots.txt` allows artwork crawling and advertises the production sitemap.

Catalog thumbnails use HTML images with descriptive alt text, matching the
previous cover-cropped layout. The first four thumbnails load eagerly; subsequent
thumbnails load lazily. Detail images use artwork titles and materials where
available. Update database titles, descriptions, image information, and categories
accurately; metadata and sitemap entries use that content automatically.

After deployment, verify the production property in Google Search Console,
submit `https://baralaye.com/sitemap.xml`, and use URL Inspection on representative
work and category pages. Monitor indexing, search queries, image-search traffic,
and clicks before judging results. Search Console account setup is separate from
this repository and is not performed by deployment.

Useful editorial follow-ups: original project descriptions, concise category
introductions, current exhibition/news entries, and links between works and their
exhibition pages. Keep collaborator and institution links accurate. Do not invent
project histories, reviews, or keyword-heavy text merely for search engines.

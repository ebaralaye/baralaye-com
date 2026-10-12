#!/bin/zsh

base=/Applications/MAMP/conf/baralaye-local
mysql_bin=/Applications/MAMP/Library/bin/mysql80/bin
socket=/Applications/MAMP/tmp/mysql/mysql.sock
httpd=/Applications/MAMP/Library/bin/httpd

if ! "$mysql_bin/mysqladmin" --no-defaults --socket="$socket" -u root ping >/dev/null 2>&1; then
  "$mysql_bin/mysqld" --no-defaults --basedir=/Applications/MAMP/Library/bin/mysql80 --datadir=/Applications/MAMP/db/baralaye-local --socket="$socket" --port=8889 --bind-address=127.0.0.1 --mysqlx=OFF --pid-file="$base/mysql.pid" >>"$base/mysql.log" 2>&1 &
  for attempt in {1..30}; do
    if "$mysql_bin/mysqladmin" --no-defaults --socket="$socket" -u root ping >/dev/null 2>&1; then
      break
    fi
    sleep 1
  done
fi

echo "Enter your local MySQL password to verify the site database connection."
if ! "$mysql_bin/mysql" --no-defaults --socket="$socket" -u root -p --database=baralaye_com_local -e 'SELECT 1;' >/dev/null; then
  echo "Database verification failed. The web server was not started."
  exit 1
fi

if [[ -f "$base/httpd.pid" ]]; then
  server_pid=$(cat "$base/httpd.pid")
  server_owner=$(ps -p "$server_pid" -o user= | tr -d ' ')
  if [[ "$server_owner" == root ]]; then
    sudo "$httpd" -k stop -f "$base/httpd.conf" || exit 1
  elif [[ -n "$server_owner" ]]; then
    "$httpd" -k stop -f "$base/httpd-preview.conf" || exit 1
  fi
  sleep 2
fi

sudo "$httpd" -k start -f "$base/httpd.conf" || exit 1
echo "Local site started: http://local.baralaye.com"

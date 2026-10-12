#!/bin/zsh

base=/Applications/MAMP/conf/baralaye-local
httpd=/Applications/MAMP/Library/bin/httpd
mysqladmin=/Applications/MAMP/Library/bin/mysql80/bin/mysqladmin
socket=/Applications/MAMP/tmp/mysql/mysql.sock
result=0

if [[ -f "$base/httpd.pid" ]]; then
  server_pid=$(cat "$base/httpd.pid")
  server_owner=$(ps -p "$server_pid" -o user= | tr -d ' ')
  if [[ "$server_owner" == root ]]; then
    sudo "$httpd" -k stop -f "$base/httpd.conf" || result=1
  elif [[ -n "$server_owner" ]]; then
    "$httpd" -k stop -f "$base/httpd-preview.conf" || result=1
  else
    echo "Web server is already stopped."
  fi
else
  echo "Web server is already stopped."
fi

if [[ -S "$socket" && -f "$base/mysql.pid" ]]; then
  echo "Stopping local MySQL. Enter its password when prompted."
  "$mysqladmin" --no-defaults --socket="$socket" -u root -p shutdown || result=1
else
  echo "Local MySQL is already stopped."
fi

if [[ "$result" == 0 ]]; then
  echo "Local servers stopped."
else
  echo "A server could not be stopped. Review the messages above."
fi
read -r "reply?Press Return to close. "
exit "$result"

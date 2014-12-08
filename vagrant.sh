#!/usr/bin/env bash

echo '--- Update repositories with apt ---'
apt-get update

echo '--- Installing build-essential screen git apache2 php5 vim nano ---'
apt-get install -y git apache2 php5 php5-cli php5-mcrypt libapache2-mod-php5 php5-curl php5-mysql php5-common vim nano screen build-essential

echo '--- Installing mysql ---'
debconf-set-selections <<< 'mysql-server mysql-server/root_password password Ye8grYm4god9ju7'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password Ye8grYm4god9ju7'
apt-get install -y mysql-server

echo '--- Installing composer ---'
if [[ ! -f /usr/local/bin/composer ]]; then
    curl -s https://getcomposer.org/installer | php
    # Make Composer available globally
    mv composer.phar /usr/local/bin/composer
else
    echo '[composer already installed]'
fi
echo '...done'

echo '--- Installing OpenSSL ---'
apt-get install -y openssl
echo '...done'

echo '--- Activating mod_rewrite and mod_php ---'
a2enmod rewrite
a2enmod php5
echo '...done'

sed -i 's/www-data/vagrant/' /etc/apache2/envvars
chown vagrant: /var/lock/apache2

echo '--- Changing the web root directory for Apache'
sed -i 's/\/var\/www/\/vagrant/' /etc/apache2/sites-available/default

echo '--- Reloading Apache ---'
service apache2 reload
echo '...done'

echo '--- Pulling the project from GitHub ---'

cd /var/www/
rm -f index.html
git init && git pull https://github.com/ryanwohara/madewithlove-todo.git
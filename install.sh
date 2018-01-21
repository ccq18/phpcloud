#!/usr/bin/env bash

php docker/install.php $*;
#docker run --rm -i -v $PWD:/www  ccq18/php-cli:7.1-v1 php /www/docker/install.php $*;
chmod -R 777 storage;
php -d memory_limit=1G  /usr/local/bin/composer install;
(
cd docker;
docker-compose  -p phpcloud  stop;
docker-compose -p phpcloud up --build -d;
docker system prune -f;
)
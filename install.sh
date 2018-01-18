#!/usr/bin/env bash
chmod -R 777 storage
php -d memory_limit=1G  /usr/local/bin/composer install
docker run --rm -it -v $PWD:/www  ccq18/php-cli:7.1-v1 php /www/docker/install.php $*;
(
cd docker;
docker-compose  -p phpcloud  stop;
docker-compose -p phpcloud up --build -d;
#docker system prune -f;
)
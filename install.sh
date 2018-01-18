#!/usr/bin/env bash
docker run --rm -it -v $PWD:/www  ccq18/php-cli:7.1-v1 php /www/docker/install.php $*;
#docker-compose  -p phpcloud  stop;
#docker-compose -p phpcloud up --build -d;
#docker system prune -f;
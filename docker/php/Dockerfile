FROM php:7.1-fpm-alpine
#RUN curl -L -o /tmp/go-pear.phar "http://pear.php.net/go-pear.phar" \
#    && php /tmp/go-pear.phar
#RUN pear config-set http_proxy http://172.16.4.46:1080

#RUN pecl install --force pdo_mysql \
#    && pecl install --force pdo_mysqli
#    && pecl install swoole \
#    && docker-php-ext-enable redis xdebug
COPY ext /tmp
ARG PHP_OTHER_EXT=""
ARG PHP_CORE_EXT=""
ARG PHP_INSTALL_GD="false"
RUN  cd /tmp && sh install.sh



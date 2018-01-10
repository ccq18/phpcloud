FROM php:7.1-cli-alpine
COPY ext /tmp
ARG PHP_OTHER_EXT=""
ARG PHP_CORE_EXT=""
ARG PHP_INSTALL_GD="false"
RUN  cd /tmp  &&  sh install.sh
#!/usr/bin/env sh

pwd=$(pwd)

#############  扩展安装  ##################
ext_install(){
    tar -xf "${1}.tgz";
    ls -al ${1}
    rm "${1}.tgz";
    echo ${1}
    docker-php-ext-configure ${1}
    docker-php-ext-install ${1}
}
if [ "$PHP_INSTALL_GD" = "true" ]; then
    apk update;
    apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev;
    docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/
    NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1)
    docker-php-ext-install -j${NPROC} gd;
    apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev;
fi

if [ -n "${PHP_CORE_EXT}" ]; then
    docker-php-ext-install  $PHP_CORE_EXT;
fi
if [ -n "${PHP_OTHER_EXT}" ]; then
    for ext in $PHP_OTHER_EXT
    do
        ext_install  $pwd/$ext;

    done
fi
#############  扩展安装  ##################

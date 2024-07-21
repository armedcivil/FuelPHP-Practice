FROM public.ecr.aws/amazonlinux/amazonlinux:2023.4.20240611.0

ENV PHP_VERSION=7.3.1

RUN dnf -y update
RUN dnf install -y tar gzip make gcc wget libxml2-devel bzip2-devel curl-devel readline-devel libxslt-devel less vim procps-ng perl-core

RUN wget https://www.openssl.org/source/openssl-1.1.1u.tar.gz
RUN tar -xzvf openssl-1.1.1u.tar.gz
WORKDIR /openssl-1.1.1u
RUN mkdir -p /root/lib/openssl
RUN ./config --prefix=/root/lib/openssl
RUN make
RUN make install
RUN echo "/root/lib/openssl/lib/" >> /etc/ld.so.conf.d/openssl-1.1.1u.conf
RUN ldconfig

WORKDIR /
RUN wget https://www.php.net/distributions/php-$PHP_VERSION.tar.gz
RUN tar -xzvf php-$PHP_VERSION.tar.gz 
RUN mv php-$PHP_VERSION php
WORKDIR /php
RUN ./configure --with-bz2 --enable-calendar --with-curl --enable-exif --enable-ftp --with-gettext --enable-mbstring --with-mysqli --with-mysqli=mysqlnd --with-pdo-mysql=mysqlnd  --enable-pcntl --with-pdo-mysql --disable-posix --with-readline --enable-sockets --enable-wddx --with-xmlrpc --with-xsl --with-zlib --enable-fpm --with-openssl=/root/lib/openssl/
RUN make install
COPY php-fpm.conf /usr/local/etc/php-fpm.conf
COPY www.conf /usr/local/etc/php-fpm.d/www.conf

WORKDIR /

RUN wget 'https://getcomposer.org/installer' -O 'composer-setup.php'
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN dnf install -y mariadb105 mariadb105-devel

WORKDIR /var/www

CMD [ "php-fpm" ]
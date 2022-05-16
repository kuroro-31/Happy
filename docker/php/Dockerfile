FROM php:8.0-fpm-alpine
RUN docker-php-ext-install pdo_mysql
COPY ./docker/php/php.ini /usr/local/etc/php/
 
# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
      && php -r "if (hash_file('SHA384', 'composer-setup.php') === trim(file_get_contents('https://composer.github.io/installer.sig'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
      && php composer-setup.php\
      && php -r "unlink('composer-setup.php');" \
      && mv composer.phar /usr/sbin/composer

COPY ./docker/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

WORKDIR /work/laravel
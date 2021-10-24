FROM php:7.4-fpm

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install --quiet --yes --no-install-recommends \
    supervisor \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql \
    && pecl install -o -f redis-5.1.1 \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/html

COPY .docker/php/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord"]

#RUN apt-get update && apt-get -y install cron
## Add crontab file in the cron directory
#ADD .docker/php/crontab /etc/cron.d/hello-cron
## Give execution rights on the cron job
#RUN chmod 0644 /etc/cron.d/hello-cron
## Apply cron job
#RUN crontab /etc/cron.d/hello-cron
## Create the log file to be able to run tail
#RUN touch /var/log/cron.log
ARG BASE_IMAGE_PULL_PATH="docker.io/"
ARG BASE_IMAGE_PHP_NAME="sohelrana820/php-apache"
ARG BASE_IMAGE_PHP_TAG="8.0.10-0"

FROM ${BASE_IMAGE_PULL_PATH}${BASE_IMAGE_PHP_NAME}:${BASE_IMAGE_PHP_TAG}

LABEL maintainer="Sohel Rana <me.sohelrana@gmail.com>"

# Setup docker arguments.
ARG APPLICATION_TIMEZONE="Asia/Riyadh"
ARG GID=1000
ARG UID=1000
ARG BUILD_MODE="prod"
ARG HTTP_PROXY=""
ARG HTTPS_PROXY=""
ARG NO_PROXY="localhost,127.0.0.1"

# Setup some enviornment variables.
ENV http_proxy="${HTTP_PROXY}" \
    https_proxy="${HTTPS_PROXY}" \
    no_proxy="${NO_PROXY}" \
    TZ="${APPLICATION_TIMEZONE}"

RUN echo "--- Set Timezone ---" \
        && echo "${APPLICATION_TIMEZONE}" > /etc/timezone \
        && rm /etc/localtime \
        && dpkg-reconfigure -f noninteractive tzdata \
    && echo "-- Install PHP Extensions --" \
        && if [ "${BUILD_MODE}" = "dev" ]; then \
            install-php-extensions \
                xdebug-3.0.2 \
        ;fi \
    && echo "RemoteIPHeader X-Forwarded-For\nRemoteIPTrustedProxy 10.10.18.188\n" >> /etc/apache2/apache2.conf \
    && a2enmod remoteip \
    && install-php-extensions gd

WORKDIR /var/www/html

COPY --chown=www-data:www-data ./composer.json ./composer.lock* /var/www/html/

RUN export composerInstallArgs="--no-interaction --no-scripts --no-autoloader --prefer-dist" \
    && if [ "${BUILD_MODE}" = "prod" ]; then \
        export composerInstallArgs="${composerInstallArgs} --no-dev" \
    ;fi \
    && composer install $composerInstallArgs

COPY --chown=www-data:www-data ./ /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && export composerDumpAutoloadArgs="-o" \
    && if [ "${BUILD_MODE}" = "prod" ]; then \
        export composerDumpAutoloadArgs="$composerDumpAutoloadArgs --classmap-authoritative" \
    ;fi \
    && composer dump-autoload $composerDumpAutoloadArgs \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R ugo+w /var/www/html/storage/

# Copy certs
COPY ./docker/.commons/certs/* /etc/ssl/certs/

# Unset proxy ENVs
RUN unset http_proxy \
    && unset https_proxy \
    && unset no_proxy

EXPOSE 80 443

CMD ["apache2-foreground"]

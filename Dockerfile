FROM debian:bullseye-slim

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends wget gnupg2 unzip curl cron \
    locales ca-certificates apt-transport-https default-mysql-client-core \
    default-jre-headless ca-certificates-java

RUN apt-get update -y && apt-get upgrade -y && apt-get install -y software-properties-common apt-transport-https curl

RUN curl -sSL https://packages.sury.org/php/README.txt | bash -x

RUN apt-get update -y && apt-get upgrade -y

RUN apt-get install php7.4 libapache2-mod-php7.4 php7.4-cli -y

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive \
    apt-get install -y --no-install-recommends \
        php7.4 \
#         php7.4-dev \
        php7.4-mysql \
        php7.4-gd \
        php7.4-xml \
        php7.4-mbstring \
        php7.4-curl \
        libapache2-mod-php7.4 \
        php7.4-intl \
        php7.4-soap \
        php7.4-zip \
        php7.4-ldap \
        default-mysql-client-core \
        apache2 && \
    update-alternatives --set php /usr/bin/php7.4 && \
        a2enmod php7.4 && \
        a2enmod rewrite && \
        a2enmod ssl

RUN chown -R www-data. /var/www/html

EXPOSE 80

ENTRYPOINT /usr/sbin/apache2ctl -D FOREGROUND
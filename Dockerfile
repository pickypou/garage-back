# Utilisation d'une image officielle PHP avec Apache pour Symfony
FROM php:8.1-apache

# Installation des dépendances nécessaires
RUN apt-get update \
    && apt-get install -qq -y --no-install-recommends \
    cron \
    vim \
    locales \
    coreutils \
    apt-utils \
    git \
    libicu-dev \
    g++ \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    libxslt-dev \
    && rm -rf /var/lib/apt/lists/*

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installation de Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Configuration des extensions PHP
RUN docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_mysql \
    mysqli \
    gd \
    opcache \
    intl \
    zip \
    calendar \
    dom \
    mbstring \
    xsl \
    && a2enmod rewrite

# Installation et activation de l'extension APCu
RUN pecl install apcu \
    && docker-php-ext-enable apcu

# Installation d'autres extensions PHP via un script externe
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions \
    && sync \
    && install-php-extensions amqp

# Copier le script de démarrage dans le conteneur
COPY docker-entrypoint.sh /usr/local/bin/
COPY . /var/www/html

# Donner les permissions d'exécution au script
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Définition du répertoire de travail
WORKDIR /var/www/html

# Exposition du port 8000 (à adapter si nécessaire)
EXPOSE 8000

ENTRYPOINT [ "sh", "/usr/local/bin/docker-entrypoint.sh" ]
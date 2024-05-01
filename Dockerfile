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

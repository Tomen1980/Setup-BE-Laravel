FROM composer AS composer_stage

FROM dunglas/frankenphp

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && install-php-extensions \
        pcntl \
        pdo_mysql \
        gd \
        intl \
        zip \
        redis \
        opcache
    # Add other PHP extensions here...

#install composer
COPY --from=composer_stage /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . /app

RUN composer install

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--server=frankenphp", "--host=0.0.0.0", "--port=8000", "--workers=8", "--max-requests=8" ]

FROM php:7.2-fpm

# COPY composer.lock & composer.json
COPY composer.lock composer.json /var/www/

# COPY package-lock.json & package.json
COPY package-lock.json package.json /var/www/

# Configure the root directory
WORKDIR /var/www

# Intallation dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    default-mysql-client \
    vim \
    git \
    libzip-dev \
    curl\
    gnupg

RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs

# Installing extensiones
RUN  apt-get install -y libmcrypt-dev \
    libmagickwand-dev --no-install-recommends \
    && pecl install mcrypt-1.0.2 \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install gd bcmath pdo_mysql zip mbstring exif pcntl \
    && docker-php-ext-enable mcrypt

# Instalar composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# clean cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy the codebase to /var/www
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# change the current user to www
USER www

# expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

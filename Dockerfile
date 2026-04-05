FROM php:8.2-cli

# install dependency system + node
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip unzip git curl \
    nodejs npm

# install PHP extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        pdo \
        pdo_pgsql \
        bcmath

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# copy project
COPY . .

# install backend
RUN composer install --no-dev --optimize-autoloader

# install frontend + build
RUN npm install
RUN npm run build

# DEBUG (biar yakin build ada)
RUN ls -la public/build && ls -la public/build/assets

# run Laravel (WAJIB pakai $PORT)
CMD php -S 0.0.0.0:$PORT -t public

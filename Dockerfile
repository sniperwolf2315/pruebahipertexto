FROM php:8.2-fpm

# Instalar dependencias necesarias
RUN apt-get update \
    && apt-get install -y libonig-dev


# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Instalar extensiones PHP
# RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd



# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar el contenido del proyecto
COPY . .

# Instalar dependencias de Composer
RUN composer install --no-scripts --no-autoloader && \
    composer dump-autoload && \
    composer install

# Asignar permisos de escritura al directorio de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto 9000 y ejecutar PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]

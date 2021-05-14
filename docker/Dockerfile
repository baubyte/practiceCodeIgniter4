FROM php:7.4-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    curl \
    g++ \
    git \
    libbz2-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg-dev \
    libonig-dev \
    libzip-dev \
    libmcrypt-dev \
    libpng-dev \
    libreadline-dev \
    sudo \
    unzip \
    zip

# Limpiar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#Permisos de reescritura
RUN a2enmod rewrite

# Instalar extensiones PHP
RUN docker-php-ext-install \
    bcmath \
    gd \
    bz2 \
    calendar \
    iconv \
    intl \
    mbstring \
    opcache \
    pdo_mysql \
    mysqli \
    zip

# Obtener la ultima version de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Agregamos Node 14 LTS
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -- \
    && apt-get install -y nodejs \
    && apt-get autoremove -y

# Necesitamos un usuario con el mismo UID / GID que el usuario host
# Entonces, cuando ejecutamos los comandos de CLI, todos los permisos y 
# la propiedad del archivo de host permanecen intactos.
# Los comandos de lo contrario desde el interior del contenedor 
# crearían archivos y directorios de propiedad de la raíz. 
ARG uid
RUN useradd -G www-data,root -u $uid -d /home/devbaubyte devbaubyte
RUN mkdir -p /home/devbaubyte/.composer && \
    chown -R devbaubyte:devbaubyte /home/devbaubyte

# Establecer directorio de trabajo
WORKDIR /var/www/

FROM php:8.2-fpm

LABEL version="1.0"
LABEL description="Imagem php8.2-fpm costumizada."
LABEL manintainer="Marcos Pachêco"
LABEL email="marcos.hr.pacheco@gmail.com"

# define o workdir
WORKDIR /var/www

# instala depêndencias
RUN apt-get update 
RUN apt-get install -y build-essential libxpm-dev libwebp-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev locales zip jpegoptim optipng pngquant gifsicle vim nano unzip git curl libzip-dev zlib1g-dev libicu-dev libgmp-dev libpq-dev libxml2-dev cron libmagickwand-dev libmagickcore-dev imagemagick iputils-ping
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-enable opcache
RUN docker-php-ext-configure gd --prefix=/usr --with-jpeg --with-webp --with-xpm --with-freetype
RUN docker-php-ext-install gd
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install bcmath exif pcntl zip calendar intl gmp pdo pdo_pgsql pgsql soap sockets

# limpa o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* 

# instala o composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# adiciona usuário
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# copia os dados do diretorio app para o workdir
COPY ./app /var/www/app

# copia as permissões atuais dos arquivos
COPY --chown=www:www ./app /var/www/app

# muda o usuário atual
USER www

# expõe a porta 9000 e inicia o servidor
EXPOSE 9000
CMD ["php-fpm"]

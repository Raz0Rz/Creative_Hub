FROM php:8.2-apache

# Устанавливаем драйвер PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Включаем mod_rewrite для Apache (для .htaccess)
RUN a2enmod rewrite

# Копируем проект
COPY . /var/www/html/

# Меняем порт на 10000 для Render
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:10000/g' /etc/apache2/sites-available/000-default.conf

EXPOSE 10000
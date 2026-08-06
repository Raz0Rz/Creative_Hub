FROM php:8.2-apache

# Копируем ВСЕ файлы и папки из вашего репозитория внутрь сервера
COPY . /var/www/html/

# Меняем порт на 10000 для Render
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:10000/g' /etc/apache2/sites-available/000-default.conf

EXPOSE 10000
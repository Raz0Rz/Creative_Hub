# Инструкция для Render скачать официальный образ PHP с Apache
FROM php:8.2-apache

# Скопировать все файлы из вашей папки внутрь сервера в папку для сайтов
COPY . /var/www/html/

# Поменять стандартный порт 80 на порт 10000, который требует Render
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:10000/g' /etc/apache2/sites-available/000-default.conf

# Сказать Render'у, что сервер будет работать на порту 10000
EXPOSE 10000
# Инструкция для Render скачать официальный образ PHP с Apache
FROM php:8.2-apache

# Создаем папки назначения (на всякий случай)
RUN mkdir -p /var/www/html/includes /var/www/html/Allstyle /var/www/html/images /var/www/html/database /var/www/html/handlers

# Копируем файлы и папки строго по очереди (гарантирует, что всё попадет куда надо)
COPY index.php /var/www/html/index.php
COPY About.php /var/www/html/About.php
COPY lk.php /var/www/html/lk.php
COPY services.php /var/www/html/services.php

COPY includes/ /var/www/html/includes/
COPY Allstyle/ /var/www/html/Allstyle/
COPY images/ /var/www/html/images/
COPY database/ /var/www/html/database/
COPY handlers/ /var/www/html/handlers/

# Поменять стандартный порт 80 на порт 10000, который требует Render
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:10000/g' /etc/apache2/sites-available/000-default.conf

# Сказать Render'у, что сервер будет работать на порту 10000
EXPOSE 10000
# Инструкция для Render скачать официальный образ PHP с Apache
FROM php:8.2-apache

# Копируем файлы и папки строго по очереди
COPY index.php /var/www/html/index.php
COPY About.php /var/www/html/About.php
COPY lk.php /var/www/html/lk.php
COPY services.php /var/www/html/services.php

# ВНИМАНИЕ: ЗАМЕНИЛИ includes НА inc
COPY inc/ /var/www/html/inc/
COPY Allstyle/ /var/www/html/Allstyle/
COPY images/ /var/www/html/images/
COPY database/ /var/www/html/database/
COPY handlers/ /var/www/html/handlers/

# Поменять стандартный порт 80 на порт 10000, который требует Render
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:10000/g' /etc/apache2/sites-available/000-default.conf

# Сказать Render'у, что сервер будет работать на порту 10000
EXPOSE 10000
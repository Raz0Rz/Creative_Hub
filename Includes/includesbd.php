<?php
// Параметры подключения
$host = 'localhost';     // Сервер БД (локально - localhost, на хостинге - другой адрес)
$port = '5432';          // Порт PostgreSQL (стандартный)
$dbname = 'creative_gub'; // Имя вашей базы данных
$user = 'postgres';       // Пользователь БД
$password = 'ваш_пароль'; // Пароль от БД

try {
    // Создаём объект подключения PDO
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    
    // Настройка: при ошибках выбрасывать исключения (а не молчать)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Если не подключились - показываем ошибку и убиваем скрипт
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>
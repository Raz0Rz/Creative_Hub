<?php
// Отключаем прямой вывод ошибок в ответ, но ловим их в логи
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Вычисляем корень проекта
$rootDir = dirname(__DIR__);

// Ищем файл конфигурации (поддерживает и .env, и bd.env)
$possibleEnvFiles = [$rootDir . '/.env', $rootDir . '/bd.env'];
$envPath = null;

foreach ($possibleEnvFiles as $file) {
    if (file_exists($file)) {
        $envPath = $file;
        break;
    }
}

// Задаем базовые значения по умолчанию (значения безопасности)
$host     = '127.0.0.1';
$port     = '5432';
$dbname   = 'creative_hub';
$user     = 'postgres';
$password = '';

if ($envPath) {
    $envContent = file_get_contents($envPath);
    $lines = preg_split('/\r\n|\r|\n/', $envContent);

    foreach ($lines as $line) {
        $line = trim($line);
        
        // Пропускаем пустые строки и комментарии
        if (empty($line) || $line[0] === '#' || strpos($line, '=') === false) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name  = trim($name);
        $value = trim($value);

        // Убираем внешние кавычки, сохраняя спецсимволы и точки в пароле
        if ((str_starts_with($value, '"') && str_ends_with($value, '"')) ||
            (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
            $value = substr($value, 1, -1);
        }

        switch (strtoupper($name)) {
            case 'DB_HOST':     $host = $value; break;
            case 'DB_PORT':     $port = $value; break;
            case 'DB_NAME':     $dbname = $value; break;
            case 'DB_USER':     $user = $value; break;
            case 'DB_PASSWORD':
            case 'DB_PASS':     $password = $value; break;
        }
    }
} else {
    error_log("Ошибка: Файл конфигурации .env не найден в $rootDir");
    
    if (!headers_sent()) {
        header('Content-Type: application/json; charset=utf-8');
    }
    echo json_encode([
        'success' => false,
        'errors' => ["Файл конфигурации (.env / bd.env) не найден на сервере."]
    ], JSON_UNESCAPED_UNICODE);
    exit();
}

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Ошибка подключения к БД: " . $e->getMessage());
    
    if (!headers_sent()) {
        header('Content-Type: application/json; charset=utf-8');
    }
    
    echo json_encode([
        'success' => false,
        'errors' => ['Ошибка подключения к базе данных. Попробуйте позже.']
    ], JSON_UNESCAPED_UNICODE);
    exit();
}
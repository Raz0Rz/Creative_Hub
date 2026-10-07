<?php
// Отключаем прямой вывод ошибок в ответ, но ловим их в логи
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Вычисляем корень проекта
$rootDir = dirname(__DIR__);

// ─────────────────────────────────────────────────────────────
// 1. СНАЧАЛА пробуем переменные окружения (продакшен на Render)
// ─────────────────────────────────────────────────────────────
$host     = getenv('DB_HOST')     ?: null;
$port     = getenv('DB_PORT')     ?: '5432';
$dbname   = getenv('DB_NAME')     ?: null;
$user     = getenv('DB_USER')     ?: null;
$password = getenv('DB_PASSWORD') ?: getenv('DB_PASS') ?: null;

// ─────────────────────────────────────────────────────────────
// 2. Если переменных нет — ищем файл .env / bd.env (локально)
// ─────────────────────────────────────────────────────────────
if (!$host || !$dbname || !$user || !$password) {
    $possibleEnvFiles = [$rootDir . '/.env', $rootDir . '/bd.env'];
    $envPath = null;

    foreach ($possibleEnvFiles as $file) {
        if (file_exists($file)) {
            $envPath = $file;
            break;
        }
    }

    if ($envPath) {
        $envContent = file_get_contents($envPath);
        $lines = preg_split('/\r\n|\r|\n/', $envContent);

        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line) || $line[0] === '#' || strpos($line, '=') === false) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name  = trim($name);
            $value = trim($value);

            // Убираем внешние кавычки
            if ((str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
                $value = substr($value, 1, -1);
            }

            switch (strtoupper($name)) {
                case 'DB_HOST':     $host     = $host     ?: $value; break;
                case 'DB_PORT':     $port     = $port     ?: $value; break;
                case 'DB_NAME':     $dbname   = $dbname   ?: $value; break;
                case 'DB_USER':     $user     = $user     ?: $value; break;
                case 'DB_PASSWORD':
                case 'DB_PASS':     $password = $password ?: $value; break;
            }
        }
    }
}

// ─────────────────────────────────────────────────────────────
// 3. Если всё ещё нет обязательных значений — ошибка
// ─────────────────────────────────────────────────────────────
if (!$host || !$dbname || !$user) {
    error_log("Ошибка: не найдены DB_HOST/DB_NAME/DB_USER ни в env, ни в .env");

    if (!headers_sent()) {
        header('Content-Type: application/json; charset=utf-8');
    }
    echo json_encode([
        'success' => false,
        'errors' => ["Конфигурация БД не найдена (ни в переменных окружения, ни в .env)."]
    ], JSON_UNESCAPED_UNICODE);
    exit();
}

// ─────────────────────────────────────────────────────────────
// 4. Подключение к PostgreSQL
// ─────────────────────────────────────────────────────────────
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
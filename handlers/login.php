<?php

require_once '../includes/includesbd.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'errors' => ['Неверный метод запроса']]);
    exit();
}

function isAlpha($str) {
    foreach (mb_str_split($str) as $char) {
        if (!preg_match('/^[\p{L}\s\-]$/u', $char)) {
            return false;
        }
    }
    return true;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$errors = [];

if (empty($email)) {
    $errors[] = 'Введите email';
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Введите корректный email';
}

if (empty($password)) {
    $errors[] = 'Введите пароль';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT id, email, firstname, lastname, password_hash FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['success' => false, 'errors' => ['Неверный email или пароль']]);
        exit();
    }
    if (!password_verify($password, $user['password_hash'])) {
        echo json_encode(['success' => false, 'errors' => ['Неверный email или пароль']]);
        exit();
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_firstname'] = $user['firstname'];
    $_SESSION['user_lastname'] = $user['lastname'];

    echo json_encode(['success' => true, 'redirect' => 'lk.php']);
} catch (PDOException $e) {
    error_log("Registration error: " . $e->getMessage());
    echo json_encode(['success' => false, 'errors' => ['Ошибка базы данных. Попробуйте позже.']]);
}

?>
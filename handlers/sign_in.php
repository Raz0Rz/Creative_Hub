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
$firstname = trim($_POST['firstname'] ?? '');
$lastname = trim($_POST['lastname'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';
$passwordRepeat = $_POST['password-repeat'] ?? '';
$agree = $_POST['agree'] ?? '';

$errors = [];

if (empty($email)) {
    $errors[] = 'Введите email';
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Введите корректный email';
}

if (empty($firstname)) {
    $errors[] = 'Введите имя';
} elseif (!isAlpha($firstname)){
    $errors[] = 'Имя должно содержать только буквы';
}

if(empty($lastname)){
    $errors[] = 'Введите фамилию';
} elseif(!isAlpha($lastname)){
    $errors[] = 'Фамилия должна содержать только буквы';
}

if (empty($password)) {
    $errors[] = 'Введите пароль';
} elseif (strlen($password) < 6) {
    $errors[] = 'Пароль должен быть не менее 6 символов';
}

if(empty($passwordRepeat)) {
    $errors[] = 'Повторите пароль';
}

if ($password !== $passwordRepeat) {
    $errors[] = 'Пароли не совпадают';
}

if (empty($phone)){
    $errors[] = 'Введите номер телефона';
}
else if (!preg_match('/^[\d\s\-\+\(\)]{7,}$/', $phone)) {
    $errors[] = 'Введите корректный номер телефона';
}

if (empty($agree)) {
    $errors[] = 'Необходимо согласиться с условиями';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if($stmt->fetch()){
        echo json_encode(['success' => false, 'errors' => ['Этот email уже зарегистрирован']]);
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, firstname, lastname, phone, password_hash, created_at) 
            VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$email, $firstname, $lastname, $phone, $hashedPassword])) {
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_email'] = $email;
        $_SESSION['user_firstname'] = $firstname;
        
        echo json_encode(['success' => true, 'redirect' => 'lk.php']);
    } else {
        echo json_encode(['success' => false, 'errors' => ['Ошибка при регистрации']]);
    }
} catch (PDOException $e) {
    error_log("Registration error: " . $e->getMessage());
    echo json_encode(['success' => false, 'errors' => ['Ошибка базы данных. Попробуйте позже.']]);
}

?>
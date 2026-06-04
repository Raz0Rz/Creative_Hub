<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Allstyle/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <div class="txtglav">
            <div class="name">
                <div class = "nametxt">
                    <p>Creative Hub</p>
                </div>
                <div class="blackstar">
                    <img src="./images/mini star.png" alt="">
                </div>
            </div>
            <div class="slogan">
                <p>Будущее творчества начинается здесь</p>
            </div>
        </div>
    </main>

    <?php include 'includes/log_sign.php'; ?>
    
    <script src="./Allstyle/script.js"></script>
</body>
</html>
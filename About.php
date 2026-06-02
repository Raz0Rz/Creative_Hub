<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Allstyle/style.css">
</head>
<body class="bodyAbout">
    <header>
        <div class="superheader">
            <div class="logobox">
                <a href="index.php" class = "logo"></a>
            </div>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="About.php" class="About">О нас</a>
                    </li>
                    <li>
                        <a href="services.php" class="">Услуги</a>
                    </li>
                    <li>
                        <a href="lk.php">Личный кабинет</a>
                    </li>
                    <li>
                        <a href="" class="reg-btn">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        
        <div class="about-slogan">
            <h2><span>Проникайте</span> в мир творчества вместе с нами: смотрите, создавайте, вдохновляйте.</h2>
        </div>

        <section class="plushki">
            <div class="plushka">
                <div class="pic">
                    <img src="./images/Paletka.png" alt="">
                </div>
                <p>Делитесь своим творчеством</p>
            </div>

            <div class="plushka">
                <div class="pic">
                    <img src="./images/kalend.png" alt="">
                </div>
                <p>Посещайте интересные мероприятия</p>
            </div>

            <div class="plushka">
                <div class="pic">
                    <img src="./images/hand.png" alt="">
                </div>
                <p>Ищите молодые таланты</p>
            </div>
        </section>

    </main>

    <div class="overlay"></div>
    <div class="registration">
        <button class="close-btn">×</button>
        <h2>Регистрация</h2>
        <form action="" method="POST">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="example@mail.ru">

            <label for="firstname">Имя</label>
            <input type="text" id="firstname" name="firstname" placeholder="Введите имя">

            <label for="lastname">Фамилия</label>
            <input type="text" id="lastname" name="lastname" placeholder="Введите фамилию">

            <label for="phone">Телефон</label>
            <input type="tel" id="phone" name="phone" placeholder="+7-978-777-77-77">

            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" placeholder="Введите пароль">
            
            <label for="password-repeat">Повтор пароля</label>
            <input type="password" id="password-repeat" name="password-repeat" placeholder="Повторите пароль">

            <div class="agreement">
                <label for="agree">
                <input type="checkbox" name="agree" id="agree">
                Согласен на обработку персональных данных
                </label>
            </div>

            <button type="submit" class="vxbut">Зарегистрироваться</button>
            <a href="">Уже есть аккаунт? Войдите.</a>
        </form>
    </div>

    <div class="enter">
        <button class="close-btn">×</button>
        <h2>Вход</h2>
        <form action="" method="POST">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="example@mail.ru">

            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" placeholder="Введите пароль">

            <button type="submit" class="vxbut">Войти</button>
            <a href="">Еще нет аккаунта? Зарегистрируйтесь.</a>
        </form>
    </div>

    <footer class="footer">
        <div class="foot">
            <ul class="footinf">
                <li>
                    <a href="">
                        <span><img src="./images/vk.png" alt="" class="imgfoot"></span>
                        <span class="txtf">ВКонтакте</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span><img src="./images/tg.png" alt="" class="imgfoot"></span>
                        <span class="txtf">Telegram</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span><img src="./images/inst.png" alt="" class="imgfoot"></span>
                        <span class="txtf">Instagram</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span><img src="./images/tiktok.png" alt="" class="imgfoot"></span>
                        <span class="txtf">TikTok</span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <script src="./Allstyle/script.js"></script>

</body>
</html>
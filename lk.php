<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Allstyle/style.css">
</head>
<body class="bodylkab">
        <header>
        <div class="superheader">
            <div class="logobox">
                <a href="index.php" class = "logo"></a>
            </div>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="About.php">О нас</a>
                    </li>
                    <li>
                        <a href="services.php">Услуги</a>
                    </li>
                    <li>
                        <a href="" class="Lkab">Личный кабинет</a>
                    </li>
                    <li>
                        <a href="" class="reg-btn">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="lk">
        <div class="plashka-prof">
            <h2>Профиль</h2>
            <p><strong>Алексей Пономарев</strong></p>
            <p>Вместе с нами с 10.05.2023</p>
            
            <ul class="profile-menu">
                <li class="prof-adverts">Мои объявления</li>
                <li class="prof-reviews">Мои отзывы</li>
                <li class="prof-settings">Настройки</li>
            </ul>
        </div>

        <div class="all-events">
            <div class="events">
                <h2 class="events-time">Предстоящие</h2>
                
                <div class="event-card">
                    <h3 class="event-title">Лофт «Квадрат»</h3>
                    <p class="event-description"><strong>Интенсивы по аналоговой фотографии: СЪЁМКА, ПРОЯВКА, ПЕЧАТЬ каждую субботу</strong></p>
                    <p class="event-location">Севастополь</p>
                    <p class="event-date">с 5 ноября по 24 декабря Повторяется</p>
                    <p class="event-status"><strong>Активно</strong></p>
                </div>
                
                
                <div class="event-card">
                    <h3 class="event-title">Галерея «Вертикаль»</h3>
                    <p class="event-description"><strong>Уличное искусство: от СКЕТЧА до МУРАЛА МАСТЕР-КЛАССЫ по четвергам</strong></p>
                    <p class="event-location">Севастополь</p>
                    <p class="event-date">с 15 октября по 30 ноября Повторяется</p>
                    <p class="event-status"><strong>Активно</strong></p>
                </div>
            </div>

            <div class="events">
                <h2 class="events-time">Посещенные</h2>
                
                <div class="event-card">
                    <h3 class="event-title">Коворкинг «Точка»</h3>
                    <p class="event-description"><strong>ЦИФРОВАЯ ИЛЛЮСТРАЦИЯ в Procreate интенсив для начинающих по средам</strong></p>
                    <p class="event-location">Севастополь</p>
                    <p class="event-date">с 8 сентября по 15 декабря Повторяется</p>
                    <p class="event-status"><strong>Посещено</strong></p>
                </div>

                
                <div class="event-card">
                    <h3 class="event-title">Кафе «Пауза»</h3>
                    <p class="event-description"><strong>Поэтические вечера современной русской поэзии LIVE-ВЫСТУПЛЕНИЯ каждый понедельник</strong></p>
                    <p class="event-location">Севастополь</p>
                    <p class="event-date">с 20 сентября по 27 декабря Повторяется</p>
                    <p class="event-status"><strong>Посещено</strong></p>
                </div>
            </div>
        </div>

    </main>

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
    <div class="overlay"></div>
    <script src="./Allstyle/script.js"></script>

</body>
</html>
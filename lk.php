<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Allstyle/style.css">
</head>
<body class="bodylkab">

    <?php include 'includes/header.php'; ?>

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
    
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/log_sign.php'; ?>
    
    <script src="./Allstyle/script.js"></script>

</body>
</html>
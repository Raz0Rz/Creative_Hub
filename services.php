<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Allstyle/style.css">
</head>
<body class="bodyAbout">
    <?php include 'includes/header.php'; ?>

    <main class="servicemain">

        <section class="txtservice">
            <h1>Реализуйте свои фантазии вместе с нами;)</h1>
        </section>
        <section class="categories">
            <div class="txtcategor"><h2>Категории</h2></div>
            <div class="categorobsh">
                <div class="contserv">
                    <a href="" class="obshbox">
                        <span class="boximgserv">
                            <div class="whiteboxserv">
                                <img src="./images/music.png" alt="" class="imservm">
                            </div>
                        </span>
                        <span class="txtservicon">Музыка</span>
                        <span><img src="./images/arrow.png" alt="" class="arrow"></span>
                    </a>
                    <div class="infunder">
                        <div class="lineserv"></div>
                        <div class="infcat">
                            <div>Концерты</div>
                            <div>Квартирники</div>
                            <div>Вечеринки</div>
                        </div>
                    </div>
                </div>
                <div class="contserv">
                    <a href="" class="obshboxp">
                        <span class="boximgserv">
                            <div class="whiteboxserv">
                                <img src="./images/paint.png" alt="" class="imservp">
                            </div>
                        </span>
                        <span class="txtServiconPaint">Искусство</span>
                        <span><img src="./images/arrow.png" alt="" class="arrow"></span>
                    </a>
                    <div class="infunder">
                        <div class="lineservp"></div>
                        <div class="infcat">
                            <div>Хобби и творчество</div>
                            <div>Выставки</div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="butt-obiavl-sec">
            <div class="boxbuttobiavl">
                <button class="butt-obiavl">
                    <div>Добавить объявление</div>
                </button>
            </div>
        </section>
        <section class="AddWindow">
            <button class="close-btn">×</button>
            <form action="" class="boxinf">
                <div class="ObshAdd">
                    <div class="infAdd">
                        <label for="">Категория мероприятия:</label>
                        <select name="categorymerop" id="categorymerop" required>
                            <option value="" selected disabled>Выберите категорию</option>
                            <option value="Music">Музыка</option>
                            <option value="Iskyss">Искусство</option>
                        </select>
                    </div>
                    <div class="infAdd">
                        <label for="">Место проведения:</label>
                        <input type="text" name="place" id="place" placeholder="Введите адрес" required>
                    </div>
                    <div class="infAdd">
                        <label for="">На сколько человек:</label>
                        <input type="number" name="kolpers" id="kolpers" placeholder="Введите кол-во человек" required>
                    </div>
                    <div class="infAdd">
                        <label for="">Краткое описание:</label>
                        <textarea name="opis" id="opis" placeholder="Расскажите о своём мероприятии!" required></textarea>
                    </div>
                </div>
                <div class="ObshAdd">
                    <div class="infAdd">
                        <label for="photos">Фото с места проведения:</label>
                        <div class="custom-file-input">
                            <input class="inputfile" type="file" id="photos" name="photos[]" 
                                multiple 
                                accept="image/jpeg, image/png, image/webp"
                                max="5" required>
                            <button type="button" class="file-btn">Выбрать файлы</button>
                            <div class="file-info">Файл не выбран</div>
                            <div class="file-list"></div>
                        </div>
                    </div>
                    <div class="infAdd">
                        <label for="">Вход:</label>
                        <select name="pricevx" id="pricevx" required>
                            <option value="" selected disabled>Платный/Бесплатный</option>
                            <option value="Pay">Платный</option>
                            <option value="Nopay">Бесплатный</option>
                        </select>
                    </div>
                    <div class="priceinf">
                        <div class="infAdd">
                            <label for="">Цена:</label>
                            <input type="number" name="price" id="price" placeholder="Введите цену входа" required>
                        </div>
                    </div>
                    <div class="buttAddbox">
                        <button class="buttAdd">Загрузить объявление</button>
                    </div>
                </div>
            </form>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/log_sign.php'; ?>
    
    <script src="./Allstyle/script.js"></script>
</body>
</html>
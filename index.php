<?php
session_start();//Запуск сессии для работы с базой данных
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Art Life - Фирма ландшафтного дизайна</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Подключение иконок-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--Панель навигации-->
<header class="header">
    <div class="container">
        <nav class="nav">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo/logo.png" alt="Art Life" class="logo-image">
                </a>
            </div>
            <ul class="nav-menu">
                <li><a href="about.html" class="nav-link">О нас</a></li>
                <li><a href="services.php" class="nav-link">Услуги</a></li>
                <li><a href="portfolio.php" class="nav-link">Портфолио</a></li>
                <li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="profile.php" class="nav-link">
                            <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION['user_login']); ?><!--Вывод логина пользователя после авторизации-->
                        </a>
                    <?php else: ?>
                        <a href="log.php" class="nav-link">Личный кабинет</a>
                    <?php endif; ?>
                </li>
            </ul>
            <!--Бургер меню-->
            <div class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </div>
            <ul class="burger-menu" id="burgerMenu">
                <li><a href="about.html" class="nav-link">О нас</a></li>
                <li><a href="services.php" class="nav-link">Услуги</a></li>
                <li><a href="portfolio.php" class="nav-link">Портфолио</a></li>
                <li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="profile.php" class="nav-link">
                            <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION['user_login']); ?>
                        </a>
                    <?php else: ?>
                        <a href="log.php" class="nav-link">Личный кабинет</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>

<!--Карточки услуг-->
<section class="services" id="services">
    <div class="container">
        <h2>Наши услуги</h2>
        <div class="services-grid">
            <div class="service-card">
                <i class="fas fa-tree"></i>
                <h3>Ландшафтный дизайн</h3>
                <p>Разработка концепции и дизайн-проекта участка</p>
            </div>
            <div class="service-card">
                <i class="fas fa-water"></i>
                <h3>Водные объекты</h3>
                <p>Проектирование прудов, фонтанов и водоемов</p>
            </div>
            <div class="service-card">
                <i class="fas fa-leaf"></i>
                <h3>Озеленение</h3>
                <p>Подбор растений и создание зеленых композиций</p>
            </div>
            <div class="service-card">
                <i class="fas fa-road"></i>
                <h3>Дорожки и мощение</h3>
                <p>Укладка покрытий и создание дорожек</p>
            </div>
            <div class="service-card">
                <i class="fas fa-lightbulb"></i>
                <h3>Ландшафтное освещение</h3>
                <p>Установка систем подсветки участка и сада</p>
            </div>
            <div class="service-card">
                <i class="fas fa-tint"></i>
                <h3>Автополив</h3>
                <p>Установка систем автоматического полива растений</p>
            </div>
        </div>
    </div>
</section>

<!--Карточки преимуществ-->
<section class="advantages">
    <div class="container">
        <h2>Почему выбирают нас</h2>
        <div class="advantages-grid">
            <div class="advantage-card">
                <i class="fas fa-hourglass-half"></i>
                <h3>10+ лет</h3>
                <p>Опыта работы в сфере ландшафтного дизайна</p>
            </div>
            <div class="advantage-card">
                <i class="fas fa-cart-arrow-down"></i>
                <h3>200+ проектов</h3>
                <p>Реализовано по всей России</p>
            </div>
            <div class="advantage-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Гарантия 3 года</h3>
                <p>На все виды работ</p>
            </div>
        </div>
    </div>
</section>

<!--Карточки проектов-->
<section class="margin" id="portfolio">
    <div class="container">
        <h2>Наши проекты</h2>
        <div class="portfolio-grid">
            <div class="portfolio-item" data-project="1">
                <img src="images/index/zag.jpg" alt="Загородный участок">
                <div class="portfolio-overlay">
                    <h3>Загородный участок</h3>
                    <p>Проект в стиле "кантри" на участке 15 соток</p>
                    <span class="btn-small">Подробнее</span>
                </div>
            </div>
            <div class="portfolio-item" data-project="2">
                <img src="images/index/city.jpeg" alt="Городской сквер">
                <div class="portfolio-overlay">
                    <h3>Городской сквер</h3>
                    <p>Общественное пространство с зонами отдыха</p>
                    <span class="btn-small">Подробнее</span>
                </div>
            </div>
            <div class="portfolio-item" data-project="3">
                <img src="images/index/jp.jpg" alt="Японский сад">
                <div class="portfolio-overlay">
                    <h3>Японский сад</h3>
                    <p>Аутентичный дизайн с элементами японской культуры</p>
                    <span class="btn-small">Подробнее</span>
                </div>
            </div>
            <div class="portfolio-item" data-project="4">
                <img src="images/index/alp.jpg" alt="Альпийская горка">
                <div class="portfolio-overlay">
                    <h3>Альпийская горка</h3>
                    <p>Ландшафтная композиция с альпийскими растениями</p>
                    <span class="btn-small">Подробнее</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="reviews">
    <div class="container">
        <h2>Отзывы наших клиентов</h2>
        <div class="reviews-grid">
            <?php
            require_once 'db.php';
            
            //Получение комментариев
            $result = mysqli_query($conn, "SELECT FIO, comment FROM users WHERE comment IS NOT NULL AND comment != '' ORDER BY id DESC LIMIT 6");
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="review-card">
                        <div class="review-header">
                            <i class="fas fa-user-circle"></i>
                            <strong><?php echo htmlspecialchars($row['FIO']); ?></strong>
                        </div>
                        <div class="review-text">
                            <p>"<?php echo nl2br(htmlspecialchars(substr($row['comment'], 0, 300))); ?><?php echo strlen($row['comment']) > 300 ? '...' : ''; ?>"</p>
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="no-reviews">Пока нет отзывов. Будьте первым, кто оставит отзыв в личном кабинете!</p>';
            }
            ?>
        </div>
    </div>
</section>

<!--Подвад сайта-->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Контакты</h4>
                <p>8-800-555-35-35</p>
                <p>artlife@mail.ru</p>
                <p>Москва, ул. Садовая, 15</p>
                <div style="margin-top: 15px;">
                    <a href="#" style="color: #64d894; margin-right: 15px; font-size: 24px;"><i class="fab fa-vk"></i></a>
                    <a href="#" style="color: #64d894; margin-right: 15px; font-size: 24px;"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Клиентам</h4>
                <ul class="footer-links">
                    <li><a href="services.php">Услуги</a></li>
                    <li><a href="portfolio.php">Портфолио</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Навигация</h4>
                <ul class="footer-links">
                    <li><a href="reg.php">Регистрация</a></li>
                    <li><a href="log.php">Авторизация</a></li>
                    <li><a href="profile.php">Личный кабинет</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--Подключение JavaScript-->
<script src=" js/main.js"></script>

</body>
</html>
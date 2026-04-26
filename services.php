<?php
session_start();
require_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Art Life - Услуги</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Услуги ландшафтного дизайна: разработка проектов, озеленение, автополив, ландшафтное освещение. Цены и примеры работ.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"><!--Подключение иконок-->
    <link rel="stylesheet" href="css/style_services.css">
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

<div class="content">
    <section class="services-page">
        <div class="container">
            <h1 class="services-page-title">Наши услуги</h1>
            <p class="services-page-subtitle">Профессиональные решения для вашего участка</p>
            
            <div class="services-grid">
                <?php
                // Массив иконок для каждой услуги
                $icons = [
                    'fas fa-tree',
                    'fas fa-water',
                    'fas fa-leaf',
                    'fas fa-road',
                    'fas fa-lightbulb',
                    'fas fa-tint',
                    'fas fa-seedling',
                    'fas fa-hard-hat'
                ];
                // Вывод услуг из бд
                $result = mysqli_query($conn, "SELECT * FROM services ORDER BY id ASC");
                $icon_index = 0;
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $icon = $icons[$icon_index % count($icons)];
                        $icon_index++;
                        ?>
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="<?php echo $icon; ?>"></i>
                            </div>
                            <h3 class="service-name"><?php echo htmlspecialchars($row['name']); ?></h3>
                            <p class="service-description"><?php echo htmlspecialchars($row['description']); ?></p>
                            <div class="service-price"><?php echo number_format($row['price'], 0, '', ' '); ?> ₽ <span>/ проект</span></div>
                            
                            <!--Заказ услуг только при авторизованном пользователе-->
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <button class="service-btn" onclick="alert('Наш менеджер свяжется с вами в ближайшее время.')">Заказать</button>
                            <?php else: ?>
                                <button class="service-btn" onclick="window.location.href='log.php'">Заказать</button>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p style="text-align: center; grid-column: span 3;">Услуги временно не добавлены</p>';
                }
                ?>
            </div>
        </div>
    </section>
</div>

<!--Подвал сайта-->
<footer class="footer">
    <div class="container">
        <div class="footer-content" style="grid-template-columns: repeat(3,fr);">
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
<script src="js/main.js"></script>

</body>
</html>
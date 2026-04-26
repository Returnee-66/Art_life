<?php
session_start();//Запуск сесссии
require_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Art Life - Портфолио</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style_portfolio.css">
</head>
<body>

<!--Панель управления-->
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

<!--Вывод проектов из базы данных-->
<div class="content">
    <div class="container1">
        <h1>Наши проекты</h1>
        <p>Реализованные работы студии ландшафтного дизайна Art Life</p>
        
        <table class="portfolio-table">
    <thead>
        <tr>
            <th>Фото</th>
            <th>Название проекта</th>
            <th>Стиль</th>
            <th>Стоимость (руб.)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM portfolio ORDER BY id ASC");
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $image_path = 'images/portfolio/' . $row['image'];
                if (!file_exists($image_path)) {
                    $image_path = 'images/placeholder.jpg';
                }
                ?>
                <tr>
                    <td data-label="Фото"><img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="portfolio-image"></td>
                    <td data-label="Название проекта"><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                    <td data-label="Стиль"><?php echo htmlspecialchars($row['style']); ?></td>
                    <td data-label="Стоимость" class="price"><?php echo number_format($row['price'], 0, '', ' '); ?> ₽</td>
                </tr>
                <?php
            }
            } 
            else {
                echo '<tr><td colspan="4" style="text-align: center; padding: 40px;">Нет проектов в портфолио</td></tr>';
            }
            ?>
    </tbody>
        </table>
    </div>
</div>

<!--Подвал сайта-->
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

<script src="js/main.js"></script>  

</body>
</html>
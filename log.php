<?php
session_start(); //Запуск сессии для работы с базой данных
if (isset($_SESSION['user_id'])) {//Если пользователь авторизован, переход на страницу профиля
    header('Location: profile.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Art Life - Авторизация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"><!--Подключение иконок-->
    <link rel="stylesheet" href="css/style_login.css">
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
                <li><a href="log.php" class="nav-link">Личный кабинет</a></li>
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
                <li><a href="log.php" class="nav-link">Личный кабинет</a></li>
            </ul>
        </nav>
    </div>
</header>

<!--Панель авторизации пользователя-->
<div class="content">
    <div class="container1">
        <h1>Авторизация</h1>
        <div id="messageBox" class="message-box"></div>
        <form id="loginForm" method="POST">
            <input type="text" name="login" id="login" placeholder="Логин" class="form-input" required><br><br>
            <input type="password" name="password" id="password" placeholder="Пароль" class="form-input" required><br><br>
            <button type="submit" class="btn">Вход</button><br><br>
            <a href="reg.php">Нет аккаунта? Зарегистрируйтесь!</a><!--Переход на панель регистрации-->
        </form>
    </div>
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
<script src="js/js_login.js"></script>
</body>
</html>
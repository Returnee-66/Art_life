<?php
session_start();//Запуск сессии для работы с базой данных
if (!isset($_SESSION['user_id'])) {
    header('Location: log.php');
    exit;
}

require_once 'db.php';

//Обработка отправки комментария
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_comment'])) {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $user_id = $_SESSION['user_id'];
    
    mysqli_query($conn, "UPDATE users SET comment = '$comment' WHERE id = $user_id");
    
    //Обновление комментариев в сессии
    $_SESSION['user_comment'] = $comment;
    
    header('Location: profile.php?msg=success');
    exit;
}

//Получение комментариев пользователя из БД
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT comment FROM users WHERE id = $user_id");
$user_data = mysqli_fetch_assoc($result);
$user_comment = $user_data['comment'] ?? '';
$_SESSION['user_comment'] = $user_comment;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Art Life - Личный кабинет</title>
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
                    <img src="images/logo/logo.png" alt="Art Life Logo" class="logo-image">
                </a>
            </div>
            <ul class="nav-menu">
                <li><a href="about.html" class="nav-link">О нас</a></li>
                <li><a href="services.php" class="nav-link">Услуги</a></li>
                <li><a href="portfolio.php" class="nav-link">Портфолио</a></li>
                <li><a href="profile.php" class="nav-link">Личный кабинет</a></li>
            </ul>
            <div class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </div>
            <ul class="burger-menu" id="burgerMenu">
                <li><a href="about.html" class="nav-link">О нас</a></li>
                <li><a href="services.php" class="nav-link">Услуги</a></li>
                <li><a href="portfolio.php" class="nav-link">Портфолио</a></li>
                <li><a href="profile.php" class="nav-link">Личный кабинет</a></li>
            </ul>
        </nav>
    </div>
</header>

<!--Вывод логина пользователя после авторизации-->
<section class="margin">
    <div class="container1">
        <h1>Личный кабинет</h1>
        <p>Добро пожаловать, <strong><?php echo $_SESSION['user_fio']; ?></strong>!</p>
        <p>Логин: <?php echo $_SESSION['user_login']; ?></p>
         <!--Блок комментария-->
         <div class="comment-section">
            <h3>Отзыв о компании</h3>
            
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
                <div class="success-msg">Комментарий сохранен</div>
            <?php endif; ?>
            
            <form method="POST">
                <textarea name="comment" class="comment-textarea" rows="4" placeholder="Напишите ваш отзыв о нашей работе..."></textarea><br>
                <button type="submit" name="save_comment" class="btn">Сохранить комментарий</button>
            </form>
            
            <?php if (!empty($user_comment)): ?>
                <div class="current-comment">
                    <p><strong>Ваш текущий отзыв:</strong></p>
                    <p><?php echo nl2br(htmlspecialchars($user_comment)); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <p><a href="logout.php" class="btn">Выйти</a></p>
    </div>
</section>

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

<script src=" js/main.js"></script>
</body>
</html>
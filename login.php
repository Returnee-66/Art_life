<?php
session_start();//Запуск сессии для работы с базой данных
require_once 'db.php';//Получение данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//Поиск пользователя по логину и паролю
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        die("Ошибка SQL: " . mysqli_error($conn));
    }
    
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_login'] = $user['login'];
        $_SESSION['user_fio'] = $user['FIO'];
        
        header('Location: profile.php');//Переход на профиль при успешной авторизации
        exit;
    } else {
        echo "Пользователь не найден.";
        exit;
    }
} else {
    echo "Нет POST-запроса. Перенаправляем на log.php";
    header('Location: log.php');
    exit;
}
?>

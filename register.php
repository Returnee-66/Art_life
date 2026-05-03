<?php
session_start();//Запуск сессии для работы с базой данных
require_once 'db.php';//Получение данных
if ($_SERVER['REQUEST_METHOD'] === 'POST') {//Заполнение полей пользователя для его добавления в базу данных
    $fio = mysqli_real_escape_string($conn, $_POST['fio']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);

    $check = mysqli_query($conn, "SELECT id FROM users WHERE login = '$login'");
    if (mysqli_num_rows($check) > 0) {
        die('Пользователь с таким логином уже существует. <a href="reg.php">Назад</a>');//Определение существования пользователя с таким же логином
    }
    
    $sql = "INSERT INTO users (FIO, login, password, City, Street_house) 
            VALUES ('$fio', '$login', '$password', '$city', '$street')"; //Добавление пользователя в базу данных
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['user_login'] = $login;
        $_SESSION['user_fio'] = $fio;
        
        header('Location: log.php');//Возвращение на окно авторизации
        exit;
    } else {
        echo 'Ошибка: ' . mysqli_error($conn);
    }
} else {
    header('Location: reg.php');
    exit;
}
?>

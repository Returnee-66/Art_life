<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'art_life';

$conn = mysqli_connect($host, $user, $pass, $dbname);//Подключение к базе с помощью переменных

if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());//Ошибка подключения
}

mysqli_set_charset($conn, 'utf8');
?>

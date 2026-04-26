<?php
session_start();
session_destroy();//Окончание сессиии
header('Location: log.php');//Переход на авторизацию
exit;
?>
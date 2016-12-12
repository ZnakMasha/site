<?php
if($_POST)
{
    require_once "classes/SendMailSmtpClass.php"; // подключаем класс
    require_once "database.php";

    define('MYSQL_TABLE', 'call_back');

    $conn = db_connect();
    insertRequest($conn, $_POST['inputUserName'], $_POST['inputUserPhone'], MYSQL_TABLE);

   

   echo('Скрипт сработал');
}
?>
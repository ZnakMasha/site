<?php
/**
 * Created by IntelliJ IDEA.
 * User: linoge
 * Date: 9/6/16
 * Time: 12:32 PM
 */
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'mydb');

$con = mysql_connect(MYSQL_SERVER,'MYSQL_USER', 'root', MYSQL_PASSWORD) or die(mysql_error());
mysql_select_db(MYSQL_DB) or die("Cannot select DB");

function db_connect(){
    $mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

    /* проверка соединения */
    if (mysqli_connect_errno()) {
        printf("Не удалось подключиться: %s\n", mysqli_connect_error());
        exit();
    }

    /* изменение набора символов на utf8 */
    if (!$mysqli->set_charset("utf8")) {
        printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    } else {
        printf("Текущий набор символов: %s\n", $mysqli->character_set_name());
    }

    return $mysqli;
}

function insertRequest($conn, $name, $number, $tablename, $email, $message){
    // prepare and bind
    $date = date('l jS \of F Y h:i:s A');
    $state = 0;

    if($tablename == "call_back"){
        $stmt = $conn->prepare("INSERT INTO $tablename (name, phone_number, time, state) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $number, $date, $state);
    }
    else{
        $stmt = $conn->prepare("INSERT INTO $tablename (name, phone_number, email, message, time, state) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $name, $number, $email, $message, $date, $state);
    }


    $stmt->execute();
    $stmt->close();
    $conn->close();
}

?>
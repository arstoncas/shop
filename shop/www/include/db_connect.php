<?php
$link = new mysqli('localhost', 'admin', '120101', 'db_shop');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} 
mysqli_set_charset($link, "UTF-8");
?>
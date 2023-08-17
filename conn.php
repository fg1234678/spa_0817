<?php

//這是資料庫的範例


$serverName = "localhost";
$user = "root";
$password = "";
$dbName = "js_09";
$result = "";

$conn = new mysqli($serverName, $user, $password, $dbName);


mysqli_query($conn, 'SET NAMES utf8');
?>
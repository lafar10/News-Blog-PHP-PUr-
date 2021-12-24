<?php


$host = "localhost";
$user_name = "root";
$password = "";
$database_name = "blog";

$con = mysqli_connect($host, $user_name, $password, $database_name);

if (!$con) {
    header('Location: ../errors/error.php');
    exit(0);
}

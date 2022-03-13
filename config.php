<?php

$dsn = "mysql:host=localhost;dbname=";
$user = "";
$password = "";
try{
    $con = new PDO($dsn, $user, $password);
} catch (PDOException $e){
    echo "error" . $e->getMessage();
}
if(!$con){
    echo mysqli_connect_error();
}
ini_set('display_errors',1);
error_reporting(E_ALL);?>
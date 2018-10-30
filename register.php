<?php 

session_start();

error_reporting(E_ERROR | E_WARNING | E_NOTICE);
ini_set('display_errors' , 1);

include ("functions.php");


//Code needed to connect to correct RMQ queue?


$user = $_GET[ "user" ];
$email = $_GET[ "email" ];
$password = $_GET[ "password" ];



$servername = "localhost";
$username = "490admin";
$password = "admin";
$db = "IT490";


$conn = new mysqli($servername, $username, $password, $db);
$result  = $conn -> query("INSERT INTO accounts (user, email,password) VALUES ('$user', '$email', '$password')");
redirect("Registration successful", "index.html");







?>

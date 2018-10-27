<?php 

session_start();

error_reporting(E_ERROR | E_WARNING | E_NOTICE);
ini_set('display_errors' , 1);

include ("functions.php");


//Code needed to connect to correct RMQ queue?


$user = $_GET[ "user" ];
$email = $_GET[ "email" ];
$password = $_GET[ "password" ];




reg_chk ($user, $email, $password);
register ($user, $email, $password);







?>

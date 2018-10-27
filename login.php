<?php

session_start();

error_reporting(E_ERROR | E_WARNING | E_NOTICE);
ini_set('display_errors' , 1);

include ("functions.php");


//Code needed to connect to correct RMQ queue?


//INPUT from index.html
$user = $_GET[  "user" ];
$password = $_GET[ "password" ];



login_chk($user , $password);





?>

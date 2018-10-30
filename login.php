<?php
session_start();
//error_reporting(E_ERROR | E_WARNING | E_NOTICE);
//ini_set('display_errors' , 1);

//Code needed to connect to correct RMQ queue?

include ("functions.php");

//INPUT from index.html
$user = $_GET[  "user" ];
$password = $_GET[ "password" ];

if ($_GET["user"] == "" or $_GET["password"] == ""){ redirect ("Missing fields", "index.html");}

$servername = "localhost";
$username = "490admin";
$pass = "admin";
$db = "IT490";


$conn = new mysqli($servername, $username, $pass, $db);
$result  = $conn -> query("SELECT * FROM accounts WHERE user = '$user'");

$work = $result -> fetch_assoc(); 


//if ($work["user"] == $user){
//	if ($work ["password"] == $password){ echo "Login successful";}
//	if ($work ["password"] != $password){ echo  "Incorrect password";}
//	}
//if ($work["user"] != $user){echo "User not found";}


if ($work["user"] == $user and $work["password"] == $password) {
	redirect("Login successful","search.html");
}elseif ($work["user"] == $user and $work["password"] != $password){
	redirect("Incorrect password", "index.html");
}else{
	redirect("User not found", "index.html");
}


?>

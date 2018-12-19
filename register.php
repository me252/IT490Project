<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_NOTICE);
ini_set('display_errors' , 1);
include ("functions.php");
//Code needed to connect to correct RMQ queue?
$user = $_POST[ "user" ];
$email = $_POST[ "email" ];
$password = $_POST[ "password" ];
$DB_USERNAME = 'admin';
$DB_PASSWORD ='admin';
$DB_HOST ='192.168.1.3';
$DB_DATABASE = 'EP';
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
if (mysqli_connect_error()) {
	$DB_USERNAME = 'admin';
	$DB_PASSWORD ='admin';
	$DB_HOST = '192.168.1.33';
	$DB_DATABASE = 'EP';
	$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
	if (mysqli_connect_error()) {
        	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
	}

}
echo 'Connected successfully.';
//$servername = "localhost";
//$username = "490admin";
//$pass = "admin";
//$db = "IT490";
//$conn = new mysqli($servername, $username, $pass, $db);
$result  = $conn -> query("INSERT INTO accounts (user, email,password) VALUES ('$user', '$email', '$password')");
$log_w = fopen("user_log.txt", "a");
$t_stamp =  date("Y-m-d h:i:sa");
$log_entry = $user . "   REG @  " . $t_stamp . "  SUCCESS " . " \n";
fwrite($log_w , $log_entry);
fclose($log_w); 

redirect("Registration successful", "index.html");
$mysqli->close();
?>

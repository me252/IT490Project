<?php
session_start();
//error_reporting(E_ERROR | E_WARNING | E_NOTICE);
//ini_set('display_errors' , 1);
//Code needed to connect to correct RMQ queue?
include ("functions.php");
//INPUT from index.html
$user = $_POST[  "user" ];
$password = $_POST[ "password" ];
if ($user == "" or $password == ""){ redirect ("Missing fields", "index.html");}
$DB_USERNAME = 'admin';
$DB_PASSWORD ='admin';
$DB_HOST = '192.168.1.3';
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
$result  = $conn -> query("SELECT * FROM accounts WHERE user = '$user'");
$work = $result -> fetch_assoc();
// if ($work["user"] == $user){
// 	if ($work ["password"] == $password){ echo "Login successful";}
// 	if ($work ["password"] != $password){ echo  "Incorrect password";}
// 	}
// if ($work["user"] != $user){echo "User not found";}
if ($work["user"] == $user and $work["password"] == $password) {
	$log_w = fopen("user_log.txt", "a");
        $t_stamp =  date("Y-m-d h:i:sa");
        $log_entry = $user . "   LOGON @  " . $t_stamp . "  SUCCESS " . " \n";
        fwrite($log_w , $log_entry);
        fclose($log_w); 
	redirect("Login successful","search.html?user=" . $user);
}elseif ($work["user"] == $user and $work["password"] != $password){
	$log_w = fopen("user_log.txt", "a");
        $t_stamp =  date("Y-m-d h:i:sa");
        $log_entry = $user . "   LOGON @  " . $t_stamp . "  FAILED: BAD PASS " . " \n";
        fwrite($log_w , $log_entry);
        fclose($log_w); 
	redirect("LOGIN ERROR: PLEASE TRY AGAIN", "index.html");
}else{
	$log_w = fopen("user_log.txt", "a");
        $t_stamp =  date("Y-m-d h:i:sa");
        $log_entry = $user . "   LOGON @  " . $t_stamp . "  FAILED: USER NOT FOUND " . "\n";
        fwrite($log_w , $log_entry);
        fclose($log_w); 
	redirect("LOGIN ERROR: PLEASE TRY AGAIN", "index.html");
}
$mysqli->close();
?>

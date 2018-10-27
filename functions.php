<?php


function redirect($note, $url){
	echo $note;
	header( "refresh: 2; url = $url");
	exit();

// Displays custom note, waits 2 seconds, then redirects to the custom url
}


function login_chk($user , $password){
	if ($user == "" || $password == "") redirect ("Missing field" , "index.html");
// If either field is empty, refresh the page and display "Missing field"

	
}






















?>

<?php 

session_start();
session_unset();
session_destroy();
if (isset($_COOKIE['RIFOD']) && isset($_COOKIE['RUFOD'])) {
	$time = 86400;
	setcookie('RIFOD', '',time() - $time);
	setcookie('RUFOD', '',time() - $time);
}

header('location: login.php');
?>
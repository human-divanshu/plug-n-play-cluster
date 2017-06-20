<?php
session_start();
if(isset($_GET['pass'])) {
	$pass = $_GET['pass'];
	
	include("conf.php");
	
	if($pass == $conf['pass']) {
		$_SESSION['pnpauth'] = "OK";
		header("Location: dashboard.php");
		exit();
	} else {
		header("Location: connect.php");
		exit();
	}
}
?>

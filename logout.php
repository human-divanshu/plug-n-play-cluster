<?php
// send request to remove the entry 
// from worker node table
	include_once('db.php');

	session_start();
	$sql = "DELETE from workers where worker_ip like '".$_SESSION['REMOTE_ADDR']."'"; 
	update($sql);
	unset($_SESSION['pnpauth']);
	header("Location: index.php");
	exit();

?>

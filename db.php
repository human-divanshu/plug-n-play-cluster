<?php

/*
	Function to connect to database
*/

function connect()
{
	$db = new PDO('mysql:host=localhost;dbname=cluster;charset=utf8', 'root', 'root');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $db;
}


function query($sql) {
	$db = connect();
	$stmt = $db->prepare($sql);
   $stmt->execute(array());
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$db = null;
	return $result;
}


function update($sql) {
	$db = connect();
	$stmt = $db->prepare($sql);
   $stmt->execute(array());
	$db = null;
}

function isloggedin() {
	if(isset($_SESSION['pnpauth']))
		return true;
	else
		return false;
}
?>

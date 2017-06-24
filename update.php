<?php
include("db.php");

try {
	$sql = "UPDATE workers set last_ping = now() where worker_ip = '".$_SERVER['REMOTE_ADDR']."'";
	update($sql);	

	} catch(Exception $e) {
	echo "ERROR in updating last_ping time";
}
?>

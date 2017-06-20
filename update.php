<?php
include("db.php");

try {
	$sql = "update workers set last_ping = now() where worker_ip = '".$_SERVER['REMOTE_ADDR']."'";
	update($sql);
	echo "PING DONE";
} catch(Exception $e) {
	echo "ERROR in updating last_ping time";
}
?>

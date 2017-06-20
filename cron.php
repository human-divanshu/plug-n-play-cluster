<?php
/*
	Delete all the workers which have been inactive for more than 5 seconds
	and send back list of remaining workers
*/

include("db.php");

try {
	$sql = "delete from workers where TIMESTAMPDIFF(SECOND, last_ping, now()) > 5";
	update($sql);
	
	$sql = "select * from workers";
	$result = query($sql);
	
	echo json_encode($result);
} catch (Exception $e) {
	echo "ERROR in running cron.php";
}
?>

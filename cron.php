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
		$workers_data = query($sql);
	
		$sql = "select * from tasks order by job_id desc";
		$tasks_data = query($sql);


		$result = array();
		$result["workers"] = $workers_data;
		$result["tasks"] = $tasks_data;

		echo json_encode($result);

	} catch (Exception $e) {
		echo "ERROR in running cron.php";

	}
?>

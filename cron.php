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
	
		$sql = "select * from tasks";
		$tasks_data = query($sql);

	/*	$sql = "select count(*) from job where status = 0";
		$jobs_ready =  query($sql);

		$sql = "select count(*) from job where status = 1";
		$jobs_running = query($sql);

		$sql = "select count(*) from job where status = 2";
		$jobs_done =  query($sql);*/

		$jobs=array(0=>array("jobs_ready"=>$jobs_ready[0]["count(*)"],"jobs_running"=>$jobs_running[0]["count(*)"],"jobs_done"=>$jobs_done[0]["count(*)"]));

		//print_r($tasks_data);

		$result = array();
		$result["workers"] = $workers_data;
		$result["tasks"] = $tasks_data;

		//$result["jobs"] = $jobs;

		echo json_encode($result);

	} catch (Exception $e) {
		echo "ERROR in running cron.php";

	}
?>

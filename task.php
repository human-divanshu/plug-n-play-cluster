<?php	

	include_once("db.php");

	$data = json_decode($_GET["data"],true);
	$comm = "cat ".$data["process"]." > processed_files/".$data["job_id"]."/".$data["file_name"];
	exec($comm);

	$sql = "UPDATE workers set status = 0 where worker_ip = '".$_SESSION["REMOTE_ADDR"]."'";
	update($sql);

	$sql "UPDATE tasks set status = 2 where job_id = ".$data["job_id"]." AND task_id = ".$data["task_id"];
	update($sql);
	
?>

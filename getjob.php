<?php
include_once("db.php");

try {
	
	$sql = "SELECT * from tasks where status = 0 order by task_id limit 1";
	$result = query($sql);		
		
	$data = array();
	$data["message"] = false;


	if(!empty($result)){

		$sql = "UPDATE tasks set status = 1, worker_ip = "."'".$_SERVER['REMOTE_ADDR']."' WHERE task_id ="."'".$result[0]["task_id"]."'";
		update($sql);
		$sql = "UPDATE workers set status = 1 where worker_ip = '".$_SERVER['REMOTE_ADDR']."'";
		update($sql);
		$sql = "UPDATE job set status = 1 where job_id = ".$result[0]["job_id"];
		update($sql);

		$data["message"] = true;		
		$dir = "./jobs/".$result[0]["job_id"];
		$task = $dir."/".$result[0]["task_file_name"];
		$data["content"] = file_get_contents($task);
		$data["task_id"] = $result[0]["task_id"];
		$data["job_id"] = $result[0]["job_id"];
		$data["file"] = $result[0]["task_file_name"];
		$sql = "SELECT process_func_file from job where job_id ="."'".$result[0]["job_id"]."'";
		$process = query($sql);
		$data["process"] = file_get_contents($process[0]["process_func_file"]);

		
	}

	echo json_encode($data);

} catch(Exception $e) {
	echo "HOCUS POCUS";
}
?>

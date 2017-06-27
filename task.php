<?php	

	include_once("db.php");
	
	$str = $_POST["process"];
	
	file_put_contents("processed_files/".$_POST["job_id"]."/".$_POST["file_name"], $str);

	$sqli = "UPDATE tasks set status = 2 where job_id = ".$_POST["job_id"]." AND task_id = ".$_POST["task_id"];
	update($sqli);

	$sql = "SELECT * from tasks where job_id = ".$_POST["job_id"]." AND status != 2";
	$result = query($sql);
	
	
	if(empty($result)){
		echo "tasks done";
		// Call Aggregator;

		$sqls = "UPDATE job set status = 2 where job_id = ".$_POST["job_id"];
		update($sqls);
	}
			
?>

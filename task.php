<?php	

	include_once("db.php");
	
	$str = json_encode($_POST["process"]);
	//echo("echo ".$str."> processed_files/".$_POST["job_id"]."/".$_POST["file_name"]);
	// echo json_encode($_POST["process"]);	
	$comm = "echo ".$str."> processed_files/".$_POST["job_id"]."/".$_POST["file_name"];
	exec($comm);

	$sqli = "UPDATE tasks set status = 2 where job_id = ".$_POST["job_id"]." AND task_id = ".$_POST["task_id"];
	update($sqli);
	echo $sqli;
			
?>

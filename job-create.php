<?php
	require_once('db.php');
	function lastID(){
		// Used to retrieve the job_id of last added job.	
		$sql = "SELECT job_id FROM job where Job_ID = (SELECT MAX(job_iD) FROM job)";
		$returned = query($sql)[0];
		return $returned["job_id"];
		
	}
	function jobCreate($input, $processing, $aggregate){
	
		// Creating an entry in the table
		$insert_query = "INSERT into job(input_File, process_File, aggregate_File) VALUES("."'".$input."'".","."'".$processing."'".","."'".	 $aggregate."'".")";
		update($insert_query);
		
	}
	function tasksToArray($job_id){	
		
		// using the ls function to write the names of all tasks into a file.
		$task_dir = "ls jobs/".$job_id;
		$len = strlen($task_dir);
		// adding the task names into an array
		
		foreach(glob($task_dir."/*") as $task_file){
			$temp = substr($task_file,$len);
			$sql_query = "INSERT into tasks(job_id,task_name,status) VALUE(".$job_id.","."'".$temp."'".", 'ready')";
			update($sql_query);
		}
		return $array;
	}		
		
?>

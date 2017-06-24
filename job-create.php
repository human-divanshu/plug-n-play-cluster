<?php
	require_once('db.php');
	function lastID(){
		// Used to retrieve the job_id of last added job.	
		$sql = "SELECT job_id FROM job where job_id = (SELECT MAX(job_id) FROM job)";
		$returned = query($sql)[0];
		return $returned["job_id"];
		
	}
	function jobCreate($input, $processing, $aggregate){
	
		// Creating an entry in the table
		$insert_query = "INSERT into job(input_File, process_func_file, aggregate_func_file) VALUES("."'".$input."'".","."'".$processing."'".","."'".	 $aggregate."'".")";
		update($insert_query);
		
	}
	function tasksToArray($job_id, $extension){	
		
		// directory where the files are stored
		$task_dir = "jobs/".$job_id;
		$len = strlen($task_dir);
		
		$array = glob($task_dir."/*.".$extension);

		// adding the task names into an array		
		foreach($array as $task_file){
			
			// substr will remove the directory's address
			$file = substr($task_file,$len+1);
			$sql_query = "INSERT into tasks(job_id,task_file_name,status) VALUES(".$job_id.","."'".$file."'".",0)";
			update($sql_query);
		}
		return $array;
	}		
		
?>

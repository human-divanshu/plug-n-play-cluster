<?php

	require_once('db.php');

	function lastID(){
	
		$sql = "SELECT job_id FROM job where Job_ID = (SELECT MAX(Job_ID) FROM job)";
		$returned = query($sql)[0];
		return $returned["job_id"];
		
	}

	function jobCreate($input, $processing, $aggregate){
	
		// Creating an entry in the table
		$insert_query = "INSERT into job(Input_File, Process_File, Aggregate_File) VALUES("."'".$input."'".","."'".$processing."'".","."'".	 $aggregate."'".")";
		update($insert_query);
		
	}

	function tasksToArray($job_id){
	
		
		// using the ls function to write the names of all tasks into a file.
		$file_command = "ls jobs/".$job_id." > file_list.txt";
		exec($file_command);

		// adding the task names into an array
		$array = explode("\n", file_get_contents('file_list.txt'));
		exec("rm file_list.txt");

		// inserting file names in the table 'tasks'
		foreach($array as $temp){
			$sql_query = "INSERT into tasks(job_id,task_name,status) VALUE(".$job_id.","."'".$temp."'".", 'ready')";
			update($sql_query);
		}
		return $array;
	}		
		
?>

<?php

	include('db.php');

	function jobCreate($input, $processing, $aggregate){
	
		// Creating an entry in the table
		$insert_query = "insert into job(Input_File, Process_File, Aggregate_File) values(".$input.",".$processing.",".$aggregate.")";
		query($insert_query);
		
	}

	function tasksToArray($job_id){
	
		
		// using the ls function to write the names of all tasks into a file.
		$file_command = "ls jobs/".$job_id." > file_list.txt";
		exec($file_command);

		// adding the task names into an array
		$array = explode("\n", file_get_contents('file_list.txt'));
		exec("rm file_list.txt");

		// inserting file names in the table 'tasks'
		foreach( $temp as $array){
			$sql_query = "insert into tasks(job_id,task_id,task_name,status) values(".$job_id.",".$temp.", ready)";
			query($sql_query);
		}
		return $array;
	}		
		
?>

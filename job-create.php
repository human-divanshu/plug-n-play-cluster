<?php

	include('db.php');

	function tasksToArray($job_id)
	{
		
		// using the ls function to write the names of all tasks into a file.
		$file_command = "ls /jobs/".$job_id." > file_list.txt";
		exec($file_command);
		
		// adding the task names into an array
		$array = explode("\n", file_get_contents('file_list.txt'));
		exec("rm file_list.txt");
		
		// inserting file names in the table 'tasks'
		for( $temp as $array){
			$sql_query = "insert into tasks(job_id,task_id,task_name,status) values(".$job_id.",".$temp.", ready"
			query($sql_query);
		}
		return $array;
	}		
		
?>

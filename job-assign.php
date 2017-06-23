<?php
	function($job_id)
	{
		include('db.php')

		$file_command = "ls /jobs/".$job_id." > file_list.txt";
		exec($file_command);
	
		$array = explode("\n", file_get_contents('file_list.txt'));
		exec("rm file_list.txt");
	
		for( $temp as $array){
			$sql_query = "insert into tasks(job_id,task_id,task_name,status) values(".$job_id.",".$temp.", ready"
			query($sql_query);
			$task_no = $task_no + 1;
		}
		return $array;
	}		
		
?>

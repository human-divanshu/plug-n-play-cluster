<?php
	
function aggregate($job){
	include_once("db.php");

	$sql = "Select task_file_name from tasks where job_id =".$job;
	$result = query($sql);

	$dir = "processed_files/".$job;	

	$ans = array();
	foreach($result as $task){
		$addr = $dir."/".$task["task_file_name"];		
		$file = fopen($addr,"r");
		
		while(!feof($file)){
			$line = fgets($file);
			$keyval = preg_split('/\s+/', $line);

			if(sizeof($keyval) > 1)
			if(array_key_exists($keyval[0],$ans)){
				$ans[$keyval[0]] = 	$ans[$keyval[0]] + $keyval[1];
			}	
			else{
				$ans[$keyval[0]] = $keyval[1];
			} 
		}
		
	}

	$path = "processed_files/".$job."/final.txt";
	$file = fopen($path, "a");		

	foreach($ans as $key => $val){
		
		fwrite($file, $key."	".$val."\n");
			
	}
	
	fclose($file);
}

?>

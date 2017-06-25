<?php	

	include_once("db.php");
	$data = json_decode($_POST["data"],true);
	echo $data["process"];
	
	$fname = "processed_files/".$data["job_id"]."/".$data["file_name"];
	$file = fopen("processed_files/6/lol.txt", "w");
	file_put_contents($file, $data["process"]);
	fclose($file);

		
?>

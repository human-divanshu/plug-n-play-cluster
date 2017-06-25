<?php	

	include_once("db.php");
	$data = json_decode($_GET["data"],true);
	echo $data["process"];
	
	$fname = "processed_files/".$data["job_id"]."/".$data["file_name"];
	$file = fopen($fname, "w");
	
		
?>

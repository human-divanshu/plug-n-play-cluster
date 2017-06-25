<?php	

	include_once("db.php");
	$data = json_decode($_GET["data"],true);
	echo $data["file_name"];
	
	$comm = "cat ".$data["process"]." > processed_files/".$data["job_id"]."/".$data["file_name"];
	exec($comm);
	
?>

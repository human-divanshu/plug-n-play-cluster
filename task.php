<?php	

	include_once("db.php");
	$data = json_decode($_GET["data"],true);
	$comm = "cat ".$data["process"]." > processed_files/".$data["job_id"]."/".$data["file_name"];
	exec($comm);
		
?>

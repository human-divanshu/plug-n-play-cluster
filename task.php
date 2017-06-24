<?php
	

	include_once("db.php");
	$data = json_decode(json_encode($_GET["data"]));
	echo ($data);

	$command = "echo ".$data["processed"]." > ./jobs/".$data["job_id"]."/processd_files/processed_.".$data["file"];
	exec($command);

	
?>
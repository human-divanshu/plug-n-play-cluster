<?php
include('db.php')
include('conf.php')
	$folder = $conf['job_id'];
	$insert_query = "insert into job values("$folder.",".$input.",".$processing.",".$aggrigate.")";
	query($insert_query);
	$conf['job_id'] = $folder + 1;

	$dir = "mkdir ".$folder;
	exec($dir);
	
?>

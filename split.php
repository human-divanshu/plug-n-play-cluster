<?php

/**
  * PHP SCRIPT TO READ THE FILE AND SPLIT IN INTO DIFFERENT FILES AND SEND TO WORKERS
  * TAKES FILE NAME AS COMMAND LINE ARGUMENT
  */
	
	include("conf.php");

	// checking for filename
	if($argc == 1){
		echo('No file name found.');
		exit();
	}
	
	// file name
	$file_name = $argv[1];

	$command = "split -d --line-bytes=".$conf["splitsize"]." ".$file_name." new";
	exec($command); 
	
?>

<?php

/**
  * PHP SCRIPT TO READ THE FILE AND SPLIT IN INTO DIFFERENT FILES AND SEND TO WORKERS
  * TAKES FILE NAME AS COMMAND LINE ARGUMENT
  */
	
	include("conf.php");

	function split($file_name, $folder){

		$command = "split -d --line-bytes=".$conf["splitsize"]." ".$file_name." jobs/".$folder."/task";
		exec($command); 

	}
	
?>

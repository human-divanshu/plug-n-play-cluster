<?php
/**
  * PHP SCRIPT TO READ THE FILE AND SPLIT IN INTO DIFFERENT FILES AND SEND TO WORKERS
  * TAKES FILE NAME AS COMMAND LINE ARGUMENT
  */
		
	function split($file_name, $folder, $extension){
		include("conf.php");
		$command = "split -d --line-bytes=".$conf["splitsize"]." --additional-suffix=.".$extension." ".$file_name." jobs/".$folder."/task";
		exec($command); 
	}
	
?>

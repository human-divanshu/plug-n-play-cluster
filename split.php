<?php
/**
  * PHP SCRIPT TO READ THE FILE AND SPLIT IN INTO DIFFERENT FILES AND SEND TO WORKERS
  * TAKES FILE NAME AS COMMAND LINE ARGUMENT
  */
		
	function split($file_name, $folder){
		include("conf.php");
		$command = "split -d --line-bytes=".$conf["splitsize"]." ".$file_name." jobs/".$folder."/task";
		exec($command); 
	}
	
?>

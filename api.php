<?php

if($conf['auth'] == true && !isloggedin()) {
	return "Access denied";
} else {
	
	if(isset($_GET['action'])) {
		
		// just update the ip address in table
		// 
		if($_GET['action'] == "ping") {
		
		
		}
	
	
	}	
}

?>

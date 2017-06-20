<?php
	session_start();
	
	include("db.php");
	include("conf.php");
	
	if($conf['auth'] == true && !isloggedin()) {
		header("Location: index.php");
		exit();
	}
	
	// add IP entry to table
	$sql = "insert into workers(worker_ip,last_ping) values('".$_SERVER['REMOTE_ADDR']."', now())";
	update($sql);
?>
<!doctype html>
<html>
<head>
    <?php require_once("common-head.php"); ?>
    <title>Plug n Play cluster</title>
</head>
<body>
<?php require_once("nav.php"); ?>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 text-center">
    			<h2 style="font-weight:bold;">Connected to cluster !</h2><hr>
    			<p>To disconnect your device from the cluster, please click the button below<br><br>
    			<a class="btn btn-primary" href="logout.php">Disconnect</a>.</p>
    		</div>
    	<div>
    </div>    
<?php require_once("footer.php"); ?>
    
<script>

$(document).ready(function() {
	
	// update server about your
	// presence every 5 second
	setInterval(function(){
		$.get("update.php", function(data, status){
        	console.log(data);
    	});
	}, 5000);


});
</script>

</body>
</html>

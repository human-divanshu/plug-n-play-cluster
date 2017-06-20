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
    			<h2 style="font-weight:bold;">Cluster Monitor</h2><hr>
    		</div>
    	<div>
    	<div class="row">
    		<div class="col-md-6">
    			<p><strong>Worker Nodes</strong></p>
    			
    			<table class="table table-striped">
    				<tr>
    					<td><b>Worker ID</b></td>
    					<td><b>Worker IP</b></td>
    					<td><b>Last Ping</b></td>
    				</tr>
    			</table>
    		</div>
    		<div class="col-md-6">
    		
    		</div>
    	</div>
    </div>    
<?php require_once("footer.php"); ?>
    
<script>

$(document).ready(function() {
	// delete non-active workers from the cluster
	// every 5 seconds
	setInterval(function(){
		$.get("cron.php", function(data, status){
        	console.log(data);
    	});
	}, 10000);


});
</script>

</body>
</html>

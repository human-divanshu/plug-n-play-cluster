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

    			<table id = "fetched" class="table table-striped">
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
	// getting JSON - worker id, worker ip, last ping's time
	$.getJSON("cron.php", function(data, status){
    //console.log(JSON.stringify(data));

    // removing all rows except the table header
    $("#fetched").find("tr:gt(0)").remove();
    if(data != '')
      // appending the recieved JSON to the table
      $.each(data, function(key, val) {
      var tr=$('<tr></tr>');
      $.each(val, function(k, v){
        $('<td>'+v+'</td>').appendTo(tr);
      });
      tr.appendTo("#fetched");
    });

    	});
	}, 10000);

});
</script>

</body>
</html>

<?php
include("conf.php");

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
    		<?php
    		if($conf['auth'] == true) {
    		// auth is required as per configuration	
    		?>
    		<div class="col-md-4"></div>
    		<div class="col-md-4 text-center">
    			<h2 style="font-weight:bold;">Worker Node login</h2><hr>
    			<p>Please enter the password to join the cluster.</p>
    			<form action="" method="post">
    			<?php
    				if(isset($_POST['pass'])) {
						header("Location: login.php?pass=".$_POST['pass']);
						exit();
    				}
    			?>
    				<input name="pass" type="password" required="required" placeholder="Enter password" class="form-control"><br>
    				<button type="submit" class="btn btn-primary">Authenticate</button>
    			</form>
    		</div>
    		<div class="col-md-4"></div>
    		<?php
    		} else {
    			// auth not required
				header("Location: dashboard.php");
				exit();
    		} // else block ends
    		?>
    	<div>
    </div>    
<?php require_once("footer.php"); ?>
    


</body>
</html>

<?php
// send request to remove the entry 
// from worker node table
session_start();
unset($_SESSION['pnpauth']);
header("Location: index.php");
exit();

?>

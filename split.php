<?php

/**
  * PHP SCRIPT TO READ THE FILE AND SPLIT IN INTO DIFFERENT FILES AND SEND TO WORKERS
  * TAKES FILE NAME AS COMMAND LINE ARGUMENT
  */

  // checking for filename
  if($argc == 1){
    echo('No file name found.');
    exit();
  }
  // file name
  $file_name = $argv[1];

  // extracting the extension
  $path = pathinfo($file_name);
  $extension = $path['extension'];

  // file size
  $size = filesize($file_name);
  
  // testing
  $file = fopen($file_name, "r");
  $size = ceil($size / 1000000);
  $workers = 6;
  $splits = ceil($size / $workers);
  $command = "split --bytes=".$splits."M ".$file_name." new";

  exec($command);
?>

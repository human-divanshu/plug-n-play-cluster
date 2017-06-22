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

  // only split is file is greater than 50000 bytes.
  if($size >= 5000000){

    if($extension == '.txt'){
      $splits = 5;
      $command = "split -d --bytes=".$splits."M ".$file_name." new";
    }

    elseif($extension == '.csv' || $extension == '.tsv'){

      // Finding the number of lines in the csv file without loading the entire file in the memory.
      $file = new SplFileObject($file_name, 'r');
      $file -> seek(PHP_INT_MAX);
      $lines = $file -> key() + 1;

      // No of lines per 5MB.
      $splits = ($lines / $size) * 5000000;
      $splits = ceil($splits);
      // Splitting linewise
      $command = "split -d -l ".$splits." ".$file_name." new";
    }

    exec($command);

  }

?>

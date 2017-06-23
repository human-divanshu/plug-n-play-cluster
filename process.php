<?php

	include('split.php');
	include('conf.php');
	include('job-create.php');

	if($argc != 4){
		echo("Please enter 3 input files!");
		exit();
	}

	$file_name = $argv[1];
	$processing = $argv[2];
	$aggregate = $argv[3];

	// Reading job_id from conf file.
	$folder = $conf['job_id'];	
	
	// Adds the created job to the table
	//#jobCreate($folder, $input, $processing, $aggregate);
	
	// Incrementing the job_id
	$conf['job_id'] = $folder + 1;

	// Making a folder with the name of the job_id
	$dir = "mkdir jobs/".$folder;
	exec($dir);

	// Splitting the file 
	split($file_name, $folder);

	// returns an array containing the name of all the tasks for a given job
	$tasks = tasksToArray($folder);
	
?>

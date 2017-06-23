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
	
	// Adds the created job to the table
	jobCreate($file_name, $processing, $aggregate);	
	
	// Folder name is job_id
	$folder = lastId();

	// Making a folder with the name of the job_id
	$dir = "mkdir jobs/".$folder;
	exec($dir);

	// Splitting the file 
	split($file_name, $folder);

	// returns an array containing the name of all the tasks for a given job
	$tasks = tasksToArray($folder);
	
?>

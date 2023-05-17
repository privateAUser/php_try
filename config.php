<?php
	include 'database.php';
	$conn = OpenCon();
	
    $sql = "CREATE TABLE IF NOT EXISTS students( ".
		"id INT NOT NULL AUTO_INCREMENT, ".
		"firstname VARCHAR(100) NOT NULL, ".
		"lastname VARCHAR(100) NOT NULL, ".
		"email VARCHAR(100) NOT NULL, ".
		"gender VARCHAR(100) NOT NULL, ".
		"PRIMARY KEY ( id )); ";
	  
	if ($conn->query($sql)) {
		debug_to_console("Table students created successfully.");
	}
	if ($conn->errno) {
		debug_to_console("Could not create table.");
	}   
	
	CloseCon($conn);
?>

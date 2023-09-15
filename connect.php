<?php
	$conn = new mysqli('localhost', 'root', '', 'apthlms_db') or die();
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
	?>
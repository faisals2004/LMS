<?php
	require_once 'connect.php';
	session_start();
	if(($_SESSION['aid'])){
		header('location: dashboard.php');
	}

<?php
	session_start();
	if($_SESSION['name']!=null){
		session_destroy();
	}
	header('location:view/home.php');
?>
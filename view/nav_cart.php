<?php 
session_start();
	$extra='';
	if(isset($_SESSION['name'])){
		$extra="?ans=1&username=".($_REQUEST['username'])."";	
	}
	//echo $extra;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb ">
	    <li class="ml-3">
	    	<img src="../attachment/logo/bw.png" width="60" height="50" alt="Logo" class="img-fluid ">
	    </li>
	    <li class="breadcrumb-item"><a href="home.php<?php echo $extra ?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="All_menu.php<?php echo $extra ?>">Menu</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Cart</li>
	  </ol>
	</nav>
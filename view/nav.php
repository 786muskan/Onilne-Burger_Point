<?php
session_start();
include('../controller/menucontroller.php');
$extra = '';
$obj = new MenuController();
$sign = "";
$customer = "d-none";
$ans = isset($_REQUEST['ans']) ? $_REQUEST['ans'] : 0;

if ($ans == '1') {
    $sign = "d-none";
    $customer = "";
    //echo $_REQUEST['username'];
}

if (isset($_REQUEST['username'])) {
    // Fetch the user details using the session id
    //$id = $_SESSION['id']; // Using 'id' directly from session
    $countbit = $obj->countcart($_REQUEST['username']); // Use the correct id to fetch the cart count
    $extra = "?ans=1&username=". $_REQUEST['username']; // Ensure correct query string for username
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    
    <!-- Include Glider.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <!-- Navbar brand/logo -->
        <a class="navbar-brand" href="home.php<?php echo $extra ?>">
            <img src="../attachment/logo/bw.png" width="60" height="50" alt="Logo" class="img-fluid"> 
        </a>

        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ml-5">
                    <a class="nav-link text-decoration-none text-dark" href="about.php<?php echo $extra ?>">About</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link text-decoration-none text-dark" href="All_menu.php<?php echo $extra ?>">Menu</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link text-decoration-none text-dark" id="cart" href="cart.php<?php echo $extra ?>">Cart
                        <sup class="badge text-danger">
                            <?php echo isset($countbit) ? $countbit['c'] : ''; ?>
                        </sup> 
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>

            <!-- Sign In button with user icon -->
            <ul class="navbar-nav">
                <li class="nav-item ml-5 <?php echo $sign ?>">
                    <a class="nav-link text-decoration-none text-dark" href="login.php">
                        <i class="fas fa-user text-dark"></i> Sign In
                    </a>
                </li>
                <li class="nav-item dropdown <?php echo $customer ?>">
                    <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <h5> <?php echo $_SESSION['name']; ?></h5>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php<?php echo $extra ?>">Profile</a>
                        <a class="dropdown-item" href="order_history.php<?php echo $extra ?>">Order History</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
  session_start();
  include("../controller/logincontroller.php");
  $obj=new LoginController();
  $error='';
  
  if(isset($_REQUEST['login'])){
        
    $data=$obj->CheckUserController($_REQUEST['username'],$_REQUEST['password']);
    if($data!=null){
        //echo "hello";
        $user=$_REQUEST['username'];
        $_SESSION['name']=$data['name'];
       // echo "hello";
        
        echo "<script>window.location.href = 'home.php?ans=1 & username=$user'</script>";
        
    }
    else
    {
      $error="Please enter valid username or password";
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Sign Up Form</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    
    /* Custom CSS to center forms */
    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      

    }
    .form-box {
      width: 100%;
      max-width: 400px;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      background: #606c88;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #3f4c6b, #606c88);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3f4c6b, #606c88); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      color: white;
    }
    
  </style>
</head>
<body>

<div class="container form-container">
  <!-- Login Form -->

  <div id="login-form" class="form-box">
    <h4 class="text-center">Login</h4>
    <form method="post"> 
      <div class="form-group">
        <label for="loginUsername">Username</label>
        <input type="text" class="form-control" id="loginUsername" placeholder="Enter username" required name="username">
      </div>
      <div class="form-group">
        <label for="loginPassword">Password</label>
        <input type="password" class="form-control" id="loginPassword" placeholder="Enter password" required name="password">
        <span class="text-danger" id="login-error"> <?php echo $error ?></span>
      </div>
      <button type="submit" class="btn btn-outline-light btn-block" name="login">Login</button>
      <p class="text-center mt-3">
        Don't have an account? <a href="signup.php" id="show-signup">Create New Account</a>
      </p>
    </form>
  </div>
<!-- 
   Sign-Up Form 
  <div id="signup-form" class="form-box hidden">
    <h4 class="text-center">Sign Up</h4>
    <form onsubmit="return validateSignUp()">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" required name="name">
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required name="phone">
      <span class="text-danger" id="phone-error"><?php echo $perror?></span>
      </div>
      
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="Enter your address" required name="address">
      </div>
      <div class="form-group">
        <label for="signupUsername">Username</label>
        <input type="text" class="form-control" id="signupUsername" placeholder="Enter username" required name="uname">
        <span class="text-danger" id="username-error"><?php echo $uerror?></span>
      </div>
      <div class="form-group">
        <label for="signupPassword">Password</label>
        <input type="password" class="form-control" id="signupPassword" placeholder="Enter password" required name="pass">
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" required name="cpass">
        <span class="text-danger" id="notsame-error"><?php echo $nserror?></span>
      </div>
      <button type="submit" class="btn btn-outline-light btn-block" name="signup">Sign Up</button>
      <p class="text-center mt-3">
        Already have an account? <a href="#" id="show-login">Login</a>
      </p>

    </form>
  </div>
</div> -->
<!-- 
JavaScript for toggling between forms 
<script>
  // Toggle between login and signup forms
  document.getElementById('show-signup').addEventListener('click', function() {
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('signup-form').classList.remove('hidden');
  });

  document.getElementById('show-login').addEventListener('click', function() {
    document.getElementById('signup-form').classList.add('hidden');
    document.getElementById('login-form').classList.remove('hidden');
  });
  
  function validateLogin() {
    const errorspan = document.getElementById('login-error');
    if (errorspan.textContent.trim()!='') {
      return false;
    }
    return true; // Allow form submission
  }
  function validateSignUp() {
    const errornotsame = document.getElementById('notsame-error');
    const errorusername = document.getElementById('username-error');
    const errorphone = document.getElementById('phone-error');
    if (errornotsame.textContent.trim()!='' || errorusername.textContent.trim()!='' || errorphone.textContent.trim()!='') {
      return false;
    }
    return true; // Allow form submission
  }
</script> -->
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

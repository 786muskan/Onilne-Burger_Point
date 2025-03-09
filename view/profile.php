<?php 
/*session_start();*/
	require('customer_nav.php');
	$extra='';
	$error='';
	include('../controller/orderhistoryController.php');
	$obj =  new OrderHistoryController();
	if(isset($_SESSION['name'])){
		$extra="?ans=1&username=".($_REQUEST['username'])."";
		$an=$obj->CheckUsernames(trim($_REQUEST['username']));
  		$ans=$_REQUEST['ans'];
  		if(isset($_REQUEST['save'])){
			$check=$obj->CheckUsernames(trim($_REQUEST['uname']));
			if($check==null){

  				$obj->UpdateUserProfile($_REQUEST['name'],$_REQUEST['uname'],$_REQUEST['phone'],$_REQUEST['address'],(int)$an['id']);
  				echo "<script>window.location.href = 'home.php?ans=1 & username=".$_REQUEST['uname']."'</script>";
			}
			else{
				$error="This Username already exists.";	
			}
  		}
  		//update
  		//var_dump($an);
	}
	
?>
<div class="container">
	<div class="row">
			<div class="offset-lg-3 offset-md-3 col-lg-6 col-md-6">
		 		<div class="card text-center">
		 			<div class="card-header bg-light">
		 				<h2>Profile</h2>
		 			</div>
		 			<div class="card-body ">
		 					<form method="post">
		 						<div class="form-group p-4 "> 
		 							<div class="input-container">
										
										<input type="text" name="name" id="name" value="<?php echo $an['name']?>"class=" form-control inputbox" required>
										<label for="name" class="labelline">Name</label>
									
									</div>
		 								
		 								
		 						</div>
		 						<div class="form-group p-3 "> 
		 							<div class="input-container">
										
										<input type="text" name="uname" id="uname" value="<?php echo $an['username']?>"class=" form-control inputbox" required>
										<label for="uname" class="labelline">Username</label>
										<span class="text-danger text-start"  > <?php echo $error ?></span>
      
									</div>
		 								
		 								
		 						</div>	 
		 						<div class="form-group p-3"> 
		 							<div class="input-container">
										
										<input type="text" name="phone" id="phone" value="<?php echo $an['phone']?>"class=" form-control inputbox" required>
										<label for="phone" class="labelline">Phone</label>
									
									</div>
		 								
		 								
		 						</div>
		 						<div class="form-group p-3"> 
		 							<div class="input-container">
										
										<input type="text" name="address" id="address" value="<?php echo $an['address']?>"class=" form-control inputbox" required>
										<label for="address" class="labelline">Address</label>
									
									</div>
		 								
		 								
		 						</div>
		 						<div class="form-group ">
      								<button type="submit" class="btn btn-outline-danger " style="width: 150px;" name="save">Save</button>
		 							<!-- <button class="btn " ><a  name="password" href="#" class="btn btn-outline-primary btn-md text-decoration-none">Reset Password</a></button>
		 							<button class="btn " ><a style="width: 150px;"href="#" name="save" class="btn btn-outline-danger btn-md text-decoration-none">Save</a></button> -->
		 						</div>	
		 					</form>
		 			</div>
				</div>
			</div>	
	</div>
</div>
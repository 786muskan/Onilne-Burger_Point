<?php 
		require("nav.php");
		$extra='';
		if(isset($_SESSION['name'])){
      	//echo "string";
       	$extra="?ans=1&username=".$_REQUEST['username']."";
       	//echo $extra;
    }
    $res=$obj->showPopularItems();
?>
		<div class="img-back">
<div class="container ">
			
	<div class="row align-items-center justify-content-left min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 text-left  text-light ">
        <h1 class="display-4 ">Burger Wurger</h1>
        <p>"Welcome to Burger Wurger, where every bite takes you on a delicious journey! Our handcrafted burgers are made with the freshest ingredients, bursting with flavor and creativity. Join us for a mouthwatering experience that’ll leave you craving more!"</p>
      </div>
    </div>
		</div>
  </div> 


 <div class="container">
 	<h1 class="m-5 text-center">Popular Items</h1>   	
     
  <div class="glider-contain">
    <div class="glider">
    	<?php 
    	if (!empty($res) && is_array($res)) {
    		foreach ($res as $key1 => $value1) {
    				//var_dump($value1);
    				echo "<div class='card  '>
						    <div class='card-body  text-dark  p-5 rounded2 text-center'>
						        <span ><img src='../admin/attachment/upload/".$value1['image']." ' class=' img-fluid'  ></span><br>
						        <span class='col text-dark'>".$value1['name']." </span>
						    </div>
				        </div>";

    				
    			
    		}
    		}
    	?>
       

      
    </div>
  
</div>
     <!-- Dots for pagination --> 
    <div role="tablist" class="dots"></div>
  </div>
   

    </div>

      <!-- about section -->

  <section class=" mt-5 about_section">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="../attachment/banner/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are Burger Wurger
              </h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="about.php<?php echo $extra ?>">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

<div class="container mt-4 mb-2">
	<div class="row">
		<div class="col-4 col-md-4 col-sm-12">
			<h1>Browse Categories</h1>
		</div>
		<div class="col-6  mt-2 d-none d-md-block ">
			<hr class="">
		</div>
	</div>
	<div class="row mt-5 mb-5 mx-auto">
			<div class="col-4">
				<div class="card   shadow-lg   ">
							<div class="card-body ">
						  <a href="colddrink.php<?php echo $extra;?>" class=""><img src="../attachment/categories/colddrink.jpg" class="img-fluid shadow-lg " /></a>
						        
						    
				      </div>
				</div>
			</div>
			<div class="offset-2 col-4">
				<div class="card shadow-lg ">
							<div class="card-body">
						    <a href="burgerveg.php<?php echo $extra;?>" class=""><img src="../attachment/categories/burger.jpg" class="img-fluid" /></a>
						   
				      </div>
				</div>
			</div>

	</div>
	<div class="row mt-5 mb-5 mx-auto">
			<div class="col-4">
				<div class="card  shadow-lg ">
							<div class="card-body">
						   <a href="friesveg.php<?php echo $extra;?>" class=""><img src="../attachment/categories/fries.jpg" class="img-fluid " /></a>
				      </div>
				</div>
			</div>
			<div class=" offset-2 col-4">
				<div class="card  shadow-lg ">
							<div class="card-body">
						    <a href="icecream.php<?php echo $extra;?>" class=""><img src="../attachment/categories/icecream.jpg" class="img-fluid " /></a>
				      </div>
				</div>
			</div>

	</div>
	<div class="row mt-5 mb-5  ">
			<div class=" offset-3 col-6">
				<div class="card shadow ">
							<div class="card-body ">
						      <a href="All_menu.php<?php echo $extra;?>" class=""><img src="../attachment/categories/all.png" class="img-fluid " /></a>
				      </div>
				</div>
			</div>
		
	</div>
</div>
 
<?php 
		require("footer.php");
?>
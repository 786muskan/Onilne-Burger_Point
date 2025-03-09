<?php
  require("nav.php");
  $extra='';
    if(isset($_SESSION['name'])){
      
        $extra="?ans=1&username=".$_REQUEST['username']."";
    }
?>
 <div class="container">
   <h1 class=" p-5 text-center he" >About Us</h1>
 </div>
      <!-- about section -->

  <section class=" mt-5 about_section p-4">
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
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <section class=" mt-5 mb-5 p-5 about_section">
    <div class="container  ">

      <div class="row">
        
        <div class="col-md-6 ">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Our Food
              </h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
           
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="../attachment/banner/meal.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  
<?php 
    require("footer.php");
?>
<?php 
    //session_start();
    if(isset($_SESSION['name'])){
      $id=$obj->searchCustomerController(trim($_REQUEST['username']));
        $countbit=$obj->countcart($id['id']);
        $extra="?ans=1&username=".$_REQUEST['username']."";
    }
 ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-2  bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-dark min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <h3 class="icon"><img class="img-fluid icon" src="../attachment/icons/menu.png"/></h3><h3 class="d-none d-md-none d-lg-inline d-sm-inline">Menu</h3>

                </a>

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                    <li class="mb-2 ">
                        <a href="All_menu.php<?php echo $extra;?>" class="nav-link px-0 align-middle  ">
                            <i class="icon"><img class="img-fluid icon" src="../attachment/icons/all.png" ></i> <span class="ms-1 d-none d-md-none d-lg-inline d-sm-inline ">All</span> </a>
                        <!-- <ul class="collapse show nav flex-column ms-1" id="submenu1" data-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="mb-2">
                        <a href="colddrink.php<?php echo $extra;?>" class="nav-link px-0 align-middle">
                            <i class="icon"><img class="img-fluid icon" src="../attachment/icons/cold-drink.png" ></i> <span class="ms-1 d-none d-md-none d-lg-inline d-sm-inline">Cold Drink</span></a>
                    </li>
                    <li class="mb-2">
                        <a href="#submenu2" data-toggle="collapse" data-target="#submenu2" class="nav-link px-0 align-middle ">
                            <i class="icon"><img class="img-fluid icon" src="../attachment/icons/burger.png" ></i> <span class="ms-1 d-none d-md-none d-lg-inline d-sm-inline">Burger</span></a>
                         <ul class="collapse nav flex-column ms-1" id="submenu2" data-parent="#menu">
                            <li class="w-100">
                                <a href="burgerveg.php<?php echo $extra;?>" class="nav-link px-0"> <i class="icon ml-3"><img class="img-fluid icon" src="../attachment/icons/veggie-burger.png" ></i><span class="d-none d-md-none d-lg-inline d-sm-inline">Veg</span> </a>
                            </li>
                            <li>
                                <a href="burgernon.php<?php echo $extra;?>" class="nav-link px-0 "><i class="icon ml-3"><img class="img-fluid icon" src="../attachment/icons/nburger.png" ></i> <span class="d-none d-md-none d-lg-inline d-sm-inline">Non-veg</span> </a>
                            </li>
                        </ul> 
                    </li>
                    <li class="mb-2">
                        <a href="#submenu3" data-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="icon"><img class="img-fluid icon" src="../attachment/icons/french fries.png" ></i> <span class="ms-1 d-none d-md-none d-lg-inline d-sm-inline">French Fries</span> </a>
                             <ul class="collapse nav flex-column ms-1" id="submenu3" data-parent="#menu">
                            <li class="w-100">
                                <a href="friesveg.php<?php echo $extra;?>" class="nav-link px-0"> <i class="icon ml-3"><img class="img-fluid icon" src="../attachment/icons/vfrench-fries.png" ></i><span class="d-none d-md-none d-lg-inline d-sm-inline">Veg</span> </a>
                            </li>
                            <li>
                                <a href="friesnon.php<?php echo $extra;?>" class="nav-link px-0"> <i class="icon ml-3"><img class="img-fluid icon" src="../attachment/icons/nfrench-fries.png" ></i><span class="d-none d-md-none d-lg-inline d-sm-inline">Non-veg</span> </a>
                            </li>
                            
                            
                        </ul> 
                    </li>
                    <li class="mb-2">
                        <a href="icecream.php<?php echo $extra;?>" class="nav-link px-0 align-middle">
                            <i class="icon"><img class="img-fluid icon" src="../attachment/icons/ice-cream.png" ></i> <span class="ms-1 d-none d-md-none d-lg-inline d-sm-inline">Ice Cream</span> </a>
                    </li>
                </ul>
                
                
            </div>
        </div>
        <div class="col py-3">
            
        
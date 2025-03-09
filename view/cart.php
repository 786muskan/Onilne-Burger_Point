<?php
	require("nav_cart.php");
	include('../controller/cartcontroller.php');
  	$obj =  new CartController();
  	if(isset($_SESSION['name'])){
  		//var_dump($_REQUEST['username']);
  	$an=$obj->CheckUsernames(trim($_REQUEST['username']));
  	$ans=$_REQUEST['ans'];
  	//var_dump($an);
  	$res=$obj->showCartItem((int)$an['id']);

  	//var_dump($res);
  	$sum=0;
  	if($res!=null){

  	for ($i=0; $i <count($res) ; $i++) {
  		$sum+=((int)$res[$i]['price']*(int)$res[$i]['quantity']);
  		}
	}
  	}
  	$or=isset($_REQUEST['order'])?$_REQUEST['order']:'';
  	if($or=='done'){
  			$order_id = $obj->createOrders((int)$an['id']);
  			$obj->AddOrderDetail((int)$an['id'], $order_id);
       		$obj->deleteCart((int)$an['id']);
       		$_REQUEST['order']='';
       		$user=$_REQUEST['username'];
       		echo "<script>window.location.href = 'home.php?username=$user & ans=$ans'</script>";
  	}
?>
<div class="container">
	<div class="card text-center p-3 mb-5 mt-5" >
        <div class="card-body ">
             <h2 class="card-title">Cart</h2>
             <hr>
             
             <div class="table-responsive">
                <table class="table ">
             	<?php  if(isset($_SESSION['name']) && $res!=null){
             	?>
             	<tr>
             		<th style="width:20%">SN</th>
             		<th style="width:50%">Product</th>
             		<th style="width:20%">Quantity</th>
             		<th style="width:20%">Unit Price</th>
             		<th style="width:20%">Total</th>
             	</tr>
             <?php 
             	for ($i=0; $i <count($res) ; $i++) { ?>
             		<tr class="card-text">
             			<td><?php echo ($i+1)?></td>
             			<td><?php echo $res[$i]['name']?></td>
             			<td><?php echo $res[$i]['quantity']?></td>
             			<td><?php echo $res[$i]['price']?></td>
             			<td><?php echo ((int)$res[$i]['price']*(int)$res[$i]['quantity'])?></td>
            		
             		</tr>
             	<?php
             	} 

             ?>
             <tr>
             	<td colspan="5"><hr></td>
             </tr>
             <tr>
             		<td colspan="4"><b>Total</b></td>
             		<td><b><?php echo $sum;?></b></td>
             </tr>
             
             <tr>
             	<td colspan="5"><hr></td>
             </tr>
             <tr>
             	<td colspan="5"><button type="button" name="" class="btn btn-outline-danger"><a href="cart.php?username=<?php echo $_REQUEST['username']?> &ans=<?php echo $ans ?> & order=done" class="text-decoration-none btn-outline-danger" >Order</a></button></td>
             </tr>
             

             <?php
             	}
             	else{
             		?>
             			<p class="card-text">Empty Cart</p>
             		<?php
             	}
             ?>
             </table>
             </div>
        </div>
    </div>
</div>
<?php
	require("footer.php");
	//session_destroy();
?>
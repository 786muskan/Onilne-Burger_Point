<?php 
include('../connection/config.php');
class CartModel
{
	public $config;
	public function __construct()
	{
		$con_obj = new Connection();
		$this->config = $con_obj->connect();
		
		
	}
	public function CheckUsername($username)
	{
		$query = "select * from users where username= '$username'";
		$object = mysqli_query($this->config,$query);

		
		$data = mysqli_fetch_assoc($object);
		//var_dump($data);
		//echo "string";
		if($data!=null){
			return $data;
		}
	}
	public function showCartItem($id)
	{
		$query = " SELECT p.name, p.price,COUNT(c.product_id) AS quantity FROM products p JOIN  cart c ON p.id = c.product_id where c.customer_Id= $id GROUP BY  p.name, p.price";
		$object = mysqli_query($this->config,$query);
		//var_dump($object);
		$data=[];
		while ($row = $object->fetch_array(MYSQLI_ASSOC)) {
		 	// code...
		 	$data[]=$row;
		 } 
		if($data!=null){
			return $data;
		}	
	
	}
	public function generateOrderNo() {
	    $alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $numbers = '0123456789';
	    
	    // Randomly select 3 alphabets
	    $randomAlphabets = '';
	    for ($i = 0; $i < 3; $i++) {
	        $randomAlphabets .= $alphabets[rand(0, strlen($alphabets) - 1)];
	    }
	    
	    // Randomly select 4 numbers
	    $randomNumbers = '';
	    for ($i = 0; $i < 4; $i++) {
	        $randomNumbers .= $numbers[rand(0, strlen($numbers) - 1)];
	    }
	    $query="select * from orders where order_no='".($randomAlphabets . $randomNumbers)."'";
	    $object = mysqli_query($this->config,$query);
	    $data = mysqli_fetch_assoc($object);
		//var_dump($data);
		//echo "string";
		if($data==null){
			return $randomAlphabets . $randomNumbers;
		}
		else
		{
			return generateOrderNo();
		}
	}

	public function createOrder($cid) {
    	$order_no = $this->generateOrderNo();  // Generate unique order number

    	$query = "INSERT INTO `orders` (user_id, order_no) 
            VALUES ($cid, '$order_no')";
    	mysqli_query($this->config, $query);
    
    	// Return the inserted order_id
    	return mysqli_insert_id($this->config);
	}
	public function AddToOrderDetail($cid, $order_id) {
	    // Get all products from the cart for the specific customer
	    $query = "SELECT cart.product_id, COUNT(cart.product_id) AS quantity
	            FROM cart
	            WHERE cart.customer_Id = $cid
	            GROUP BY cart.product_id;";
	    $result = mysqli_query($this->config, $query);
	    
	    while ($row = mysqli_fetch_assoc($result)) {
	        $product_id = $row['product_id'];
	        $quantity = $row['quantity'];

	        // Get the unit price from the product table
	        $sql_product = "SELECT products.price FROM products WHERE products.id = $product_id";
	        $result_product = mysqli_query($this->config, $sql_product);
	        $product = mysqli_fetch_assoc($result_product);
	        $unit_price = $product['price'];
	        $total_per_product = $unit_price * $quantity;

	        // Insert into orderdetail (non-prepared query)
	        $sql_insert = "INSERT INTO order_details (order_id, product_id, qty, price) 
	                       VALUES ($order_id, $product_id, $quantity, $total_per_product)";
	        mysqli_query($this->config, $sql_insert);
	    }
	}

	// Function to clear the cart after transferring to order
	public function clearCart( $customer_id) {
	    $sql = "DELETE FROM cart WHERE customer_Id = $customer_id";
	    mysqli_query($this->config, $sql);
	}

	
}	

?>
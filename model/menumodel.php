<?php 
include('../connection/config.php');
class MenuModel
{
	public $config;
	public function __construct()
	{
		$con_obj = new Connection();
		$this->config = $con_obj->connect();
		
		
	}
	public function AllProducts()
	{
		$query = "SELECT products.id,products.image,products.name,products.description,products.type,products.price from products inner join categories on products.category_id=categories.id where products.status='available'";
		$object = mysqli_query($this->config,$query);
		
		$data=[];
		while ($row = $object->fetch_array(MYSQLI_ASSOC)) {
		 	// code...
		 	$data[]=$row;
		 } 
		if($data!=null){
			return $data;
		}	
	}
	public function AllBurger($type)
{
    // Query to get the burger products based on category and type
    $query = "SELECT products.id, products.image, products.name, products.description, products.type, products.price
              FROM products
              INNER JOIN categories ON products.category_id = categories.id
              WHERE products.status = 'available' 
              AND categories.name = 'burgers' 
              AND products.type = '$type'";

    $object = mysqli_query($this->config, $query);  // Execute query
    
    // Initialize data array
    $data = [];

    // Check if query execution was successful and iterate over result
    if ($object) {
        while ($row = $object->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
    } else {
        // Handle error if query failed
        error_log("Query failed: " . mysqli_error($this->config));
    }
    // Return data (empty array if no results found)
    return $data;
}

	public function AllColdDrinks()
	{
		$query = " SELECT products.id,products.image,products.name,products.description,products.type,products.price from products inner join categories on products.category_id=categories.id where products.status='available' AND categories.name='cold drink'";
		$object = mysqli_query($this->config,$query);
		
		$data=[];
		while ($row = $object->fetch_array(MYSQLI_ASSOC)) {
		 	// code...
		 	$data[]=$row;
		 } 
		if($data!=null){
			return $data;
		}	
	}
	public function AllIceCream()
	{
		$query = " SELECT products.id,products.image,products.name,products.description,products.type,products.price from products inner join categories on products.category_id=categories.id where products.status='available' AND categories.name='Ice-cream'";
		$object = mysqli_query($this->config,$query);
		
		$data=[];
		while ($row = $object->fetch_array(MYSQLI_ASSOC)) {
		 	// code...
		 	$data[]=$row;
		 } 
		if($data!=null){
			return $data;
		}	
	}
	public function AllFries($type)
	{
		$query = " SELECT products.id,products.image,products.name,products.description,products.type,products.price from products inner join categories on products.category_id=categories.id where products.status='available' AND categories.name='French-Fries' AND products.type='$type'";
		$object = mysqli_query($this->config,$query);
		
		$data=[];
		while ($row = $object->fetch_array(MYSQLI_ASSOC)) {
		 	// code...
		 	$data[]=$row;
		 } 
		if($data!=null){
			return $data;
		}	
	}
	
		
	public function addCart($pid,$cid)
	{
		$query = " insert into cart (product_id,customer_Id) values($pid,$cid)";
		//var_dump($query);
		$ans = mysqli_query($this->config,$query);
		
		return $ans;
	}
	public function countcartitem($username)
{
    // Use JOIN to get the customer_id from the users table based on username
    $query = "SELECT COUNT(c.id) AS c 
              FROM cart c
              JOIN users u ON c.customer_Id = u.id
              WHERE u.username = '$username' AND u.type = 'customer'";  // Ensure type is 'customer'
    
    // Execute the query
    $object = mysqli_query($this->config, $query);

    // Fetch the result
    $ans = mysqli_fetch_assoc($object);

    // Return the result
    return $ans;
}

	public function searchCustomer($uname)
	{
		$query = " select id from users where username= '$uname'";
		$object = mysqli_query($this->config,$query);
		$ans=mysqli_fetch_assoc($object);
		//var_dump($ans);
		return $ans;
	
	}
	public function showPopularItem()
	{
		$query = " SELECT p.name,image  FROM products p JOIN order_details od ON p.id = od.product_id JOIN orders o ON o.id = od.order_id GROUP BY  p.id, p.name ORDER BY  SUM(od.qty) DESC LIMIT 10";
		//var_dump($query);
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
	
	
}	

?>
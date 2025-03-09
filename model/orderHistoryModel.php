<?php 
include('../connection/config.php');

class orderHistoryModel
{
    public $config;

    public function __construct()
    {
        $con_obj = new Connection();
        $this->config = $con_obj->connect();
    }

    // Check if the username exists
    public function CheckUsername($username)
    {
        $query = "SELECT * FROM users WHERE username= '$username'";
        $object = mysqli_query($this->config, $query);

        $data = mysqli_fetch_assoc($object);
        
        if ($data != null) {
            return $data;
        }
    }

    // Show the basic order history (order number, quantity, total)
    public function showHistory($id)
    {
        $query = "SELECT o.order_no AS `Order Number`, 
                         SUM(od.qty) AS `Total Quantity`, 
                         SUM(od.qty * p.price) AS `Total Amount` 
                  FROM users c 
                  JOIN orders o ON c.id = o.user_id 
                  JOIN order_details od ON o.id = od.order_id 
                  JOIN products p ON od.product_id = p.id 
                  WHERE c.id = $id 
                  GROUP BY o.order_no 
                  ORDER BY o.id";

        $object = mysqli_query($this->config, $query);
        $data = [];

        while ($row = mysqli_fetch_array($object, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        if ($data != null) {
            return $data;
        }
    }

    // Fetch detailed items for a specific order
    public function getOrderItems($orderId)
    {
        $query = "SELECT p.name AS `Product Name`, 
                         od.qty AS `Quantity`, 
                         p.price AS `Unit Price`, 
                         (od.qty * p.price) AS `Subtotal`
                  FROM order_details od 
                  JOIN products p ON od.product_id = p.id 
                  WHERE od.order_id = (SELECT orders.id FROM orders WHERE orders.order_no='$orderId')";

        $object = mysqli_query($this->config, $query);
        $data = [];

        while ($row = mysqli_fetch_array($object, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        if ($data != null) {
            return $data;
        }
    }

    // Update user profile (optional, if needed)
    public function UpdateProfile($name, $username, $phone, $address, $id)
    {
        $name = mysqli_real_escape_string($this->config, $name);
        $username = mysqli_real_escape_string($this->config, $username);
        $phone = mysqli_real_escape_string($this->config, $phone);
        $address = mysqli_real_escape_string($this->config, $address);
        $id = intval($id);
         $query = "UPDATE users SET 
              name='$name', 
              username='$username', 
              phone='$phone', 
              address='$address' 
              WHERE id=$id";
        $object = mysqli_query($this->config, $query);
    }
}

/*include('../connection/config.php');
class orderHistoryModel
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
	public function showHistory($id)
	{
		$query = " SELECT o.order_no AS `Order Number`,p.name AS `Product Name`,od.qty AS `Quantity`, p.price AS `Unit Price`, (od.qty * p.price) AS `Total` FROM  users c JOIN  orders o ON c.id = o.user_id JOIN  `order_details` od ON o.id = od.order_id JOIN  products p ON od.product_id = p.id WHERE  c.id = $id ORDER BY o.id";
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
	public function UpdateProfile(...$data)
	{
		var_dump($data);
		$query="UPDATE `users` SET `name`='".$data[0]."',`username`='".$data[1]."',`phone`='".$data[2]."',`address`='".$data[3]."' WHERE id=".$data[4];
		$object = mysqli_query($this->config,$query);
	}
}
*/?>
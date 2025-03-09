<?php
include("../model/orderHistoryModel.php");

class OrderHistoryController
{
    public $order;

    public function __construct()
    {
        $this->order = new orderHistoryModel();
    }

    // Fetch the basic order history (order number, total quantity, total amount)
    public function showOrderHistory($id)
    {
        return $this->order->showHistory($id);
    }

    // Check if username exists
    public function CheckUsernames($username)
    {
        return $this->order->CheckUsername($username);
    }

    // Update user profile (optional, if needed)
    public function UpdateUserProfile($name, $username, $phone, $address, $id)
    {
        return $this->order->UpdateProfile($name, $username, $phone, $address, $id);
    }

    // Fetch the detailed items for a specific order
    public function getOrderDetails($orderId)
    {
        return $this->order->getOrderItems($orderId);
    }
}

// include("../model/orderHistoryModel.php");
// class OrderHistoryController
// {
// 	public $order;
// 	public function __construct()
// 	{
// 		$this->order = new orderHistoryModel();
// 	}
	
// 	public function showOrderHistory($id){

// 		return $this->order->showHistory($id);
// 	}
// 	public function CheckUsernames($username){

// 		return $this->order->CheckUsername($username);
// 	}
// 	public function UpdateUserProfile(...$data){

// 		return $this->order->UpdateProfile($data);
// 	}
// }

?>
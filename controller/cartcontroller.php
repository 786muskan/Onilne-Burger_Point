<?php 
include("../model/cartmodel.php");
class CartController
{
	public $cart;
	public function __construct()
	{
		$this->cart = new CartModel();
	}
	
	public function showCartItem($id){

		return $this->cart->showCartItem($id);
	}
	public function CheckUsernames($username){

		return $this->cart->CheckUsername($username);
	}
	public function createOrders($cid){

		return $this->cart->createOrder($cid);
	}
	public function AddOrderDetail($cid, $order_id){

		return $this->cart->AddToOrderDetail($cid, $order_id);
	}
	public function deleteCart( $customer_id){

		return $this->cart->clearCart( $customer_id);
	}
	

}
?>
<?php 
include("../model/menumodel.php");
class MenuController
{
	public $menu;
	public function __construct()
	{
		$this->menu = new MenuModel();
	}
	public function allProduct()
	{
		return $this->menu->AllProducts();
	}
	public function allburger($type)
	{
		return $this->menu->AllBurger($type);
	}
	public function allcolddrinks()
	{
		return $this->menu->AllColdDrinks();
	}
	public function allicecream()
	{
		return $this->menu->AllIceCream();
	}
	public function allfries($type)
	{
		return $this->menu->AllFries($type);
	}
	public function addtocart($pid,$cid)
	{
		return $this->menu->addCart($pid,$cid);
	}
	public function searchCustomerController($uname)
	{
		return $this->menu->searchCustomer($uname);
	}
	public function countcart($username){
		//var_dump($id);
		return $this->menu->countcartitem($username);
	}
	public function showPopularItems(){

		return $this->menu->showPopularItem();
	}

}
?>
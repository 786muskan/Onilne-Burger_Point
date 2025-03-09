<?php 
class Connection
{
	public $conn;
	public function connect()
	{
		$this->conn = mysqli_connect("localhost","root","","burgerwurger");
		if($this->conn)
		{
			//echo "connected!!";
		}
		return $this->conn;
	}
}

?>
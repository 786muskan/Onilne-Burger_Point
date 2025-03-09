<?php
include('../connection/config.php');

class LoginModel {
    public $config;

    public function __construct() {
        $con_obj = new Connection();
        $this->config = $con_obj->connect();
    }

    public function CheckUser($username, $pass) {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$pass' AND type = 'customer'";
        $object = mysqli_query($this->config, $query);
        $data = mysqli_fetch_assoc($object);

        if ($data != null) {
            return $data;
        }
        return null;
    }

    public function CheckUsername($username) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $object = mysqli_query($this->config, $query);
        $data = mysqli_fetch_assoc($object);

        if ($data != null) {
            return $data;
        }
        return null;
    }

    public function checkPhone($phone) {
        $query = "SELECT * FROM users WHERE phone = '$phone'";
        $object = mysqli_query($this->config, $query);
        $phone = mysqli_fetch_assoc($object);

        if ($phone != null) {
            return $phone;
        }
        return null;
    }

    public function addCustomer($name, $phone, $address, $uname, $pass) {
        $query = "INSERT INTO `users`(`name`, `username`, `password`, `phone`, `address`) VALUES ('$name', '$uname', '$pass', '$phone', '$address')";
        $object = mysqli_query($this->config, $query);
        return $object;
    }
}
?>

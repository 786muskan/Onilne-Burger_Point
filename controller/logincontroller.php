<?php
include('../model/loginmodel.php');

class LoginController {
    public $login_us;

    public function __construct() {
        $this->login_us = new LoginModel();
    }

    public function CheckUserController($username, $pass) {
        return $this->login_us->CheckUser($username, $pass);
    }

    public function CheckUsernameController($username) {
        return $this->login_us->CheckUsername($username);
    }

    public function CheckPhoneController($phone) {
        return $this->login_us->checkPhone($phone);
    }

    public function addCustomerController($name, $phone, $address, $uname, $pass) {
        return $this->login_us->addCustomer($name, $phone, $address, $uname, $pass);
    }

    public function loginUser($username, $password) {
        $user = $this->CheckUserController($username, $password);
        
        if ($user) {
           // $_SESSION['id'] = $user['id']; // Store user ID in session
           // $_SESSION['username'] = $user['username']; // Store username in session
            header('Location: home.php'); 
            // Redirect to home page after login
        } else {
            echo "Invalid credentials.";
        }
    }
}
?>

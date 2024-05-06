<?php

class AfterAuth
{
    public $HiiEComm;
    public $public;

    function __construct()
    {
        require_once 'Model/User.php';
        require_once 'Model/User_details.php';
        require_once 'Model/Country.php';
        $local = require_once 'config.php';
        $this->HiiEComm = $local['HiiEComm'];
        $this->public = $local['Public'];
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: /Admin');
            exit();
        }

        if(isset($_POST['logout'])){
            echo "console.log('logout')";
            session_start();
            session_unset();
            session_destroy();
            header("Location: /Admin");
            exit();
        } 
    }

    public function index()
    {
        $heading = "Dashboard";
        $user = new User($this->HiiEComm, "", "", "", $_SESSION['email']);
        $detail = $user->findByEmail($_SESSION['email']);
        $user_details = new User_details($this->HiiEComm);
        $name = $detail['fname'] . " " . $detail['lname'];
        $role = $detail['user_type'];
        if($role == 1){
            $image = $user_details->getImage($role)['image'];
        }
        require_once 'View/index.view.php';
    }
    
    public function vendor()
    {
        $heading = "Vendors";
        $user = new User($this->HiiEComm, "", "", "", $_SESSION['email']);
        $detail = $user->findByEmail($_SESSION['email']);
        $name = $detail['fname'] . " " . $detail['lname'];
        $role = $detail['user_type'];
        $user_details = new User_details($this->HiiEComm);
        $image = $user_details->getImage($detail['id'])['image'];
        $country = new Country($this->public);
        $countries = $country->getCountries();
        require_once 'View/vendor.view.php';
    }

    public function adminProfile(){
        $heading = "Profile";
        $email = $_SESSION['email'];
        $user = new User($this->HiiEComm, "", "", "", $_SESSION['email']);
        $detail = $user->findByEmail($_SESSION['email']);
        $phone = $detail['phone'];
        $name = $detail['fname'] . " " . $detail['lname'];
        $role = $detail['id'];
        $user_details = new User_details($this->HiiEComm);
        $extraDetails = $user_details->getAll($role);
        $gender = $extraDetails['gender'];
        $hobbies = $extraDetails['hobbie1'] . ", " . $extraDetails['hobbie2'] ;
        $address = $extraDetails['zip'] . ", " . $extraDetails['city'] . ", " . $extraDetails['state'];
        $image = $user_details->getImage($role)['image'];
        require_once 'View/profile.view.php';
    }

    public function updateProfile(){
        $heading = "Update Profile";
        $email = $_SESSION['email'];
        $user = new User($this->HiiEComm, "", "", "", $_SESSION['email']);
        $detail = $user->findByEmail($_SESSION['email']);
        $phone = $detail['phone'];
        $name = $detail['fname'] . " " . $detail['lname'];
        $role = $detail['id'];
        $user_details = new User_details($this->HiiEComm);
        $extraDetails = $user_details->getAll($role);
        $gender = $extraDetails['gender'];
        $hobbies = $extraDetails['hobbie1'] . ", " . $extraDetails['hobbie2'] ;
        $zip = $extraDetails['zip'];
        $city = $extraDetails['city'];
        $state = $extraDetails['state'];
        $image = $user_details->getImage($role)['image'];

        require_once 'View/updateProfile.view.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: /Admin');
        exit();
    }

}
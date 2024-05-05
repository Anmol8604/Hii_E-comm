<?php

class AfterAuth
{
    public $config;

    function __construct()
    {
        require_once 'Model/User.php';
        $this->config = require_once 'config.php';
        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: /Admin/');
            exit();
        }

        if(isset($_POST['logout'])){
            echo "console.log('logout')";
            session_start();
            session_unset();
            session_destroy();
            header("Location: /Admin/");
            exit();
        } 
    }

    public function index()
    {
        $heading = "Dashboard";
        $user = new User($this->config, "", "", "", $_SESSION['email']);
        $user = $user->findByEmail($_SESSION['email']);
        $name = $user['fname'] . " " . $user['lname'];
        require_once 'View/index.view.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: /Admin');
        exit();
    }
}
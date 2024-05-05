<?php

if (isset($_POST['email'])) {
    require_once '../Model/User.php';
    require_once '../Controller/Database.php';
    $config = require '../config.php';
    
    $user = new User($config);
    $email = $_POST['email'];
    $res = $user->findByEmail($email);
    if ($res) {
        echo "Success";
    }
}

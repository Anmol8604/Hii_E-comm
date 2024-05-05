<?php

class Validations{
    function validateEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }

    function validatePassword($password){
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/", $password)){
            return true;
        }
        else{
            return false;
        }
    }

    function validateName($name){
        if(preg_match("/^[a-zA-Z-' ]*$/", $name)){
            return true;
        }
        else{
            return false;
        }
    }

    function validatePhone($phone){
        if(preg_match("/^[0-9]{10}$/", $phone)){
            return true;
        }
        else{
            return false;
        }
    }

    function validateTerms($terms){
        if($terms == "on"){
            return true;
        }
        else{
            return false;
        }
    }
    
}
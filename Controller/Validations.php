<?php

class Validations{

    function validateZip($zip){
        if(preg_match("/^[0-9]{6}$/", $zip)){
            return true;
        }
        else{
            return false;
        }
    }

    function validateCity($city){
        if(preg_match("/^[a-zA-Z-' ]*$/", $city)){
            return true;
        }
        else{
            return false;
        }
    }

    function validateState($state){
        if(preg_match("/^[a-zA-Z-' ]*$/", $state)){
            return true;
        }
        else{
            return false;
        }
    }

    function validateGender($gender){
        if(isset($gender)){
            return true;
        }
        else{
            return false;
        }
    }

    function validateHobbies($hobbies){
        if(isset($hobbies)){
            return true;
        }
        else{
            return false;
        }
    }

    function validateImage($image){
        if(isset($image) && $image != ""){
            return true;
        }
        else{
            return false;
        }
    }

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
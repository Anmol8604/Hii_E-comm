<?php

class City {
    private $id;
    private $name;
    private $state_id;
    private $state_code;
    private $country_id;
    private $conn;

    public function __construct($config, $id = null, $name = null, $state_id = null, $state_code = null, $country_id = null){
        require_once '../Controller/Database.php';
        if(is_array($config)){
            $db = new Database($config);
            $this->conn = $db->connect();
        }
        $this->id = $id;
        $this->name = $name;
        $this->state_id = $state_id;
        $this->state_code = $state_code;
        $this->country_id = $country_id;
    }

    public function getCity($state_id){
        $query = "SELECT id, name FROM `cities` WHERE state_id = " . $state_id . " ORDER BY name";
        $result = $this->conn->query($query);
        $states = $result->fetchAll();
        return $states;
    }

}
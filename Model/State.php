<?php

class State {
    private $id;
    private $name;
    private $country_id;
    private $conn;
    
    public function __construct($config, $id = null, $name = null, $country_id = null){
        require_once '../Controller/Database.php';
        if(is_array($config)){
            $db = new Database($config);
            $this->conn = $db->connect();
        }
        $this->id = $id;
        $this->name = $name;
        $this->country_id = $country_id;
    }

    public function getStates($country_id){
        $query = "SELECT id, name FROM `states` WHERE country_id = " . $country_id . " ORDER BY name";
        $result = $this->conn->query($query);
        $states = $result->fetchAll();
        return $states;
    }
}
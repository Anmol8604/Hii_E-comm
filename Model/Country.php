<?php

class Country {
    private $id;
    private $name;
    private $region;
    private $region_id;
    private $subregion;
    private $subregion_id;
    private $conn;

    public function __construct($config, $id = null, $name = null, $region = null, $region_id = null, $subregion_id = null, $subregion = null){
        if(is_array($config)){
            $db = new Database($config);
            $this->conn = $db->connect();
        }
        $this->id = $id;
        $this->name = $name;
        $this->region = $region;
        $this->region_id = $region_id;
        $this->subregion = $subregion;
        $this->subregion_id = $subregion_id;
    }

    public function getCountries(){
        $query = 'SELECT id, name FROM countries';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
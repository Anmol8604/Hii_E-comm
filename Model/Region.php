<?php

class Region {
    private $id;
    private $name;
    private $conn;

    public function __construct($config, $id = null, $name = null){
        if(is_array($config)){
            $db = new Database($config);
            $this->conn = $db->connect();
        }
        $this->id = $id;
        $this->name = $name;
    }

}
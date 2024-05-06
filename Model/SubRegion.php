<?php
class SubRegion {
    private $id;
    private $name;
    private $region_id;
    private $conn;

    public function __construct($config, $id = null, $name = null, $region_id = null){
        if(is_array($config)){
            $db = new Database($config);
            $this->conn = $db->connect();
        }
        $this->id = $id;
        $this->name = $name;
        $this->region_id = $region_id;
    }

}
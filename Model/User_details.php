<?php

class User_details
{
    private $user_id;
    private $image;
    private $zip;
    private $city;
    private $state;
    private $Country;
    private $gender;
    private $hobbie1;
    private $hobbie2;
    private $Btype;
    private $Bname;
    private $time;
    private $conn;

    public function __construct($config, $user_id = null, $image = null, $zip = null, $city = null, $state = null, $Country = null, $gender = null, $hobbie1 = null, $hobbie2 = null, $Btype = null, $Bname = null)
    {
        if(is_array($config)){
            $db = new Database($config);
            $this->conn = $db->connect();
        }
        $this->user_id = $user_id;
        $this->image = $image;
        $this->zip = $zip;
        $this->city = $city;
        $this->state = $state;
        $this->Country = $Country;
        $this->gender = $gender;
        $this->hobbie1 = $hobbie1;
        $this->hobbie2 = $hobbie2;
        $this->Btype = $Btype;
        $this->Bname = $Bname;
        $this->time = date('Y-m-d H:i:s');
    }

    public function save()
    {
        $sql = "INSERT INTO user_details (user_id, image, zip, city, state, Country, gender, hobbie1, hobbie2, Btype, Bname, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $this->user_id,
            $this->image,
            $this->zip,
            $this->city,
            $this->state,
            $this->Country,
            $this->gender,
            $this->hobbie1,
            $this->hobbie2,
            $this->Btype,
            $this->Bname,
            $this->time,
            $this->time
        ]);
    }

    public function getImage($id)
    {
        $sql = "SELECT image FROM user_details WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getAll($user_id){
        $sql = "SELECT * FROM user_details WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch();
    }

}
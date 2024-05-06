<?php

class User {
    private $user_type;
    private $fname;
    private $lname;
    private $email;
    private $phone;
    private $password;
    private $token;
    private $status;
    private $time;
    private $conn;

    public function __construct($config, $user_type=null, $fname=null, $lname=null, $email=null, $phone=null, $password=null, $token = null, $status = 0){
        if(is_array($config)){
            $db = new Database($config);
            $this->conn = $db->connect();
        }
        $this->user_type = $user_type;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->token = $token;
        $this->status = $status;
        $this->time = date('Y-m-d H:i:s');

    }

    public function save(){
        $sql = "INSERT INTO users (user_type, fname, lname, email, phone, password, token, status, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->execute([
            $this->user_type,
            $this->fname,
            $this->lname,
            $this->email,
            $this->phone,
            $this->password,
            $this->token,
            $this->status,
            $this->time,
            $this->time
        ]);
    }

    public function findByEmail($email){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
       return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }

    public function getStatus($email){
        $sql = "SELECT status FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['status'];
    }

    public function updateStatus($email){
        $sql = "UPDATE users SET status = 1 WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
    }

    public function vendorCount(){
        $sql = "SELECT COUNT(*) FROM users WHERE user_type = 2";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];
    }

    public function updateToken($email, $token){
        $sql = "UPDATE users SET token = :token WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'token' => $token]);
    }

    public function updatePassword($token, $password){
        $sql = "UPDATE users SET password = :password, token = :token WHERE token = :token";
        $stmt = $this->conn->prepare($sql);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute(['token' => $token, 'password' => $password]);   
    }
}
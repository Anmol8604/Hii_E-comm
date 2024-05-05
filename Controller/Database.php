<?php
class Database{
    private $host;
    private $dbname;
    private $username;
    private $password;
    
    public function __construct($config = null){
            $this->host = $config["host"];
            $this->dbname = $config["dbname"];
            $this->username = $config["username"];
            $this->password = $config["password"];
    }

    public function connect(){
        try {
            $dsn = "mysql:".http_build_query([
                'host' => $this->host,
                'dbname' => $this->dbname
            ], "", ";");
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
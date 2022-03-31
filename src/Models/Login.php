<?php

namespace Blog\Models;

use Blog\Config\Database;
use PDO;
use PDOException;

class Login 
{
    public $userId;
    public $username;
    public $email;
    public $password;

    public static function auth($email, $password) { 
        $info = null;
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;     

        $dsn="mysql:host=$host;dbname=$dbname";
        $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("Select * from user where email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        //print_r($row);exit;
        if(!empty($row)){
            $info = new Login;
            $info->userId = $row['user_id'];
            $info->username =  $row['user_name'];
            $info->email = $row['email'];
            $info->password = $row['password'];
        }
        
        return $info;
    }
    public function register(){
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;

        try {
            $dsn="mysql:host=$host;dbname=$dbname";
            $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "Insert into user(user_name, email, password) values (:username, :email, :password)";
            $stmt = $conn->prepare($sql);            
            $stmt->bindParam(':username', $this->username);            
            $stmt->bindParam(':email', $this->email);            
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
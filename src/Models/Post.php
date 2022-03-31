<?php

namespace Blog\Models;

use Blog\Config\Database;
use PDO;
use PDOException;

class Post 
{
    public $id;
    public $title;
    public $content;
    public $userId;

    public function save() {
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;

        try {
            $dsn="mysql:host=$host;dbname=$dbname";
            $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // insert sql
            $sql = "Insert into posts(title, content, user_id,publish) values (:title, :content, :userID,0)";
            $stmt = $conn->prepare($sql);            
            $stmt->bindParam(':title', $this->title);            
            $stmt->bindParam(':content', $this->content);            
            $stmt->bindParam(':userID', $this->userId);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function update()
    {
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;

        try {
            $dsn="mysql:host=$host;dbname=$dbname";
            $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // insert sql
            $sql = "update posts set title=:title, content=:content, user_id=:userID where post_id=:id";
            $stmt = $conn->prepare($sql);            
            $stmt->bindParam(':title', $this->title);            
            $stmt->bindParam(':content', $this->content);            
            $stmt->bindParam(':userID', $this->userId);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function all($userid,$per_page,$offset =0) {
        $posts = [];
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;     

        $dsn="mysql:host=$host;dbname=$dbname";
        $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$per_page = 2;
        //$offset = $per_page * $page_no;
        $post_data = $conn->prepare("Select * from posts WHERE user_id = '$userid' LIMIT ".$offset.", ".$per_page);
        $post_data->execute();

        //var_dump($post_data->fetchAll());
        foreach($post_data->fetchAll() as $row) {
            $posts[] = [
                'id' => $row['post_id'],
                'title' => $row['title'],
                'content' => $row['content'],
                'user_id' => $row['user_id'],
                'publish' => $row['publish'],
             ];
        }

        return $posts;
    }
    public static function getTotal($userid,$per_page){
        $posts = [];
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;     

        $dsn="mysql:host=$host;dbname=$dbname";
        $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SELECT ALL to get number of pagination
        $stmt = $conn->prepare("Select count(*) AS count_post from posts where user_id = :userid");
        $stmt->bindParam(':userid', $userid);         
        $stmt->execute();

        $total_page = $stmt->fetchColumn();
        $pagination = ceil($total_page / $per_page);
        return $pagination;
    }

    public static function show($id) { 
        $post = null;
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;     

        $dsn="mysql:host=$host;dbname=$dbname";
        $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("Select * from posts where post_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        $post = new Post;
        $post->id = $row['post_id'];
        $post->title = $row['title'];
        $post->content = $row['content'];
        $post->userId = $row['user_id'];
        
        return $post;
    }
    public function publish($id,$val){
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;

        try {
            $dsn="mysql:host=$host;dbname=$dbname";
            $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // insert sql
            $sql = "update posts set publish= :value where post_id=:id";
            $stmt = $conn->prepare($sql);            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':value', $val);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public static function getPublishPost(){
        $posts = [];
        // connect
        $host=Database::HOST_NAME;
        $dbname=Database::DB_NAME;     

        $dsn="mysql:host=$host;dbname=$dbname";
        $conn = new PDO($dsn, Database::USERNAME, Database::PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $post_data = $conn->prepare("Select p.*, u.user_name from posts p inner join user u on p.user_id = u.user_id where publish=1");
        $post_data->execute();
        foreach($post_data->fetchAll() as $row) {
            $posts[] = [
                'id' => $row['post_id'],
                'title' => $row['title'],
                'content' => $row['content'],
                'user_id' => $row['user_id'],
                'user_name' => $row['user_name'],
                'publish_date' => $row['publish_date'],
             ];
        }

        return $posts;
    }
}
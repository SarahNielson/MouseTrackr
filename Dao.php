<?php

class Dao{
	private $host= "us-cdbr-iron-east-03.cleardb.net";
	private $db= "heroku_ded9546adc97a47";
	private $user= "b7a361e8e4c438";
	private $pass= "f6d4c086";
public function getConnection(){
	return new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user, $this->pass);
}

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("select * from comment order by date_created desc", PDO::FETCH_ASSOC);
  }
  public function getUsers ($email, $password) {
    $conn = $this->getConnection();
	 return $conn->query("select name from user where email= {$email} and password= {$password}", PDO::FETCH_ASSOC);
//$saveQuery= "select name from user where email= :email and password= :password";
   // $q = $conn->prepare($saveQuery);
   // $q->bindParam(":email", $email);
   // $q->bindParam(":password", $password);
//foreach ($conn->query($saveQuery) as $row) {
//    return $row['name'];
//}
    //$q->execute();

  }

public function getUser ($email, $password) {
    $conn = $this->getConnection();
$saveQuery= "select * from user where email= :email and password= :password";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":email", $email);
    $q->bindParam(":password", $password);
    $q->execute();
     $rows=$q->rowCount();
   return $rows;
  }
public function checkUser ($email) {
    $conn = $this->getConnection();
$saveQuery= "select * from user where email= :email";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":email", $email);
    $q->execute();
     $rows=$q->rowCount();
   return $rows;
  }

  public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (date_created, comment_content) values (CURRENT_TIMESTAMP, :comment_content)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment_content", $comment);
    $q->execute();
  }

 public function createUser ($userName, $email, $password) {
    $conn = $this->getConnection();
    //$passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
    $saveQuery = "insert into user (name, email, password) values (:name, :email, :password)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $userName);
    $q->bindParam(":email", $email);
    $q->bindParam(":password", $password);
    $q->execute();


  }
   
}
?>
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
	 return $conn->query("select *  from user", PDO::FETCH_ASSOC);
  }

public function getUser ($email, $password) {
    $conn = $this->getConnection();
	//return $conn->query("select username, password from user where email= {$email}", PDO::FETCH_ASSOC);
$saveQuery= "select username, password from user where email= :email";
      $q = $conn->prepare($saveQuery);
if ($q){
   $q->bindParam(":email", $email);
    //$q->bindParam(":password", $password);
   $status= $q->execute();
 // if( !$status )throw new Exception('',3);
   $rows=$q->rowCount();
//if( !$rows > 0 )throw new Exception('',4);

    $result = $q->fetchObject();
     $q->closeCursor();
/* password_verify is available from PHP 5.5 onwards ~ I have 5.3.2 :( */
 // if( $result && function_exists('password_verify') && password_verify( $password, $result->password ) ){
if($password == $result->password ) ){
                            /* valid */
                             $_SESSION['email']=$email;
                             //exit( header('Location: index.php') );
          }else{
		$_SESSION['loggin_in']=false;
                             exit( header('Location: about.php') );
		}
}
   // $row = $q->fetch(PDO::FETCH_ASSOC);
   //if($row['num'] <1){
        //die('That username doesn't exist!');
   // }else{
	//return conn->$query= ("select * from user where email= {$email} and password={$password}", PDO::FETCH_ASSOC);
//}
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
// $row = $q->fetch(PDO::FETCH_ASSOC);
  //  if($row['num'] > 0){
   //     die('That username already exists!');

  }
   
}
?>
<?php
//require_once 'KLogger.php';
class Dao{
	private $host= "us-cdbr-iron-east-03.cleardb.net";
	private $db= "heroku_ded9546adc97a47";
	private $user= "b7a361e8e4c438";
	private $pass= "f6d4c086";
//public function getConnection(){
//	return new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user, $this->pass);
//}

protected $logger;
  public function __construct () {
    $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
  }
  public function getConnection () {
    $this->logger->LogDebug("Getting a connection.");
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      $this->logger->LogError(__CLASS__ . "::" . __FUNCTION__ . " The database exploded " . print_r($e,1));
      echo print_r($e,1);
      exit;
    }
    return $conn;
  }
  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM comment", PDO::FETCH_ASSOC);
  }
  public function getUser ($userName) {
    $conn = $this->getConnection();
	 return $conn->query("select *  from user where name = {$userName}", PDO::FETCH_ASSOC);
  }
  public function saveComment ($comment) {
    $this->logger->LogInfo("Saving a comment [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "INSERT INTO comment
        (comment)
        VALUES
        (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

 public function createUser ($userName, $email, $password) {
    $this->logger->LogInfo("Saving a user [{$userName}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into user (name, email, password) values (:name, :email, :password)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $userName);
    $q->bindParam(":email", $email);
    $q->bindParam(":password", $password);
    $q->execute();
  }
}
?>
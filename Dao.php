<?php
class Dao{
	private $host= "us-cdbr-iron-east-03.cleardb.net";
	private $db= "heroku_ded9546adc97a47";
	private $user= "b7a361e8e4c438";
	private $pass= "f6d4c086";
	public function getConnection(){
		return new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user, $this->pass);
	}
}
mysql --user="b7a361e8e4c438" --password="f6d4c086" heroku_ded9546adc97a47 --host="us-cdbr-iron-east-03.cleardb.net"
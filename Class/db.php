<?php

//Class BD for connection with database. Instance Class DB and with that object call getConnection method every time when connection is need

Class DB {
    
	private $conn;

	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "biblioteka";

	function __construct(){

		try{
            
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username, $this->password);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		catch(PDOException $e)
		{
			echo "Bezuspesna konekcija: " . $e->getMessage();
		}
	}

    //Function getConnection returns connection to database
	public function getConnection(){

		return $this->conn;
	}
    
    //Disconnect from database
	public function disconnect() {
		$this->conn = null;
	}

	
}

?>

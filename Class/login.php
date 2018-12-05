<?php
session_start();

//import file db.php with DB Class
require_once 'db.php';

Class Login{

	private $response = array();

	private $username;
	private $password;

	function __construct($user,$pass){
        
        //testing if user data are valid. if it is not, set response error and generate message.
        if(strlen($user) == 0 || strlen($pass) == 0){

        	$this->response['error'] = true;
	    	$this->response['message'] = "Molimo Vas unesite korisničko ime i lozinku.";
        }
        else {
            
            //if data is valid set class atributes an call loginuser() method
        	$this->username = $user;
        	$this->password = $pass;

        	$this->loginuser();
        }
	}

	public function loginuser(){

        //instance of Class DB and opening connection to db
		$db = new DB();
		$conn = $db->getConnection();

        //forwarding query to connection string and retrive users which try to log in. If such user exist in db set his data in SESSION or else display error
	    $sql = "SELECT * FROM users 
	            WHERE username = '$this->username'";

	    $result = $conn->query($sql);
        
	    if($result->rowCount() > 0){
            
	    	$asocResult = $result->fetch(PDO::FETCH_ASSOC);

	    	if(password_verify($this->password,$asocResult['password'])){

	    	$_SESSION['username'] = $this->username;
	    	$_SESSION['user_type'] = $asocResult['user_type'];
            $_SESSION['firstName'] = $asocResult['firstName'];
            $_SESSION['lastName'] = $asocResult['lastName'];
	    	
	    	$this->response['error'] = false;
	    	$this->response['message'] = "Uspešan login. Redirekcija za 3 sekunde...";
	    } else {
			$this->response['error'] = true;
	    	$this->response['message'] = "Uneli ste pogrešnu šifru. Molimo Vas pokušajte ponovo";
	       }
	    } else {

	    	$this->response['error'] = true;
	    	$this->response['message'] = "Sa zadatim kredencijalima nema korisnika u bazi!";
	    	
	    }
        
	    echo json_encode($this->response);
	}
}
//if there is user with this credetials in db, instance Class Login which will automaticly login user
if(!empty($_POST['user']) && !empty($_POST['pass'])){
	$login = new Login($_REQUEST['user'], $_REQUEST['pass']);
}

?>
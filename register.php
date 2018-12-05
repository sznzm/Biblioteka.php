<?php


     require_once 'header.php';

      //inport db file, instance Class DB and call method getConnection to connect database
      require_once 'Class/db.php';
      $db = new DB();
      $conn = $db->getConnection();



try{

        //if user set register button, check if user with that username already exist, hash password and insert data to the data base

        if(isset($_POST['reg'])){

         $username = $_POST['username'];
         $email = $_POST['email'];
         $firstName = $_POST['firstName'];
         $lastName = $_POST['lastName'];
         $password = $_POST['password'];
         $confirm = $_POST['confirm'];
        
        
        $sql = "SELECT username FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        
        
        if($result->rowCount() > 0){

          echo "<p>U bazi već postoji korisnik sa tim imenom</p><br>";

        } else {
        
         
         if($password != $confirm){

           echo "<p>Molimo Vas proverite svoju šifru</p><br>";

         } else  {
           
           $hash = password_hash($password, PASSWORD_DEFAULT);
           
           $sql = ("INSERT INTO users(`username`, `email`, `password`,`firstName`, `lastName`) 
                    VALUES('$username', '$email', '$hash', '$firstName', '$lastName')");

           $conn->exec($sql);
          
          echo "<p>Uspešno ste se registrovali</p><br>";
          header("Refresh:1; url=index.php");
        }
       
         
     }

   }
}
catch(PDOException $e){

  echo "Bezuspesna konekcija: " . $e->getMessage();
}

?>

<div id="regDiv">
 <form id="register" name="register" onsubmit="return regValidation();" method="post" action="register.php">
     
       <h2>REGISTRACIJA</h2><br>
         Username:<input type="text" name="username" value="">
         <span id="username_error"></span><br>
         Email: <input type="email" name="email" value="">
         <span id="email_error"></span><br>
         First name: <input type="text" name="firstName" value="">
         <span id="fName_error"></span><br>
         Last name: <input type="text" name="lastName" value="">
         <span id="lName_error"></span><br>
         Password:<input type="password" name="password" value="">
         <span id="pass_error"></span><br>
         Confirm password:<input type="password" name="confirm" value="">
         <span id="confirm_error"></span><br>
         <input type="submit"   name="reg" value="Registracija">
</form>
</div>
<?php

?>

<script src="js/validation.js"></script>

<?php

require_once 'footer.php';

?>
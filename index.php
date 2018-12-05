<?php


if(!isset($_SESSION))
	session_start();

require_once 'header.php';


?>

  <div id="login">
	<form id="loginForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Username: <input type="text" name="user"><br>
		Password: <input type="password" name="pass">
		<button type="button" id="loginButton">Log In</button>
		<div id="msg"></div>
	</form>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/main.js"></script>

<?php

require_once 'footer.php';

?>
<?php

if(!isset($_SESSION))
	session_start();

require_once 'header.php';


//import class helper for displaying message
require_once 'Class/helper.php';


//if there is user in SESSION he is already loged in, so display his data and show him different option in depend of his type
if(isset($_SESSION['username'])){
    
	$user_type = $_SESSION['user_type'];
    
	echo "<p>Pozdrav " . Helper::stringCut($_SESSION['firstName'], $_SESSION['lastName'])  . " Odaberite opciju</p><br>";

	?>

	<!-- Display diferent otion for action in depend of user type -->
  <div id="options">
	<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="submit" name="action" value="Pretraga">

		<?php if($user_type == 1) { ?>
                 <input type="submit" name="action" value="Briši">
                 <input type="submit" name="action" value="Dodaj">
   		<?php } 

   		      elseif($user_type == 2) { ?>
                 <input type="submit" name="action" value="Dodaj">
   		<?php } ?>

   		<input type="submit" name="action" value="Log out">
	</form>
   </div>
  <?php
}

//if some of form action is set, import relevant page or log out, session destroy and redirect 
if(isset($_GET['action'])){

	$action = $_GET['action'];

	switch ($action) {
		case 'Pretraga':
			require_once 'search.php';
			break;
	    case 'Briši':
	        require_once 'delete.php';
	    	break;
		case 'Dodaj':
		    require_once 'add.php';
		    break;
        case 'Log out';
             session_destroy();
             echo "<p>Uspešno ste se izlogovali</p>";
             header("Refresh:1; url=index.php");
	}
}


require_once 'footer.php';

?>

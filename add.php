<?php

require_once "header.php";

require_once 'Class/db.php';

//instance  Class DB and call getConnection method for connecting db
$db = new DB();
$conn = $db->getConnection();

try{

    //select data from table and return it into associative array
	$sql = 'SELECT * FROM jezik';
	$result = $conn->query($sql);
	$language = $result->fetchall(PDO::FETCH_ASSOC);

	$sql = "SELECT * FROM zanr";
	$result = $conn->query($sql);
	$genre = $result->fetchall(PDO::FETCH_ASSOC);

}
catch(PDOException $e)
{
	echo "Bezuspesna konekcija: " . $e->getMessage();
}

?>
<br>

<!-- Form for adding new data   -->
<div id="add">
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	Naslov: <input type="text" name="title" placeholder="Uneti naslov knjige"><br>
	Autor: <input type="text" name="author" placeholder="Uneti ime pisca"><br>
	Godina:<input type="text" name="year" placeholder="Uneti godinu izdanja"><br>
    Izdavač:<input type="text" name="publisher" placeholder="Uneti izdavača"><br>
    <input type="hidden" name="action" value="Dodaj"><br>
    Odaberite jezik:
    <select name="lang">
    	<option value=" "></option>
    		   <?php
    		        foreach($language as $l)
    		        	echo "<option value=' " . $l['id'] . "'> " . $l['jezici'] . "</option>";
    		    ?>
    	</select><br>
    	Odaberite žanr: 
    	<select name="genre">
    	      <option value=" "> </option>
    	      <?php
    	           foreach($genre as $g)
    	           	echo "<option value=' " . $g['id'] . "'> " . $g['naziv_zanra'] . "</option>";
    	       ?>
    	</select>
    	<br><br>
    	<input type="submit" name="add" value="Dodaj novu knjigu">
</form>
</div>
<?php

//if add buton is set, get values from form and insert it in specific database columns
if(isset($_GET['add'])){

	if(strlen($_GET['title']) > 0){

		$title = $_GET['title'];
		$author = $_GET['author'];
		$year = $_GET['year'];
		$publisher = $_GET['publisher'];
		$lang = $_GET['lang'];
		$genre = $_GET['genre'];

		try{

			$sql = "INSERT INTO `knjige`(`naslov`,`autor`,`godina`,`izdavac`,`jezik`,`zanrovi`)
                    VALUES('$title', '$author', '$year', '$publisher', '$lang', '$genre')";

            $conn->exec($sql);

            echo "<p>Uspešno ste dodali novu knjigu: " . $_GET['title'] . "</p><br>";
		}
		catch(PDOException $e)
		{
			echo "Bezuspesna konekcija: " . $e->getMessage();
		}
	}
}

require_once "footer.php";

?>
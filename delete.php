<?php

//draw table and enable deleting data from database

require_once 'header.php';

require_once 'Class/db.php';

//instance Class DB and call method getConnection to connect db
$db = new DB();
$conn = $db->getConnection();

//check if form is submitted
if(isset($_GET['delete'])){

	$idForDel = $_GET['id'];

	try{

		$sql = "DELETE FROM knjige WHERE id = $idForDel";
		$conn->exec($sql);

	}
	catch(PDOException $e)
	{
		echo "Bezuspesna konekcija: " . $e->getMessage();
	}
}

try{


	 $sql = "SELECT kn.id, kn.naslov, kn.autor, kn.godina, kn.izdavac, j.jezici , z.naziv_zanra 
			FROM knjige as kn 
			JOIN jezik as j ON kn.jezik = j.id 
			JOIN zanr as z on kn.zanrovi = z.id ";

	        $result = $conn->query($sql);



    //check if there is values in table and construct the table
	if($result->rowCount() > 0){
		echo "<table border=1><tr><th>Naslov</th><th>Autor</th><th>Godina</th><th>Izdavač</th><th>Jezik</th><th>Žanr</th><th>Akcija</th><tr>";


		foreach($result as $row){
			
			?>
			<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<?php
				     echo "<tr>";
				     echo "<td>" . $row['naslov'] . "</td>";
				     echo "<td>" . $row['autor'] . "</td>";
				     echo "<td>" . $row['godina'] . "</td>";
				     echo "<td>" . $row['izdavac'] . "</td>";
				     echo "<td>" . $row['jezici'] . "</td>";
				     echo "<td>" . $row['naziv_zanra'] . "</td>";
				     echo "<td>"; 
				     ?>

				     <input type="submit" name="delete" value="Obriši">
				     <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				     <input type="hidden" name="action" value="Briši">
				<?php
				echo "</td><tr>";
			echo "</form>";
		}
		echo "</table>";
	}
}
catch(PDOException $e)
{
	echo "Bezuspesna konekcija: " . $e->getMessage();
}

require_once 'footer.php';

?>
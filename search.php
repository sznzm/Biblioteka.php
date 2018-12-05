<?php

require_once 'header.php';

require_once "Class/db.php";

$db = new DB();
$conn = $db->getConnection();

$sql = "SELECT * FROM zanr";
$result = $conn->query($sql);
$genre = $result->fetchall(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM jezik";
$result = $conn->query($sql);
$language = $result->fetchall(PDO::FETCH_ASSOC);



?>
<!-- Searching data form -->
<div id="search">
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     Naslov: <input type="text" name="title" placeholder="Uneti naslov za pretragu" value="<?php if(!empty($_GET['title'])) echo $_GET['title']; ?>"><br>
      Autor: <input type="text" name="author" placeholder="Uneti ime autora" value="<?php if(!empty($_GET['author'])) echo $_GET['author']; ?>"><br>

      Odaberite žanr:
      	<select name="genre">
		<option value=""> </option>
		       <?php foreach($genre as $g) 

		         if($_GET['genre'] === $g['id']) :
		                 echo "<option value='" . $g['id'] . "'selected> " . $g['naziv_zanra'] . "</option>";
                 else :
		                 echo "<option value='" . $g['id'] . "'> " . $g['naziv_zanra'] . "</option>"; 
		         endif;

		        ?>
      </select><br>

      Odaberite jezik:
    <select name="lang">
    	<option value=""></option>
    		   <?php foreach($language as $l) 

		         if($_GET['language'] === $l['id']) :
		                 echo "<option value='" . $l['id'] . "'selected> " . $l['jezici'] . "</option>";
                 else :
		                 echo "<option value='" . $l['id'] . "'> " . $l['jezici'] . "</option>"; 
		         endif;

		        ?>
    	</select><br>

      <input type="hidden" name="action" value="Pretraga">
      <input type="submit" value="Traži">
	
</form>
</div>
<?php




$count = 0;

try{
            //Check if values from input exist in database and display result in table

            $sql = "SELECT kn.naslov, kn.autor, kn.godina, kn.izdavac, j.jezici , z.naziv_zanra 
			FROM knjige as kn 
			LEFT JOIN jezik as j ON kn.jezik = j.id 
			LEFT JOIN zanr as z on kn.zanrovi = z.id ";


           

			if(isset($_GET['title']) && strlen($_GET['title']) > 0 ){
				$title = $_GET['title'];
				
				$sql .= " WHERE naslov LIKE '%$title%'";
				
				$count++;
			}
			
			
			if( isset($_GET['author']) && strlen($_GET['author']) > 0 ){
				
				$author = $_GET['author'];
				
				if ($count == 0){
					$sql .= " WHERE autor LIKE '%$author%' ";
					
				}else {

					$sql .= " AND autor LIKE '%$author%'";
				}	
					
				$count++;
					
			}

			
			
			if( isset($_GET['genre']) && strlen($_GET['genre']) > 0 ){
				
				$genre = $_GET['genre'];
				
				if ($count == 0){
					$sql .= " WHERE zanrovi = '$genre' ";
					
				}else {
					$sql .= " AND zanrovi = '$genre'";
				}	
					$count++;
			}


			if( isset($_GET['lang']) && strlen($_GET['lang']) > 0 ){
				
				$lang = $_GET['lang'];
				
				if ($count == 0){
					$sql .= " WHERE jezik = '$lang' ";
					
				}else {
					$sql .= " AND jezik = '$lang'";
				}	
					$count++;
			}

			 $result = $conn->query($sql);

        
			 if ( $result->rowCount() > 0 ){
				 echo "<table border=1><tr><th>Naslov</th><th>Autor</th><th>Godina</th><th>izdavač</th><th>Jezik</th><th> Žanr</th></tr>";
				 foreach ($result as $row){
					 
						echo "<tr>";
							echo "<td>". $row['naslov'] . "</td>";
							echo "<td>". $row['autor'] . "</td>";
							echo "<td>". $row['godina'] . "</td>";
							echo "<td>". $row['izdavac'] . "</td>";
							echo "<td>". $row['jezici'] . "</td>";
							echo "<td>". $row['naziv_zanra'] . "</td>";
						echo "<tr>";
				}
				 echo "</table>";
				 echo "<br>";
			
				}
			
 
			 else
				 echo "<p>U bazi nema podataka koji odgovaraju traženom kriterijumu, molimo Vas pokušajte ponovo!</p>";
		} 
		catch(PDOException $e)
		{
			echo "Bezuspesna konekcija: " . $e->getMessage();
		}

require_once 'footer.php';
	
?>
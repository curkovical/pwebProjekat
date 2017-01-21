<?php	
	if($_FILES['cvUpload']['size'] > 0){
		$fileName = $_FILES['cvUpload']['name'];	
		$tmpName  = $_FILES['cvUpload']['tmp_name'];
		$fileSize = $_FILES['cvUpload']['size'];
		
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
	
		if(!get_magic_quotes_gpc()){
			$fileName = addslashes($fileName);
		}
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
			
		$sql = "INSERT INTO cv (ime_fajla, velicina, cv_fajl) values ('$fileName', '$fileSize', '$fp')";		
		
		if($connection->query($sql) === TRUE) {		
			echo '<script type="text/javascript">';
			echo 'alert("Your CV has been uploaded.")';
			echo '</script>';
			header("Refresh:0; url= ../index.html");
		}
		else {
			die("Neuspesno dodavanje");
		}
	}	
?>
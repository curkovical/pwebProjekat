<?php
	session_start();
	if($_SESSION["user_id"])
	{	
		$name = $_POST["teamName"];
		$idProjekat = $_POST["idProjekat"];
		
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
			
		$sql = "INSERT INTO team (imeTima, idProjekat) values ('$name', '$idProjekat')";	
		
		if($connection->query($sql) === TRUE) {
			header("location: index.php?selected=team");
		}
		else {
			header("Refresh:2; url=index.php?selected=team");
			die("Neuspesno dodavanje");
		}
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("You are not logged in")';
		echo '</script>';		
		header("Refresh:0; url= login.php");
	}


?>
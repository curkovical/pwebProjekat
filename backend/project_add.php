<?php
	session_start();
	if($_SESSION["user_id"])
	{	
		$name = $_POST["name"];
		$number = $_POST["number"];
		$start = $_POST["start"];
		$deadline = $_POST["deadline"];

		
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
			
		$sql = "INSERT INTO projekat (naziv, Broj_clanova, Datum_pocetka, Datum_kraja) values ('$name', '$number', '$start', '$deadline')";	
		
		if($connection->query($sql) === TRUE) {
			header("location: index.php?selected=project");
		}
		else {
			header("Refresh:2; url=index.php?selected=project");
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
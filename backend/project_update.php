<?php
	session_start();
	if($_SESSION["user_id"])
	{	
		$idProject = $_POST["idProject"];
		$name = $_POST["name"];
		$number = $_POST["number"];
		$start = $_POST["start"];
		$deadline = $_POST["deadline"];

		
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
			
		$sql = "UPDATE projekat SET naziv = '$name', Broj_clanova = '$number', Datum_pocetka = '$start', Datum_kraja= '$deadline' where idProjekat = '$idProject'";		
			
		
		if($connection->query($sql) === TRUE) {
			header("location: index.php?selected=project");
		}
		else {
			header("Refresh:5; url=index.php?selected=project");
			die("Neuspesno menjanje");
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
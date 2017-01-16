<?php 
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
		header("location: index.php?selected=project");
		die("Neuspesno dodavanje");
	}


?>
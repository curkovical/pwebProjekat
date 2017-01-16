<?php
	print_r ($_GET);
	$idClient = $_GET['idClient'];
	$connection = new mysqli("localhost", "root","", "projekat");
	
	if($connection ->connect_error)
		die("Connection fail".$connection->connect_error);
	
	$sql = "Delete from klijent where idKlijent = '$idClient'";
	if($connection->query($sql) === TRUE) {
		header("location: index.php?selected=client");	
	}
	else{
		header("Refresh:5; url=index.php?selected=client");
		die("Neuspesno brisanje");
	}
?>
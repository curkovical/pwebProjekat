<?php
	$idClient = $_POST["idClient"];
	$name = $_POST["clientName"];
	$last = $_POST["clientLast"];
	$company = $_POST["clientCompany"];
	$address = $_POST["clientAddress"];
	$phone = $_POST["clientPhone"];
	$country = $_POST["clientCountry"];
	$idProject = $_POST["idProject"];
	
	$connection = new mysqli("localhost", "root","", "projekat");
	
	if($connection ->connect_error)
		die("Connection fail".$connection->connect_error);
		
	$sql = "UPDATE klijent SET Ime = '$name', Prezime = '$last', Firma = '$company', Adresa= '$address', brojTelefona = '$phone', Zemlja = '$country', idProjekat ='$idProject' where idKlijent = '$idClient'";		
	
	if($connection->query($sql) === TRUE) {
		header("location: index.php?selected=client");
	}
	else {
		header("Refresh:5; url=index.php?selected=client");
		die("Neuspesno menjanje");
	}


?>
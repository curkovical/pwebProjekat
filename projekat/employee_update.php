<?php
	$idEmployee = $_POST["idEmployee"];
	$name = $_POST["name"];
	$last = $_POST["last"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$education = $_POST["education"];
	$expertise = $_POST["expertise"];
	$salary = $_POST["salary"];
	$country = $_POST["country"];
	$employment = $_POST["employment"];
	
	$connection = new mysqli("localhost", "root","", "projekat");
	
	if($connection ->connect_error)
		die("Connection fail".$connection->connect_error);
		
	$sql = "UPDATE zaposleni SET Ime = '$name', Prezime = '$last', Adresa= '$address', brojTelefona = '$phone', stepenStudija = '$education', Struka ='$expertise', Plata ='$salary', Zemlja = '$country', datumZaposlenja ='$employment' where idZaposleni = '$idEmployee'";		
	
	if($connection->query($sql) === TRUE) {
		header("location: index.php?selected=employee");
	}
	else {
		header("Refresh:2; url=index.php?selected=employee");
		die("Neuspesno dodavanje");
	}


?>
<?php 
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
		
	$sql = "INSERT INTO zaposleni (Ime, Prezime, Adresa, brojTelefona, stepenStudija, Struka, Plata, Zemlja, datumZaposlenja) values ('$name', '$last', '$address', '$phone', '$education', '$expertise', '$salary', '$country', '$employment')";	
	
	if($connection->query($sql) === TRUE) {
		header("location: index.php?selected=employee");
	}
	else {
		header("location: index.php?selected=partner");
		die("Neuspesno dodavanje");
	}


?>
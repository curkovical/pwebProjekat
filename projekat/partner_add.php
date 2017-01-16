<?php 
	$name = $_POST["partnerName"];
	$last = $_POST["partnerLast"];
	$company = $_POST["company"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$country = $_POST["country"];
	$idProject = $_POST["idProject"];
	
	$connection = new mysqli("localhost", "root","", "projekat");
	
	if($connection ->connect_error)
		die("Connection fail".$connection->connect_error);
		
	$sql = "INSERT INTO partner (Ime, Prezime, Firma, Adresa, brojTelefona, Zemlja) values ('$name', '$last', '$company', '$address', '$phone', '$country')";
	if($connection->query($sql) === TRUE) {
		$sql2 = "SELECT idPartner FROM partner ORDER BY idPartner DESC LIMIT 1";
		$result = $connection->query($sql2);
		$idPartner;
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$idPartner = $row["idPartner"];
		}
		$sql3 = "INSERT INTO partner_projekta (idProjekat, idPartner) values ('$idProject', '$idPartner')";
		
		
		if($connection->query($sql3) === TRUE){
			header("location: index.php?selected=partner");
		}
	}
	else {
		header("location: index.php?selected=partner");
		die("Neuspesno dodavanje");
	}


?>
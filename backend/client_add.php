<?php
	session_start();
	if(isset($_SESSION["user_id"]))
	{
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
			
		$sql = "INSERT INTO klijent (Ime, Prezime, Firma, Adresa, brojTelefona, Zemlja, idProjekat) values ('$name', '$last', '$company', '$address', '$phone', '$country', '$idProject')";		
		
		if($connection->query($sql) === TRUE) {
			header("location: index.php?selected=client");
		}
		else {
			header("Refresh:2; url=index.php?selected=client");
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
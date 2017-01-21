<?php
	session_start();
	if($_SESSION["user_id"])
	{	
		$idPartner = $_POST["idPartner"];
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
			
		$sql = "UPDATE partner SET Ime = '$name', Prezime = '$last', Firma = '$company', Adresa= '$address', brojTelefona = '$phone', Zemlja = '$country' where idPartner = '$idPartner'";	
		if($connection->query($sql) === TRUE) {
			header("location: index.php?selected=partner");	
		}
		else {
			header("Refresh:5; url=index.php?selected=partner");
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
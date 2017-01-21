<?php
	session_start();
	if(isset($_SESSION["user_id"]))
	{ 
		$name = $_POST["name"];
		$last = $_POST["last"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$education = $_POST["education"];
		$expertise = $_POST["expertise"];
		$salary = $_POST["salary"];
		$country = $_POST["country"];
		$employment = $_POST["employment"];
		$idTeam = $_POST["idTeam"];
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
			
		$sql = "INSERT INTO zaposleni (Ime, Prezime, Adresa, brojTelefona, stepenStudija, Struka, Plata, Zemlja, datumZaposlenja, idTima) values ('$name', '$last', '$address', '$phone', '$education', '$expertise', '$salary', '$country', '$employment', '$idTeam')";	
		
		if($connection->query($sql) === TRUE) {
			header("location: index.php?selected=employee");
		}
		else {
			header("Refresh:2; url=index.php?selected=employee");
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
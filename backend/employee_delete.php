<?php
	session_start();
	if(isset($_SESSION["user_id"]))
	{
		$idEmployee = $_GET['idEmployee'];
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
		
		$sql = "Delete from zaposleni where idZaposleni = '$idEmployee'";
		if($connection->query($sql) === TRUE) {
			header("location: index.php?selected=employee");	
		}
		else{
			header("Refresh:5; url=index.php?selected=employee");
			die("Neuspesno brisanje");
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
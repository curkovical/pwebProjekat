<?php
	session_start();
	if($_SESSION["user_id"])
	{	
		$idProject = $_GET['idProject'];
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
		
		$sql = "Delete from projekat where idProjekat = '$idProject'";
		if($connection->query($sql) === TRUE)
			header("Location: index.php?selected=project");
		else{
			header("Refresh:5; url=index.php?selected=project");
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
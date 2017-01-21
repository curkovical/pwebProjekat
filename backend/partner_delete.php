<?php
	session_start();
	if($_SESSION["user_id"])
	{	
		$idPartner = $_GET['idPartner'];
		$connection = new mysqli("localhost", "root","", "projekat");
		
		if($connection ->connect_error)
			die("Connection fail".$connection->connect_error);
		

		$sql = "Delete from partner where idPartner = '$idPartner'";
		if($connection->query($sql) === TRUE)
			header("location: index.php?selected=partner");
		else{
			header("Refresh:5; url=index.php?selected=partner");
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
<?php
	$idProject = $_GET['idProject'];
	$connection = new mysqli("localhost", "root","", "projekat");
	
	if($connection ->connect_error)
		die("Connection fail".$connection->connect_error);
	
	$sql = "Delete from partner_projekta where idProjekat = '$idProject'";
	$sql2 = "Delete from klijent where idProjekat = '$idProject'";
	if(($connection->query($sql) and $connection->query($sql)) === TRUE) {
		$sql3 = "Delete from projekat where idProjekat = '$idProject'";
			if($connection->query($sql3) === TRUE)
				header("Location: index.php?selected=project");
			else{
				header("Refresh:5; url=index.php?selected=project");
				die("Neuspesno brisanje 1");
			}		
	}
	else{
		header("Location: index.php?selected=project");
		die("Neuspesno brisanje 2");
	}
?>
<?php
	print_r($_GET);
	$idPartner = $_GET['idPartner'];
	$connection = new mysqli("localhost", "root","", "projekat");
	
	if($connection ->connect_error)
		die("Connection fail".$connection->connect_error);
	
	$sql = "Delete from partner_projekta where idPartner = '$idPartner'";
	if($connection->query($sql) === TRUE) {
		$sql2 = "Delete from partner where idPartner = '$idPartner'";
			if($connection->query($sql2) === TRUE)
				header("location: index.php?selected=partner");
			else{
				header("Refresh:5; url=index.php?selected=partner");
				die("Neuspesno brisanje 1");
			}
	}
	else{
		header("Refresh:5; url=index.php?selected=partner");
		die("Neuspesno brisanje 2");
	}
?>
<?php	
	$category = $_POST['categoryF'];
	$name=$_POST['nameF'];  
	$title = $_POST['titleF'];	
	$company = $_POST["companyF"];
	$phone = $_POST['telephoneF'];
	$email = $_POST['emailF'];
	$text = $_POST['areaF'];
	
	$connection = new mysqli("localhost", "root","", "projekat");
	
	if($connection ->connect_error)
		die("Connection fail".$connection->connect_error);
		
	$sql = "INSERT INTO kontakt (kategorija, ime, naslov, kompanija, telefon, email, poruka) values ('$category', '$name', '$title', '$company', '$phone', '$email', '$text')";		
	
	if($connection->query($sql) === TRUE) {		
		echo '<script type="text/javascript">';
		echo 'alert("Your message has been sent.")';
		echo '</script>';		
		header("Refresh:0; url= ../index.html");
	}
	else {
		die("Neuspesno dodavanje");
	}	
?>
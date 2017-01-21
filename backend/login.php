<!DOCTYPE html>
<?php
	session_start();
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  
  
  <link rel='stylesheet' href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
    <div class="wrapper">
		<form class="form-signin" action="login.php" method="post">       
		  <h2 class="form-signin-heading">Please login</h2>
			<?php
			if(isset($_POST["username"]) && isset($_POST["password"]))
			{
				$user =$_POST["username"];
				$pass = $_POST["password"];
				
				$connection = new mysqli("localhost", "root","", "projekat");
				
				if($connection ->connect_error)
					die("Failed to connect to database".$connection->connect_error);
					
				$sql = "Select adminId, username from administracija where username = '".$user."' and password ='".$pass."'";
				$result = $connection->query($sql);
				
				if($result->num_rows == 1)
				{
					$row = $result->fetch_assoc();
					$_SESSION["user_id"] = $row["adminId"];
					$_SESSION["user_name"] = $row["username"];
					
					header("location: index.php?selected=client");	
				}
				else
				{
					echo "<p>Wrong username and/or password</p>";
				}
			}
			?>

		  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
		  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		</form>
	
	</div>
  

</body>
</html>

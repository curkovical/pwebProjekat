<!DOCTYPE html>
<?php 
	session_start();
	$connection = new mysqli("localhost", "root","", "projekat");
	if($_SESSION["user_id"])
	{
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Administration</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/buttons.js"></script>
	</head>
	<body>
		<div>
			<p>Welcome <?php echo $_SESSION["user_name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.</a></p>
		</div>
		<div>
				<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" <?php if(!isset($_GET['selected']) || $_GET['selected'] == 'client') echo 'class="active"'; ?>><a href="#client" aria-controls="home" role="tab" data-toggle="tab" onclick="resettab('client')">Client</a></li>
				<li role="presentation" <?php if(isset($_GET['selected']) && $_GET['selected'] == 'project')  echo 'class="active"'; ?>><a href="#project" aria-controls="profile" role="tab" data-toggle="tab" onclick="resettab('project')">Project</a></li>
				<li role="presentation" <?php if(isset($_GET['selected']) && $_GET['selected'] == 'partner')  echo 'class="active"'; ?>><a href="#partner" aria-controls="messages" role="tab" data-toggle="tab" onclick="resettab('partner')">Partner</a></li>
				<li role="presentation" <?php if(isset($_GET['selected']) && $_GET['selected'] == 'employee')  echo 'class="active"'; ?>><a href="#employee" aria-controls="settings" role="tab" data-toggle="tab" onclick="resettab('employee')">Employee</a></li>
				<li role="presentation" <?php if(isset($_GET['selected']) && $_GET['selected'] == 'team')  echo 'class="active"'; ?>><a href="#team" aria-controls="settings" role="tab" data-toggle="tab" onclick="resettab('team')">Team</a></li>
			</ul>

			  <!-- Tab panes -->
			<div class="tab-content">
				<!--Client begin -->
				<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="client_add.php">	
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New client</h4>
								</div>
								<div class="modal-body">
															
										<label for="recipient-name" class="control-label">First name</label>
										<input type="text" class="form-control" name="clientName" id="clientName">
																	
										<label for="recipient-name" class="control-label">Last name</label>
										<input type="text" class="form-control" name="clientLast" id="clientLast">
																	
										<label for="recipient-name" class="control-label">Company</label>
										<input type="text" class="form-control" name="clientCompany" id="clientCompany">
																	
										<label for="recipient-name" class="control-label">Address</label>
										<input type="text" class="form-control" name="clientAddress" id="clientAddress">
										
										<label for="recipient-name" class="control-label">Phone number</label>
										<input type="text" class="form-control" name="clientPhone" id="clientPhone">
										
										<label for="recipient-name" class="control-label">Country</label>
										<input type="text" class="form-control" name="clientCountry" id="clientCountry">
										
										<label for="recipient-name" class="control-label">idProject</label>
										<input type="text" class="form-control" name="idProject" id="idProject">
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Add</button>
								</div>
							  </form>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane <?php if(!isset($_GET['selected']) || $_GET['selected'] == 'client') echo 'active'; ?>" id="client">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModal">ADD</button>
					<table class="table table-responsive">
						<thead>
							<th>idClient</th>
							<th>First name</th>
							<th>Last name</th>
							<th>Company</th>
							<th>Adress</th>
							<th>Phone number</th>
							<th>Country</th>
							<th>idProject</th>
						</thead>
						<tbody>
							
							<?php 
								$sql = "SELECT * FROM klijent";
								$result = $connection->query($sql);
								for($i=0; $i < $result->num_rows; $i++)
								{
									$row = $result->fetch_assoc();
							?>
							
							<tr>
								<form id="form_client<?php echo $i?>" method="POST" action="client_update.php">
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["idKlijent"];?></span><input type='text' name="idClient" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["idKlijent"];?>></td>
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["Ime"];?></span><input type='text' name="clientName" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["Ime"];?>></td>
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["Prezime"];?></span><input type='text' name="clientLast" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["Prezime"];?>></td>
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["Firma"];?></span><input type='text' name="clientCompany" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["Firma"];?>></td>
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["Adresa"];?></span><input type='text' name="clientAddress" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["Adresa"];?>></td>
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["brojTelefona"];?></span><input type='text' name="clientPhone" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["brojTelefona"];?>></td>
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["Zemlja"];?></span><input type='text' name="clientCountry" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["Zemlja"];?>></td>
								<td><span class="text_<?php echo 'client_'.$i?>"><?php echo $row["idProjekat"];?></span><input type='text' name="idProject" style="display: none" class="form-control input_<?php echo  'client_'.$i?>" value = <?php echo $row["idProjekat"];?>></td>
								<td><a href="#" target="_self" class="text_<?php echo 'client_'.$i?>" onclick="return showedit(<?php echo $i?>, 'client')">edit</a><a href="#" style="display: none" onclick="document.getElementById('form_client<?php echo $i?>').submit()" class="input_<?php echo 'client_'.$i?>" type="submit">save</a><a href="#" class="input_<?php echo  'client_'.$i?>" style="display: none" onclick="return hideedit(<?php echo $i?>, 'client')">cancel</a></td>
								<td><a href="/projekat/client_delete.php?idClient=<?php echo $row["idKlijent"];?>">Delete</a></td>
								</form>
							</tr>
							<?php } ?>
							</tbody>
					</table>
				</div>
				<!--Client end-->
				
				<!--Project begin-->
				<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="project_add.php">	
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New project</h4>
								</div>
								<div class="modal-body">
															
									<label for="recipient-name" class="control-label">Project name</label>
									<input type="text" class="form-control" name="name" id="projectName">
																
									<label for="recipient-name" class="control-label">Number of participants</label>
									<input type="number" class="form-control" name="number" id="number">
																
									<label for="recipient-name" class="control-label">Project start</label>
									<input type="date" class="form-control" name="start" id="projectStart">
																
									<label for="recipient-name" class="control-label">Deadline</label>
									<input type="date" class="form-control" name="deadline" id="deadline">
									
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Add</button>
								</div>
							  </form>
						</div>
					</div>
				</div>
				
				<div role="tabpanel" class="tab-pane <?php if(!isset($_GET['selected']) || $_GET['selected'] == 'project') echo 'active'; ?>" id="project">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#projectModal">ADD</button>
					<table class="table table-responsive">
						<thead>
							<th>idProject</th>
							<th>Project name</th>
							<th>Number of participants</th>
							<th>Project start</th>
							<th>Deadline</th>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT * FROM projekat";
								$result = $connection->query($sql);
								for($i=0; $i < $result->num_rows; $i++)
								{
									$row = $result->fetch_assoc();
							?>
							
							<tr>
								<form id="form_project<?php echo $i?>" method="POST" action="project_update.php">
								<td><span class="text_<?php echo 'project_'.$i?>"><?php echo $row["idProjekat"];?></span><input type='text' name="idProject" style="display: none" class="form-control input_<?php echo  'project_'.$i?>" value = <?php echo $row["idProjekat"];?>></td>
								<td><span class="text_<?php echo 'project_'.$i?>"><?php echo $row["naziv"];?></span><input type='text' name="name" style="display: none" class="form-control input_<?php echo  'project_'.$i?>" value = <?php echo $row["naziv"];?>></td>
								<td><span class="text_<?php echo 'project_'.$i?>"><?php echo $row["Broj_clanova"];?></span><input type='text' name="number" style="display: none" class="form-control input_<?php echo  'project_'.$i?>" value = <?php echo $row["Broj_clanova"];?>></td>
								<td><span class="text_<?php echo 'project_'.$i?>"><?php echo $row["Datum_pocetka"];?></span><input type='text' name="start" style="display: none" class="form-control input_<?php echo  'project_'.$i?>" value = <?php echo $row["Datum_pocetka"];?>></td>
								<td><span class="text_<?php echo 'project_'.$i?>"><?php echo $row["Datum_kraja"];?></span><input type='text' name="deadline" style="display: none" class="form-control input_<?php echo  'project_'.$i?>" value = <?php echo $row["Datum_kraja"];?>></td>
								
								<td><a href="#" target="_self" class="text_<?php echo 'project_'.$i?>" onclick="return showedit(<?php echo $i?>, 'project')">edit</a><a href="#" style="display: none" onclick="document.getElementById('form_project<?php echo $i?>').submit()" class="input_<?php echo 'project_'.$i?>" type="submit">save</a><a href="#" class="input_<?php echo  'project_'.$i?>" style="display: none" onclick="return hideedit(<?php echo $i?>, 'project')">cancel</a></td>
								<td><a href="/projekat/project_delete.php?idProject=<?php echo $row["idProjekat"];?>">Delete</a></td>
								</form>
							</tr>
							<?php } ?>
							</tbody>
					</table>		
				</div>
				<!-- Project end-->
				
				<!--Partner begin -->
				<div class="modal fade" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<form method="POST" action="partner_add.php">	
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="exampleModalLabel">New partner</h4>
							</div>
							<div class="modal-body">
								<label for="recipient-name" class="control-label">First name</label>
								<input type="text" class="form-control" name="partnerName" id="partnerName">
															
								<label for="recipient-name" class="control-label">Last name</label>
								<input type="text" class="form-control" name="partnerLast" id="partnerLast">
															
								<label for="recipient-name" class="control-label">Company</label>
								<input type="text" class="form-control" name="company" id="partnertCompany">
															
								<label for="recipient-name" class="control-label">Address</label>
								<input type="text" class="form-control" name="address" id="partnerAddress">
								
								<label for="recipient-name" class="control-label">Phone number</label>
								<input type="text" class="form-control" name="phone" id="phone">
								
								<label for="recipient-name" class="control-label">Country</label>
								<input type="text" class="form-control" name="country" id="partnerCountry">
										
								<label for="recipient-name" class="control-label">idProject</label>
								<input type="text" class="form-control" name="idProject" id="idProject">
								
							</div>
							  <div class="modal-footer">
								<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Add</button>
							  </div>
							  </form>
						</div>
					</div>
				</div>
				
				<div role="tabpanel" class="tab-pane <?php if(!isset($_GET['selected']) || $_GET['selected'] == 'partner') echo 'active'; ?>" id="partner">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#partnerModal">ADD</button>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>idPartner</th>
								<th>First name</th>
								<th>Last name</th>
								<th>Company</th>
								<th>Address</th>
								<th>Phone number</th>
								<th>Country</th>
							</thead>
							<tbody>
								<?php 
									$sql = "SELECT * FROM partner";
									$result = $connection->query($sql);
									for($i=0; $i < $result->num_rows; $i++)
									{
										$row = $result->fetch_assoc();
								?>
							
							<tr>
								<form id="form_partner<?php echo $i?>" method="POST" action="partner_update.php">
								<td><span class="text_<?php echo 'partner_'.$i?>"><?php echo $row["idPartner"];?></span><input type='text' name="idPartner" style="display: none" class="form-control input_<?php echo  'partner_'.$i?>" value = <?php echo $row["idPartner"];?>></td>
								<td><span class="text_<?php echo 'partner_'.$i?>"><?php echo $row["Ime"];?></span><input type='text' name="partnerName" style="display: none" class="form-control input_<?php echo  'partner_'.$i?>" value = <?php echo $row["Ime"];?>></td>
								<td><span class="text_<?php echo 'partner_'.$i?>"><?php echo $row["Prezime"];?></span><input type='text' name="partnerLast" style="display: none" class="form-control input_<?php echo  'partner_'.$i?>" value = <?php echo $row["Prezime"];?>></td>
								<td><span class="text_<?php echo 'partner_'.$i?>"><?php echo $row["Adresa"];?></span><input type='text' name="company" style="display: none" class="form-control input_<?php echo  'partner_'.$i?>" value = <?php echo $row["Adresa"];?>></td>
								<td><span class="text_<?php echo 'partner_'.$i?>"><?php echo $row["Firma"];?></span><input type='text' name="address" style="display: none" class="form-control input_<?php echo  'partner_'.$i?>" value = <?php echo $row["Firma"];?>></td>
								<td><span class="text_<?php echo 'partner_'.$i?>"><?php echo $row["brojTelefona"];?></span><input type='text' name="phone" style="display: none" class="form-control input_<?php echo  'partner_'.$i?>" value = <?php echo $row["brojTelefona"];?>></td>
								<td><span class="text_<?php echo 'partner_'.$i?>"><?php echo $row["Zemlja"];?></span><input type='text' name="country" style="display: none" class="form-control input_<?php echo  'partner_'.$i?>" value = <?php echo $row["Zemlja"];?>></td>
								<td><a href="#" target="_self" class="text_<?php echo 'partner_'.$i?>" onclick="return showedit(<?php echo $i?>, 'partner')">edit</a>
								<a href="#" style="display: none" onclick="document.getElementById('form_partner<?php echo $i?>').submit()" class="input_<?php echo 'partner_'.$i?>" type="submit">save</a>
								<a href="#" class="input_<?php echo  'partner_'.$i?>" style="display: none" onclick="return hideedit(<?php echo $i?>, 'partner')">cancel</a></td>
								<td><a href="/projekat/partner_delete.php?idPartner=<?php echo $row["idPartner"];?>">Delete</a></td>
								</form>
							</tr>
							<?php } ?>
							</tbody>
						</table>	
					</div>			
				</div>		
				<!--Partner end -->
				
				<!--Employee begin-->
				<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<form method="POST" action="employee_add.php">	
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="exampleModalLabel">New enmployee</h4>
							</div>
							<div class="modal-body">
								<label for="recipient-name" class="control-label">First name</label>
								<input type="text" class="form-control" name="name" id="name">
															
								<label for="recipient-name" class="control-label">Last name</label>
								<input type="text" class="form-control" name="last" id="lastName">
															
								<label for="recipient-name" class="control-label">Address</label>
								<input type="text" class="form-control" name="address" id="address">
								
								<label for="recipient-name" class="control-label">Phone number</label>
								<input type="text" class="form-control" name="phone" id="phone">
								
								<label for="recipient-name" class="control-label">Education level</label>
								<input type="text" class="form-control" name="education" id="education">
								
								<label for="recipient-name" class="control-label">Expertise</label>
								<input type="text" class="form-control" name="expertise" id="expertise">
								
								<label for="recipient-name" class="control-label">Salary</label>
								<input type="text" class="form-control" name="salary" id="salary">
								
								<label for="recipient-name" class="control-label">Country</label>
								<input type="text" class="form-control" name="country" id="country">
								
								<label for="recipient-name" class="control-label">Date of employment</label>
								<input type="date" class="form-control" name="employment" id="employment">
								
								<label for="recipient-name" class="control-label">idTeam</label>
								<input type="date" class="form-control" name="idTeam" id="idTeam">
																											
							</div>
							  <div class="modal-footer">
								<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Add</button>
							  </div>
							  </form>
						</div>
					</div>
				</div>
				
				<div role="tabpanel" class="tab-pane <?php if(!isset($_GET['selected']) || $_GET['selected'] == 'employee') echo 'active'; ?>" id="employee">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal">ADD</button>
					<table class="table table-responsive">
						<thead>
							<th>idEmployee</th>
							<th>First name</th>
							<th>Last name</th>
							<th>Address</th>
							<th>Phone number</th>
							<th>Education level</th>
							<th>Expertise</th>
							<th>Salary</th>
							<th>Country</th>
							<th>Date of employment</th>
						</thead>
						<tbody>
							
							<?php 
								$sql = "SELECT * FROM zaposleni";
								$result = $connection->query($sql);
								for($i=0; $i < $result->num_rows; $i++)
								{
									$row = $result->fetch_assoc();
							?>
							
							<tr>
								<form id="form_employee<?php echo $i?>" method="POST" action="employee_update.php">
								<td><span class="text_<?php echo 'employee_'.$i?>"> <?php echo $row["idZaposleni"];?> </span><input type='text' name="idEmployee" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["idZaposleni"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["Ime"];?></span><input type='text' name= "name" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["Ime"];?>></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["Prezime"];?></span><input type='text' name= "last" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["Prezime"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["Adresa"];?></span><input type='text' name="address" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["Adresa"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["brojTelefona"];?></span><input type='text' name= "phone" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["brojTelefona"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["stepenStudija"];?></span><input type='text' name="education" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["stepenStudija"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["Struka"];?></span><input type='text' name="expertise" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["Struka"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["Plata"];?></span><input type='text' name= "salary" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["Plata"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["Zemlja"];?></span><input type='text' name="country" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["Zemlja"];?>></></td>
								<td><span class="text_<?php echo 'employee_'.$i?>"><?php echo $row["datumZaposlenja"];?></span><input type='text' name="employment" style="display: none" class="form-control input_<?php echo  'employee_'.$i?>" value = <?php echo $row["datumZaposlenja"];?>></></td>
								<td><a href="#" target="_self" class="text_<?php echo 'employee_'.$i?>" onclick="return showedit(<?php echo $i?>, 'employee')">edit</a>
								<a href="#" style="display: none" onclick="document.getElementById('form_employee<?php echo $i?>').submit()" class="input_<?php echo 'employee_'.$i?>" type="submit">save</a>
								<a href="#" class="input_<?php echo  'employee_'.$i?>" style="display: none" onclick="return hideedit(<?php echo $i?>, 'employee')">cancel</a></td>
								<td><a href="/projekat/employee_delete.php?idEmployee=<?php echo $row["idZaposleni"];?>">Delete</a></td>
								</form>
							</tr>
							<?php } ?>
							</tbody>
					</table>		
				</div>		
				<!--Employee end-->
				
				<!--Team begin-->
				<div class="modal fade" id="teamModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="team_add.php">	
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New team</h4>
								</div>
								<div class="modal-body">
									<label for="recipient-name" class="control-label">Team name</label>
									<input type="text" class="form-control" name="teamName" id="teamName">
						
									<label for="recipient-name" class="control-label">idProjekat</label>
									<input type="date" class="form-control" name="idProjekat" id="idProjekat">
																												
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal fade" id="teamModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="team_update.php">	
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">Update team</h4>
								</div>
								<div class="modal-body">
									<label for="recipient-name" class="control-label">Team id</label>
									<input type="text" class="form-control" name="idTeam" id="idTeam">
									
									<label for="recipient-name" class="control-label">Team name</label>
									<input type="text" class="form-control" name="teamName" id="teamName">
						
									<label for="recipient-name" class="control-label">idProjekat</label>
									<input type="date" class="form-control" name="idProjekat" id="idProjekat">
																												
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal fade" id="teamModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="team_delete.php">	
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">Delete team</h4>
								</div>
								<div class="modal-body">
									<label for="recipient-name" class="control-label">Team id</label>
									<input type="text" class="form-control" name="idTeam" id="idTeam">
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Delete</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane <?php if(!isset($_GET['selected']) || $_GET['selected'] == 'team') echo 'active'; ?>" id="team">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamModalAdd">ADD</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamModalUpdate">UPDATE</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamModalDelete">DELETE</button>
					<table class="table table-responsive">
						<thead>
							<th>Team name</th>
							<th>Project name</th>
							<th>Teammember</th>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT imeTima, CONCAT(Ime,' ',Prezime) as radnik, naziv FROM zaposleni z join team t on z.idTima = t.idTima join projekat p on p.idProjekat = t.idProjekat ";
								$result = $connection->query($sql);
								for($i=0; $i < $result->num_rows; $i++)
								{
									$row = $result->fetch_assoc();
								
							?>
							<tr>
								<td><span class="text_<?php echo 'team_'.$i?>"><?php echo $row["imeTima"];?></span></td>
								<td><span class="text_<?php echo 'team_'.$i?>"><?php echo $row["naziv"];?></span></td>
								<td><span class="text_<?php echo 'team_'.$i?>"><?php echo $row["radnik"];?></span></td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>		
	</body>
</html>
<?php
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("You are not logged in")';
		echo '</script>';		
		header("Refresh:0; url= login.php");
	}
	
?>
	

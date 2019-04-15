<?php 
    error_reporting (0);
 ?>

<html>
	<head>
	<title>www.UniversityMSI.com</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<style>
			body{background-image:url("img/background.jpg");}
		</style>
	</head>
	
	<body bgcolor="#f0f0f0">
		<div class="total">
			<div class="header">
				<?php include "header.php"; ?>
			</div>
			<div class="total" style=" height:auto; background-color: #2E9AFE; border-top-right-radius: 1em; border-top-left-radius: 1em;">
				<table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
					<center>
						<caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
							<h1>Ici, vous pouvez modifier les données</h1>
						</caption>
					</center>
					<?php
					
						 $con = mysql_connect("localhost", "root", "") or die ("Error connection. ".mysql_error());
						 mysql_select_db("uni_smi_db", $con) or die("Error selecting db. ".mysql_error());

						 $sql = "SELECT * FROM upload_pdf WHERE pdf_id = '".mysql_real_escape_string($_GET['id']) ."'";
						 $res = @mysql_query( $sql ) or die( "Fehler: " . mysql_error() );
						 $person = mysql_fetch_assoc( $res );
					?>
					<form action='modif2_cours.php' method='POST' enctype="multipart/form-data">
						<table width="100" border="1" style=" height:auto; background-color: #2E9AFE;"> 
						</br>
							<tr>
								<td>ID</td><td><b><input type='text' style="width:250px;" name='id' readonly="yes" value="<?= $person['pdf_id'] ?>"><br></td>
							</tr>
								   
							<tr>
								<td>Cours</td><td><b><input type='text' name='cours' style="width:250px;" value="<?= $person['pdf_cours'] ?>" ><br></td>
							</tr>
						   
							<tr>
								<td>Description</td><td><b><input type='text' name='description' style="width:250px;" value="<?= $person['pdf_description'] ?>" ><br></td>
							</tr>
						   
							<tr>
								<td>Auteur</td><td><b><input type='text' name='auteur' style="width:250px;" value="<?= $person['pdf_auteur'] ?>" ><br></td>
							</tr>
						
						</table>
					  <button type='submit' name="submit" >Save</button></br></br>
					</form>
				</table>
			</div>
		    <div class="header">
				<?php include "foott.php"; ?>
			</div>
		</div>
	</body>
</html>









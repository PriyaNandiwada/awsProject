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
		<script language="JavaScript">
			function onDelete(){
				if(confirm('Voulez-vous supprimer cette ligne?')==true)
				{
				return true;
				}
				else
				{
				return false;
				}
			}
		</script>
		<div class="total">
			<div class="header">
				<?php include "header.php"; ?>
			</div>
			<table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
				<center>
					<caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
						<h1>Cours de SMI: Vous pouvez corriger les fautes ou Supprimer la ligne.</h1>
					</caption>
				</center>
				<form name="frmMain" action="delete_cours.php" method="post" OnSubmit="return onDelete();">
					<tr><th bgcolor="#2E9AFE"><a href="pdf_download.php" >Ajouter Cour</a></th></tr>
					
					<?php
					$con=mysqli_connect("localhost", "root", "","uni_smi_db") or die (mysql_error ());

				//	mysql_select_db("uni_smi_db") or die(mysql_error());

					$strSQL = "SELECT * FROM upload_pdf";

					$rs = mysqli_query($con,$strSQL);
					?>
                                    <br>
					<table width="980" border="1" style=" height:auto; background-color: #2E9AFE;">
                    
						<tr>
							<th> <div align="center">ID </div></th>
							<th> <div align="center">Cours </div></th>
							<th> <div align="center">Descrition </div></th>
							<th> <div align="center">PDF </div></th>
							<th> <div align="center">Auteur </div></th>
							<th> <div align="center">Delete </div></th>
						</tr>
						
						<?php
						while($row = mysqli_fetch_array($rs)) {
						  
							$test=$row["pdf_id"];
							?>
						
						<!-- ********************************************* -->
						
						<tr>
							<td><div align="center"><a href="modif1_cours.php?id=<?= $test ?>"><?= $row['pdf_id'] ?></a></div></td>
							<td><div align="center"><a href="modif1_cours.php?id=<?= $test ?>"><?= $row['pdf_cours'] ?></div></td>
							<td><div align="center"><a href="modif1_cours.php?id=<?= $test ?>"><?= $row['pdf_description'] ?></div></td>
							<td><div align="center"><a href="modif1_cours.php?id=<?= $test ?>"><?= $row['pdf_name'] ?></div></td>
							<td><div align="center"><a href="modif1_cours.php?id=<?= $test ?>"><?= $row['pdf_auteur'] ?></div></td> 
							<td align="center"><input type="checkbox" name="chkDel[]" value="<?=$row["pdf_id"];?>" /></td> 
						</tr>
						<?php
						
					  }

						?>
				
					</table>
					<?
						mysqli_close($con);
					?>
					<input type="submit" name="btnDelete" value="Delete" />
					
				</form>
			</table>
			<div class="header">
				<?php include "foott.php"; ?>
			</div>
		</div>	
	</body>
</html>
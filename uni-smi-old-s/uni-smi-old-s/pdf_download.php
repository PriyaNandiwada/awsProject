<?php
	//var_dump($_FILES);
	error_reporting (0);
	//error_reporting(E_ALL ^ E_NOTICE);
	
	if(!empty($_FILES)){
		
		$file_name = $_FILES['fichier']['name'];
		$file_extension = strrchr($file_name, ".");
		
		
		$file_tmp_name = $_FILES['fichier']['tmp_name'];
		$file_dest   = 'files/'.$file_name;
		
		$extensions_autorisees = array('.pdf', '.pdf');
		if(in_array($file_extension, $extensions_autorisees)){
			if(move_uploaded_file($file_tmp_name, $file_dest)){
				echo 'Fichier envoyé aver succès';
				
				$cours = $_POST['cours'];
				$description = $_POST['description'];
				$auteur = $_POST['auteur'];
				$fichier = $_POST['fichier'];
								
								
				if(isset($_POST['submit'])){
									
						$con = mysql_connect("localhost","root","") or die(mysql_error());
						$sel = mysql_select_db("uni_smi_db");
										
						$query = mysql_query("INSERT INTO upload_pdf(pdf_id, pdf_name, pdf_cours, pdf_description, pdf_auteur, file_url) VALUES ('','$file_name','$cours','$description','$auteur','$file_dest')");
											
						$query=mysql_query($sql);
						if($query){
							//echo "you register successfully click <a href ='login_knd.php'>here</a> to go to login page";
							header("Location: pdf_download.php");
						}
											
						$person = mysql_fetch_assoc( $query );
						if($query){
							echo "you have Registered!";
						}else{
							echo"There is something went wrong!";
						}
					}
			}else{
				echo 'Une erreur est survenue lors de l´envoi du fichier';
			}
		} else{
			echo'Seuls les fichiers PDF sont autorisées';
		}
	}
					
		
							
						
				
	
?>

<html>
<head>

</head>
<body bgcolor="#f0f0f0">
	<div class="total">
			<div class="header">
				<?php include "header.php"; ?>
			</div>
			<!--head-->
			<td>&nbsp;</td>
			<div class="total">	
				<table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
					<center>
						<caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
							<h1>Upload de fischier PDF - Cours SMI</h1>
						</caption>
					</center>
					
					<form action="pdf_download.php" method="post" name="pdf" enctype="multipart/form-data" >
						
						<tr>
						<td>&nbsp;</td>
							<td>Cours</td>
							<td><input type="text" name="cours"  size="20" maxlength="20" placeholder="Cours">
							</td>
						</tr>
						
						<tr>
							<td>&nbsp;</td>
							<td>Description</td>
							<td><input type="text" name="description" size="20" maxlength="20" placeholder="description">
							</td>
						</tr>
						
						
						<tr>
							<td>&nbsp;</td>
							<td>Auteur</td>
							<td><input type="text" name="auteur" size="30" maxlength="30" placeholder="auteur">
							</td>
						</tr>
						
						
						<tr>
							<td>&nbsp;</td>
							<td>PDF</td>
							<td><input type="file" name="fichier">
							</td>
						</tr>
						
						<tr>
						<td>&nbsp;</td>
						<td>
						<input type="submit" name="submit" value="Envoyez le fichier">
						<input type="reset" value="Reset">
						</td>
					</tr>
						
					</form>
				<!--foot-->
				</table>
			</div>
			
			<div class="header">
				<?php include "foott.php"; ?>
			</div>
	</div>
</body>
</html>
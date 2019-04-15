<?php
	//var_dump($_FILES);
	error_reporting (0);
	//error_reporting(E_ALL ^ E_NOTICE);
	
	if(!empty($_FILES)){
		
		$file_name = $_FILES['fichier']['name'];
		$file_extension = strrchr($file_name, ".");
		
		
		$file_tmp_name = $_FILES['fichier']['tmp_name'];
		$file_dest   = 'inscription/'.$file_name;
		
		$extensions_autorisees = array('.pdf', '.docx');
		if(in_array($file_extension, $extensions_autorisees)){
			if(move_uploaded_file($file_tmp_name, $file_dest)){
				echo 'Fichier envoyé aver succès';
				
				
				
				
				$nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
				$email = $_POST['email'];
				$code = $_POST['code'];
				$password = $_POST['password'];
				$date = $_POST['date'];
				$active = $_POST['activ'];
				$sem1 = $_POST['sem1'];
				$sem2 = $_POST['sem2'];
				$code = $_POST['code'];
				$fichier = $_POST['fichier'];
								
								
				if(isset($_POST['submit'])){
									
						$con = mysql_connect("localhost","root","") or die(mysql_error());
						$sel = mysql_select_db("uni_smi_db");
								
                        $sql='INSERT INTO student VALUES ("","'.$nom.'", "'.$prenom.'", "'.$email.'", "'.$code.'", "'.$password.'","'.$date.'","'.$active.'","'.$file_name.'","'.$file_dest.'","'.$sem1.'","'.$sem2.'")';
								
						$query = mysql_query($sql);
						//$query = mysql_query("UPDATE student SET(diplome, semester1, semester2) VALUES ($file_name','$sem1','$sem2') WHERE stud_code = '$code'");
					/**	$sql = 'UPDATE student SET ';
						$sql.= "diplome = '$file_name'";
						$sql.=",";
						$sql.= "diplome_url = '$file_dest'";
						$sql.=",";
						$sql.= "semester1 = '$sem1'";
						$sql.=",";
						$sql.= "semester2 = '$sem2'";
						$sql.= "WHERE stud_code = '$code' ";	*/


							
						//$query=mysql_query($sql);
						if($query){
							//echo "you register successfully click <a href ='login_knd.php'>here</a> to go to login page";
							header("Location:login_stud.php");
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
			echo'Seuls les fichiers PDF et Docx sont autorisées';
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
							<h1>Inscription - Cours SMI - un formulaire à remplir</h1>
						</caption>
					</center>
					
					<form action="inscription.php" method="post" name="pdf" enctype="multipart/form-data" >
						
						
						
						
						
						<tr>
							<td>&nbsp;</td>
							<td>Nom d´étudiant:</td>
							<td><input type="text" name="nom"  size="20" maxlength="20" placeholder="Entrez nom d´étudiant">
							</td>
						</tr>
						
						<tr>
							<td>&nbsp;</td>
							<td>prenom d´étudiant:</td>
							<td><input type="text" name="prenom"  size="20" maxlength="20" placeholder="Entrez prenom d´étudiant">
							</td>
						</tr>
						
						<tr>
							<td>&nbsp;</td>
							<td>email d´étudiant:</td>
							<td><input type="email" name="email"  size="20" maxlength="20" placeholder="Entrez email d´étudiant">
							</td>
						</tr>
						
						
						
						<tr>
							<td>&nbsp;</td>
							<td>Code d´étudiant:</td>
							<td><input type="text" name="code"  size="20" maxlength="20" placeholder="Entrez Code d´étudiant">
							</td>
						</tr>
						
						<tr>
							<td>&nbsp;</td>
							<td>password d´étudiant:</td>
							<td><input type="password" name="password"  size="20" maxlength="20" placeholder="Entrez password d´étudiant">
							</td>
						</tr>
				
								
				    	<tr>
							<td>&nbsp;</td>
							<td>Date naissance d´étudiant:</td>
							<td><input type="date" name="date"  size="20" maxlength="20" >
							</td>
						</tr>
						
						<tr>
							<td>&nbsp;</td>
							<td>Activité d´étudiant:</td>
							<td><input type="text" name="activ"  size="20" maxlength="20" placeholder="Entrez Activité d´étudiant">
							</td>
						</tr>
						
						
						
						<tr>
							<td>&nbsp;</td>
							<td>Semester:</td>
							<td>
								<select name="sem1">
								  <option value="Semester1">1</option>
								  <option value="Semester3">3</option>
								  <option value="Semester5">5</option>
								</select>
							
								<select name="sem2">
								  <option value="Semester2">2</option>
								  <option value="Semester4">4</option>
								  <option value="Semester6">6</option>
								</select>
							</td>
						</tr>
						
						
						<tr>
							<td>&nbsp;</td>
							<td>Diplome(PDF/Docx):</td>
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
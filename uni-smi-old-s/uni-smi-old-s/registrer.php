<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>www.UniversitySMI.com</title>
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
            <table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
                <center>
                    <caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
                        <h1>Devenir Member de l&apos;association</h1>
                    </caption>
                </center>

                <?php
                error_reporting(0);
                $username = $_POST['nom'];
                $firstname = $_POST['firstname'];
				$email = $_POST['email'];
                $semester = $_POST['semester'];
                $activite = $_POST['activite'];
                $age = $_POST['age'];
				$password1 = $_POST['password1'];
				$password2 = $_POST['password2'];


                if (isset($_POST['submit'])) {

                    $con = mysql_connect("localhost", "root", "") or die("could not connect");
                    $sel = mysql_select_db("uni_smi_db", $con) or die("DB not found");
                    
					$sql = "SELECT assoc_email FROM stud_assoc WHERE assoc_email ='$email'";
					$check = mysql_query($sql);
					$rows = mysql_num_rows($check);
                    if ($rows != 0) {
                        die("E-Mail is exist please type another one");
						//header("Location: register.php");
                    }
					//echo"ERROR  ERROR  ERROR  ERROR  ERROR!";
					
					
					
					
                        if ($username != '' && $age != '' && $semester != '' && $password1 != '' && $password2 != '' && $email != '') {
							$query1=mysql_query("SELECT * FROM student where stud_email='$email'");
							if  (mysql_num_rows($query1) == 1){
							
						
							if($password1==$password2){
								
								$sql = "INSERT INTO stud_assoc (assoc_id ,assoc_email, assoc_password, assoc_nom, assoc_prenom, assoc_age, assoc_semester, assoc_activite) VALUES ('', '$email','$password1', '$username', '$firstname' ,'$age' ,'$semester', '$activite')";
								$query = mysql_query($sql);

								if ($query) {
									//echo "you have Registered!";
									header("Location: association.php");
								}
							}
														
							else {
                                echo"Your password not match!";
                            }
							}
							else {
                                echo"cet email n'appartient à aucun etudiant!";
							} 
                        } else {
                            echo "Remplissez les champs manquants";
                        }
                }
                ?>


                <form action="registrer.php" method="post" name="register" >
                    <tr>
                        <td>Nom</td>
                        <td><input type="text" name="nom"  size="30" maxlength="30" placeholder="Enter Your Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td><input type="text" name="firstname"  size="30" maxlength="30" placeholder="Enter Your Prénom">
                        </td>
                    </tr>
					
					<tr>
                        <td>Email</td>
                        <td><input type="text" name="email"  size="30" maxlength="30" placeholder="Enter Your Prénom">
                        </td>
                    </tr>
					
					
                    <tr>
                        <td>Semester:</td>
                        <td><input type="text" name="semester"  size="30" maxlength="30" placeholder="Semster">
                        </td>
                    </tr>

                    <tr>
                        <td>Activités:</td>
                        <td>
                            
                            <select name="activite" maxlength="30"  placeholder="Activite">
                            <option>Robotique</option>
                            <option>Activitès sportives</option>
                            <option>Voyage</option>
                            <option>Press</option>
                            <option>Art</option>
                        </select>
                        </td>
                    </tr>
					
                    <tr>
                        <td>Age:</td>
                        <td><input type="text" name="age" size="20" placeholder="Age">
                        </td>
                    </tr>
					
					<tr>
                        <td>mot de passe:</td>
                        <td><input type="password" name="password1" size="20" placeholder="Password">
                        </td>
                    </tr>
					
					<tr>
                        <td>Confirmer mot de passe:</td>
                        <td><input type="password" name="password2" size="20" placeholder="confirmer Password">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="submit" value="Créer un compte">
                            <input type="reset" name="reset" value="Reset">
                        </td>
                    </tr>
                </form>



            </table>
            <div class="header">
                <?php include "foott.php"; ?>
            </div>
        </div>
    </body>
</html>
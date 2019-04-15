<!-- pour le Test ou pour une autre page pour register l etudiant!!  -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

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
            <table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
                <center>
                    <caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
                        <h1>Devenir Member de l&apos;association</h1>
                    </caption>
                </center>

                <?php
                error_reporting(0);

                error_reporting(E_ALL ^ E_NOTICE);
                $username = $_POST['nom'];
                $firstname = $_POST['firstname'];
                $code = $_POST['code'];
                $email = $_POST['email'];
                $semester = $_POST['semester'];
                $activite = $_POST['activite'];
                $password1 = $_POST['password1'];
                $password2 = $_POST['password2'];
                $datum = date("Y-m-d");


                if (isset($_POST['submit'])) {

                    $con = mysql_connect("localhost", "root", "") or die("could not connect");
                    $sel = mysql_select_db("uni_smi_db", $con) or die("DB not found");
                    $sql = "SELECT stud_email FROM student WHERE stud_email ='$email'";
                    $check = mysql_query($sql);
                    $rows = mysql_num_rows($check);
                    //echo $rows;
                    //die();
                    if ($rows != 0) {
                        die("E-Mail is exist please type another one");
                    }


                    if ($password1 == $password2) {
                        if ($username != '' && $password1 != '' && $password2 != '' && $email != '' && $code != '' && $firstname != '') {

                            $query = mysql_query("INSERT INTO student(stud_id, stud_name, stud_firstname, stud_email, stud_code, semester, activite, stud_password, stud_datum) VALUES ('','$username','$firstname','$email','$code','$semester', '$activite', '$password1','$datum')");

                            $query = mysql_query($sql);
                            if ($query) {
                                //echo "you register successfully click <a href ='login_knd.php'>here</a> to go to login page";
                                header("Location: association.php");
                            }

                            $person = mysql_fetch_assoc($query);
                            if ($query) {
                                echo "you have Registered!";
                            } else {
                                echo"There is something went wrong!";
                            }
                        } else {
                            echo "Please, Enter the Fields!";
                        }
                    } else {
                        echo "The Password don´t match!!";
                    }
                }
                ?>


                <form action="registrer.php" method="post" name="register" >
                    <tr>
                        <td>Nom</td>
                        <td><input type="text" name="nom" value="<?= $person['stud_name'] ?>" size="30" maxlength="30" placeholder="Enter Your Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td><input type="text" name="firstname" value="<?= $person['stud_firstname'] ?>" size="30" maxlength="30" placeholder="Enter Your Prénom">
                        </td>
                    </tr>




                    <tr>
                        <td>Code d ´étudiant</td>
                        <td><input type="text" name="code" value="<?= $person['stud_code'] ?>" size="30" maxlength="30" placeholder="Enter Your Code">
                        </td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" value="<?= $person['stud_email'] ?>" size="30" maxlength="30" placeholder="Enter Your Email">
                        </td>
                    </tr>

                    <tr>
                        <td>Semester:</td>
                        <td><input type="text" name="semester" value="<?= $person['semester'] ?>" size="30" maxlength="30" placeholder="Semster">
                        </td>
                    </tr>

                    <tr>
                        <td>Activités:</td>
                        <td>
                            
                            <select name="activite" maxlength="30" value="<?= $person['activite'] ?>" placeholder="Activite">
                            <option>Robotique</option>
                            <option>Activitès sportives</option>
                            <option>Voyage</option>
                            <option>Press</option>
                            <option>Art</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>mot de passe:</td>
                        <td><input type="password" name="password1" value="<?= $person['stud_password'] ?>" size="20" placeholder="Password">
                        </td>
                    </tr>

                    <tr>
                        <td>Confirmer mot de passe:</td>
                        <td><input type="password" name="password2" size="20" placeholder="Password again">
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="checkbox" name="checkbox" value="Agree">Agree With Our Rules</td>
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
<?php

ob_start();
session_start();


$con = mysqli_connect("localhost", "root", "","uni_smi_db") or die("could not connect");
//$sel = mysql_select_db("uni_smi_db", $con) or die("DB not found");


$email = addslashes(strip_tags($_POST['email']));
$password = addslashes(strip_tags($_POST['password']));

if ($email && $password) {
    $finduser = mysqli_query($con,"SELECT * FROM student
    WHERE stud_email ='" . $email . "'
    AND stud_password = '" . $password . "'") or die("mysql error");

    if (mysqli_num_rows($finduser) != 0) {
        while ($row = mysqli_fetch_assoc($finduser)) {
            $useremail_stud = stripslashes($row['stud_email']);
            $userpassword_stud = stripslashes($row['stud_password']);
        }
        if ($email == $useremail_stud AND $password == $userpassword_stud) {
            $_SESSION['sessionemail_stud'] = $useremail_stud;
            $_SESSION['sessionpassword_stud'] = $userpassword_stud;
            $_SESSION['type'] = 'stud';
            
			include "afficher_cours.php";
            
        } else {
            include "login_stud.php";
        }
    } else {
        include "login_stud.php";
    }
} else {
    include "login_stud.php";
}

mysqli_close($con);
?> 
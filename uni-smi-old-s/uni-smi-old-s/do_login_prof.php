<?php

//ob_start();
session_start();
$con = mysqli_connect("localhost", "root", "","uni_smi_db") or die("could not connect");
//$sel = mysql_select_db("uni_smi_db", $con) or die("DB not found");

$email = addslashes(strip_tags($_POST['email']));
$password = addslashes(strip_tags($_POST['password']));

if ($email && $password) {
    $finduser = mysqli_query($con,"SELECT * FROM professeur
    WHERE prof_email ='" . $email . "'
    AND prof_password = '" . $password . "'") or die("mysql error");

    if (mysqli_num_rows($finduser) != 0) {
        while ($row = mysqli_fetch_assoc($finduser)) {
            $useremail_prof = stripslashes($row['prof_email']);
            $userpassword_prof = stripslashes($row['prof_password']);
        }
        if ($email == $useremail_prof AND $password == $userpassword_prof) {
            $_SESSION['sessionemail_prof'] = $useremail_prof;
            $_SESSION['sessionpassword_prof'] = $userpassword_prof;
            $_SESSION['type'] = 'prof';
            include "search_form.php";
			include "cours.php";
			
			
        } else {
            include "login_prof.php";
        }
    } else {
        include "login_prof.php";
    }
} else {
   include "login_prof.php";
}
mysqli_close($con);
ob_end_flush();
?> 
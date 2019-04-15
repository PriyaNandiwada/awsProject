<?php

ob_start();
session_start();


$con = mysqli_connect("localhost", "root", "","uni_smi_db") or die("could not connect");
//$sel = mysql_select_db("uni_smi_db", $con) or die("DB not found");


$email = $_POST['email'];
$password = $_POST['password'];

if ($email && $password) {
    $finduser = mysqli_query($con,"SELECT * FROM stud_assoc
    WHERE assoc_email ='" . $email . "'
    AND assoc_password = '" . $password . "'") or die("mysql error");

    if (mysqli_num_rows($finduser) != 0) {
        while ($row = mysqli_fetch_assoc($finduser)) {
            $useremail_stud = stripslashes($row['assoc_email']);
            $userpassword_stud = stripslashes($row['assoc_password']);
        }
        if ($email == $useremail_stud AND $password == $userpassword_stud) {
            $_SESSION['sessionemail_stud'] = $useremail_stud;
            $_SESSION['sessionpassword_stud'] = $userpassword_stud;
            $_SESSION['type'] = 'association';
            include "activit.php";
            
        } else {
            include "login_assoc.php";
        }
    } else {
        include "login_assoc.php";
    }
} else {
    include "login_assoc.php";
}

mysqli_close($con);
?> 
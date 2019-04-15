<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	
$cours ="login_prof.php";
$afficher_cours ="login_stud.php";
$association="login_assoc.php";


if (isset($_SESSION['type'])) {
	
	if ($_SESSION['type'] == 'association') {
    $association = "activit.php";}
	
	if ($_SESSION['type'] == 'prof') {
		$cours = "cours.php";
	    
    } if ($_SESSION['type'] == 'stud') {
      
	  $afficher_cours= "afficher_cours.php";
	  $cours=$afficher_cours;
		
    }
}
?>  

<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>www.UniversitySMI.com</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <style>
            body{background-image:url("img/background.jpg");}
        </style>
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.jpg">
                        <!-- <div style="position: absolute; background: #fefefe; top: 80px; left: 185px; width: 6%;">-->
						<div class="lol" style="position: absolute; background: #00CC66; top: 80px; left: 200px; width: 6%;">
						
                            <li><a href ='login_stud.php'>login</a></li>
                            <li><a href ='do_logout_stud.php'>Logout</a></li>
                        </div>
                </a>
                <div id= "navbar">	
                    <ul class="menu">
                        <li class="ronde"><a href="index.php">Home</a></li>
                        <li><a href='formation.php'>Academics</a></li>
                        <li><a href=<?php echo $cours ?>>Courses</a></li>
                        <li><a href=<?php echo $association ?>>Clubs</a></li>
                        <li><a href='recherche.php'>Search</a></li>
                    </ul>
                </div>
            </div>
        </div>
		
    </body>
</html>



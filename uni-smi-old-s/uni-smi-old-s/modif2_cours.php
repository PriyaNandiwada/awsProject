<?php

    $con = mysql_connect("localhost","root","") or die ("could not connect");
    $sel = mysql_select_db("uni_smi_db", $con) or die ("DB not found");
    $submit =$_POST['submit'];
    
	 
    $id = $_POST['id'];
    $cours = $_POST['cours'];
    $description = $_POST['description'];
    $auteur = $_POST['auteur'];

       
    $sql = 'UPDATE upload_pdf SET ';
    $sql.= "pdf_cours = '$cours'";
    $sql.=",";
    $sql.= "pdf_description = '$description'";
    $sql.=",";
    $sql.= "pdf_auteur = '$auteur'";

    
    $sql .= " WHERE pdf_id = '$id'" ;

       $erg = mysql_query($sql);
       //echo "SQL : $sql";
        header("Location: cours.php");
?>
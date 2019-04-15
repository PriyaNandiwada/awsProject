<html>
	<head>
	<title>supprimer cours</title>
	</head>
	<body>
		<?php
		$con = mysql_connect("localhost","root","") or die(mysql_error());
		$sel = mysql_select_db("uni_smi_db");


			for($i=0;$i<count($_POST["chkDel"]);$i++)
			{
				if($_POST["chkDel"][$i] != "")
				{
					$strSQL = "DELETE FROM upload_pdf WHERE pdf_id = '".$_POST["chkDel"][$i]."' ";
					$objQuery = mysql_query($strSQL);
				}
			}
	

		header("Location: cours.php");   
		mysql_close($con);
		?>
	</body>
</html>
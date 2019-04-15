 
<?php
session_start();

 if (!isset($_SESSION['type'])) {
	include "login_prof.php";
   
} elseif ($_SESSION['type'] == 'prof')
{ include "search_form.php";
}
?>






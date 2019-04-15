<?php
if (isset($_SESSION['type'])) {
    include "registrer.php";
} else {
    include "login_assoc.php";
}
?>

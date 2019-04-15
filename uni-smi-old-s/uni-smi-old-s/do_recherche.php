
<?php
session_start();
//session_destroy();
error_reporting(0);
//session_set_cookie_params(10);
$nom = $_POST['nom'];
$sem1 = $_POST['semester1'];
$sem2 = $_POST['semester2'];
$activite = $_POST['activite'];

if (isset($_POST['submit'])) {

    $con = mysql_connect("localhost", "root", "") or die("could not connect");
    $sel = mysql_select_db("uni_smi_db", $con) or die("DB not found");
    $where_text = '';
    $exit = FALSE;
    if ($nom == '' && $sem1 == '' && $sem2 == '' && $activite == '') {
        echo 'Aucune zone texte est rempli';
    } elseif ($nom != '') {
        $where_text = "stud_nom=" . "'" . $nom . "'";
    } elseif ($sem1 != '') {
        $where_text = "semester1=" . "'" . $sem1 . "'";
    }elseif ($sem2 != '') {
        $where_text = "semester2=" . "'" . $sem2 . "'";
    } elseif ($activite != '') {
        $where_text = "activite=" . "'" . $activite . "'";
    }

    $sql = "select * from student where " . $where_text;

    $result = mysql_query($sql);
}
?>
<html>
    <body bgcolor = "#f0f0f0">
        <div class = "total">
            <div class = "header">
                <?php include "header.php"; ?>
            </div>
            <!--head-->
            <td>&nbsp;</td>
            <div class="total">	
                <table cellpadding="10" width="980" border="1" style=" height:auto; background-color: #2E9AFE;">
                    <center>
                        <caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
                            <h1>Resultat de votre recherche</h1>
                        </caption>
                    </center>

                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Code</th>
                        <th>Semester 1</th>
						<th>Semester 2</th>
                        <th>Activite</th>
						<th>Diplome</th>
                    </tr>
                    <?php while ($row = mysql_fetch_object($result)) { ?>
                        <tr>
                            <td><?php echo($row->student_id) ?></td>
                            <td><?php echo($row->stud_nom) ?></td>
                            <td><?php echo($row->stud_prenom) ?></td>
                            <td><?php echo($row->stud_email) ?></td>
                            <td><?php echo($row->stud_code) ?></td>
                            <td><?php echo($row->sem1) ?></td>
							<td><?php echo($row->sem2) ?></td>
                            <td><?php echo($row->stud_activ) ?></td>
							<td><a href="<?php echo($row->diplome)?>"><?php echo($row->diplome) ?></td>
							
								
						</tr>
                    <?php } ?>
                </table>
            </div>
            <div class="header">
                <?php include "foott.php"; ?>
            </div>
        </div>
    </body>
</html>

<html>
    <body bgcolor="#f0f0f0">
        <div class="total">
            <div class="header">
                <?php include "header.php"; ?>
            </div>
            <!--head-->
            <td>&nbsp;</td>
            <div class="total">	
                <table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
                    <center>
                        <caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
                            <h1>Connectez-vous à votre compte</h1>
                        </caption>
                    </center>

                    <form action="do_recherche.php" method="post" name="login" >

                        <tr>
                            <td>&nbsp;</td>
                            <td>Nom</td>
                            <td><input type="text" name="nom" size="20" maxlength="20" placeholder="Nom">
                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>Les Semestres impaires </td>
                            <td><input type="text" name="semester1" size="20" maxlength="20" placeholder="Saisie numero de semester">
                            </td>
                        </tr>
						<tr>
                            <td>&nbsp;</td>
                            <td>Les Semestres paires </td>
                            <td><input type="text" name="semester2" size="20" maxlength="20" placeholder="Saisie numero de semester">
                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>Activite</td>
                            <td><input type="text" name="activite" size="30" maxlength="30" placeholder="activite">
                            </td>
                        </tr>


                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" name="submit" value="Recherche">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>

                    </form>
                    <!--foot-->
                </table>
            </div>

            <div class="header">
                <?php include "foott.php"; ?>
            </div>
        </div>
    </body>
</html>
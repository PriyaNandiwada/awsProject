<html>
    <body bgcolor="#f0f0f0">
        <div class="total">
            <div class="header">
                <?php include "header.php"; ?>
            </div>

            <div class="total">
                <table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
                    <center>
                        <caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
                            <h1>Association des étudiants SMI: Connectez-vous à votre compte</h1>
                        </caption>
                    </center>

                    <form action="do_login_assoc.php" method="post" name="login" >
                        <tr>
                            <th colspan="2">Je suis déjà inscrit.</th>
                        </tr>

                        <tr>
                            <td>Email d'utilisateur </td>
                            <td><input type="text" name="email" size="30" maxlength="30" placeholder="Enter Your Email">
                            </td>
                        </tr>

                        <tr>
                            <td>mot de passe:</td>
                            <td><input type="password" name="password" size="20" placeholder="Password">
                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" name="submit" value="Connexion">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>


                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <ul>
                                    
                                    <a href="#">Mot de passe oublié</a><br>
                                    <a href="registrer.php">Devenir Member de l´association</a><!-- <a href="registrer_1.php">Devenir Menber de l´association</a><br> -->
                                </ul>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>

            <div class="header">
                <?php include "foott.php"; ?>
            </div>
        </div>
    </body>
</html>

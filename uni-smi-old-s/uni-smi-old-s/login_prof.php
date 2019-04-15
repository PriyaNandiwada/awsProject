<html>
    <body bgcolor="#f0f0f0">
        <div class="total">
            <div class="header">
                <?php include "header.php"; ?>
            </div>
            <table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
                <center>
                    <caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
                        <h1>Connectez-vous à votre compte</h1>
                    </caption>
                </center>

                <form action="do_login_prof.php" method="post" name="login" >

                    <tr>
                        <td>Email du professeur </td>
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
                </form>
            </table>
            <div class="header">
                <?php include "foott.php"; ?>
            </div>
        </div>
    </body>
</html>
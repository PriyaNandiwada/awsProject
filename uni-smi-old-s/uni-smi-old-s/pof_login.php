<html>
    <head>
        <title>www.UniversityMSI.com</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <style>
            body{background-image:url("img/background.jpg");}
        </style>
    </head><body bgcolor="#f0f0f0">
        <div class="total">
            <div class="header">
                <?php include "header.php"; ?>
            </div>

            <div class="total">	
                <table cellpadding="10" width="980" style=" height:auto; background-color: #2E9AFE;">
                    <center>
                        <caption align="Top" style=" height:auto; background-color: #40FF00; border-top-right-radius: 1em; border-top-left-radius: 1em;">
                            <h2>Domaine de professeur</h2>
                            <h1>Connectez-vous à votre compte</h1>

                        </caption>
                    </center>

                    <form action="index.htm" method="post" name="applform" >
                        <tr>
                            <td>Email de Professeur </td>
                            <td><input type="text" name="name" size="30" maxlength="30" placeholder="Enter Your Name">
                            </td>
                        </tr>

                        <tr>
                            <td>mot de passe:</td>
                            <td><input type="password" name="pass" size="20" placeholder="Password">
                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" value="Submit">
                                <input type="reset" value="Reset">
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
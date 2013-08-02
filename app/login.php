<? ?>
<html>
    <head>
        <title>sample Login</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/login.css" />
    </head>
    <body>
        <div class="wrapper">
            <div class="line" id="headline">
                <h1>Sample Login</h1>
            </div>
            <div class="line" id="form">
                <form action="index.php?c=Login" method="post">
                    <table>
                        <tr>
                            <td>
                                Username
                            </td>
                            <td>
                                <input type="text" name="username" value="" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                                <input type="password" name="password" value="" required/>
                            </td>
                        </tr>
                    </table>

                    <input type="submit" name="submit" value="Log In" class="button"/>	
                    
                </form>
            </div>
            <div class="smallline" id="legal">
                Copyright 2013 Somebody
            </div>
        </div>
    </body>
</html>
<? ?>
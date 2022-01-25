    <html>
        <head>
            <meta charset="utf-8">
            <meta name="vieuwport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet"  type= "text/css" href="style/login.css">
            <title> Loginpagina </title>
    </head>
    
    <body>
<a href='#login'>login</a>

    <center>
        <div class="login" id="login">
        <form action="" method="POST">
        <form class="login-email">
                <p class="login-text">Login</p>
            
                <div class="input-group">
                    <input name="gn" type="username"  placeholder="gebruikersnaam" required>
                </div>
                <div class="input-group">
                    <input name="wachtwoord" type="Wachtwoord"  placeholder="wachtwoord" required>
                </div>
                <div class="input-group">
                    <button class="btn">Login</button>
                    </div>
                    <br><br>                    <br><br>
                  
                    <a type="button" class="sluitknop" href="#">&times;</a>

                </form>
            </div>


    </body>
</center>
    </html>
    <?php
    include 'connection.php';




    
?>

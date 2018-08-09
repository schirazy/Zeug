
<!DOCTYPE html> <html>
    <head>
        <meta charset="UTF-8">
        <titel>Passworttest</titel>
    </head>
    <body>
        <h1>Passworttest</h1>
        <p><?php echo $nachricht; ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Bitte geben Sie ein PW zwischen 6 und 10 Zeichen ein:
            <input type="password" name="passwort" />
            <br />
            <input type="submit" value="absenden">
        </form>
    </body>
</html>
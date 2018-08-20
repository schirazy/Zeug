<?php

$message = '';

if(isset($_POST['Jahr']) && !empty($_POST["Jahr"])) {
    $jahr = ($_POST['Jahr']);


    if ($jahr % 4 === 0 && ($jahr % 100 !== 0)) {
        $message = "Es ist ein Schaltjahr";

    } elseif ($jahr % 400 === 0) {
        $message = "Es ist ein Schaltjahr";
    } else {
        $message = "Es ist kein Schaltjahr";
    }



}

?>



<!DOCTYPE Html><html>
    <head>
        <meta charset="utf-8">
        <title>Aufgabe 1</title>
    </head>

    <body>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Bitte geben Sie ein Jahr ein:
            <input type="text" name="Jahr" />
            <br>
            <input type="submit" value="absenden">
            <?php echo $message ?>

        </form>

    </body>
</html>


<!DOCTYPE html><html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>

    <body>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"
        <p>Geben Sie hier Ihren Text ein:</p>

        <textarea name="textklein" cols="50" row="20" > </textarea>
        <br><input type="submit" />
        <?php echo strtoupper($_POST['textklein']); ?>

        <p>Geben Sie hier Ihren Text ein:</p>

        <textarea name="textgross" cols="50" row="20"> </textarea>
        <br><input type="submit" />
        <?php echo strtolower($_POST['textgross']); ?>

        </form>
    </body>


</html>

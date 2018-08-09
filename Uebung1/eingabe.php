<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>hello</title>
    </head>
    <body>
        <?php

        $mail = [
            'hans' => 'hans@web.de',
            'sabine' => 'sabine@gmx.de',
            'liam' => 'liam@bla.de',
        ];
        var_dump($mail);

        $text = "Ich bin nur ein ganz kleiner Blindtext";
        $bla=explode(' ', $text);

        var_dump($bla);

        $blub = implode(', ', $mail);
        echo $blub;
        shuffle($mail);
        ?>

    </body>
</html>
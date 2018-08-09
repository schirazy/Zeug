<?php


class Car
{
    public $ps;
    public function drive()
    {
        var_dump("Ein Auto fährt mit xxx ps");
    }

}

$wv = new Car();
$wv->ps = 150;

$wbm = new Car();
$wbm->ps = 250;
$wbm->drive();

?>
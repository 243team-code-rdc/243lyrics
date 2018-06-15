<?php
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 18:06
 */

if(isset($_POST['album'],$_POST['chanson'],$_POST['paroles'])&& !empty($_POST['album']) && !empty($_POST['chanson']) && !empty($_POST['paroles']))
{
    include_once '../data/musique.fonc.class.php';
    $fmusique=new FoncMusique();
    $fmusique->add_parles($_POST['paroles'],$_POST['chanson']);
    header('Location: ../dashboard.php');
}
else
{
    header('Location: ../dashboard.php');
}
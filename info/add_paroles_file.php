<?php
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 18:06
 */

if(isset($_POST['album'],$_POST['chanson'])&& !empty($_POST['album']) && !empty($_POST['chanson']))
{
    include_once '../data/musique.fonc.class.php';
    $fmusique=new FoncMusique();
    if(isset($_FILES['paroles']) && !empty($_FILES['paroles']))
    {
        $paroles=file_get_contents($_FILES['paroles']['tmp_name']);
        $fmusique->add_parles($paroles,$_POST['chanson']);
        header('Location: ../dashboard.php');
    }

}
else
{
    header('Location: ../dashboard.php');
}
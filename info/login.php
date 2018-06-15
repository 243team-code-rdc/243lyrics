<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 11:01
 */
if(isset($_POST['value1'],$_POST['pass']) && !empty($_POST['value1']) && !empty($_POST['pass']))
{

    include_once '../data/functions.artiste.class.php';

    $fartiste=new ArtisteFonc();
    $x=$fartiste->login($_POST['value1'],sha1($_POST['pass']));
    if(empty($x))
    {
        $_SESSION['err'][]="Telephone,email ou Mot de passe incorrect";
        header('Location: ../login.php');
    }
    else
    {
        foreach ($x as $t)
        {
            $_SESSION['me']=$t['id_art'];
            $_SESSION['you']=$t['nom_artiste'];
        }
        header('Location: ../dashboard.php');
    }


}
else
{
    if(empty($_POST['value1']))
    {
        $_SESSION['err'][]="Telephone ou email requis";
    }
    if(empty($_SESSION['pass']))
    {
        $_SESSION['err'][]="Mot de passe requis";
    }
    header('Location: ../login.php');
}
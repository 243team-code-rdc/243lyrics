<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 10:32
 */

function get_ip()
{
    // IP si internet partagé
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // IP derrière un proxy
    elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Sinon : IP normale
    else {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    }
}

if(isset($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['mypasse'],$_POST['confirmer'])
&& !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['mypasse']) && !empty($_POST['confirmer']))
{
    $_SESSION['save']['name']=$_POST['name'];
    $_SESSION['save']['phone']=$_POST['phone'];
    $_SESSION['save']['email']=$_POST['email'];
    include_once '../data/artiste.class.php';
    include_once '../data/functions.artiste.class.php';

    $artiste=new Artiste();
    $fartisite=new ArtisteFonc();
    $artiste->setNom($_POST['name']);
    $artiste->setNumero($_POST['phone']);
    $artiste->setEmail($_POST['email']);
    $artiste->setMotDePasse($_POST['mypasse']);
    $artiste->setIp(get_ip());

    if($_POST['mypasse'] != $_POST['confirmer'])
    {
        $_SESSION['err'][]="Mot de passe differents";
    }
    if(strlen($_POST['mypasse'])<8)
    {
        $_SESSION['err'][]="Mot de passe trop court min 8";
    }
    if($fartisite->check_nom($_POST['name']))
    {
        $_SESSION['err'][]="Ce nom est deja utiliser";
    }
    if($fartisite->check_email($_POST['email']))
    {
        $_SESSION['err'][]="Cette adresse email est deja prise";
    }
    if($fartisite->check_numero($_POST['phone']))
    {
        $_SESSION['err'][]="Ce numero est deja utiliser";
    }
    if($fartisite->verifie_numero($_POST['phone']))
    {
        $_SESSION['err'][]="Format de numero invalide ex:099123456789";
    }

    if(empty($_SESSION['err']))
    {
        unset($_SESSION['save']);
        $x=$fartisite->add_new_artiste($artiste);
        $_SESSION['me']=$x;
        $_SESSION['you']=$_POST['name'];
        header('Location: ../dashboard.php');
    }
    else
    {
        header('Location: ../sign.php');
    }



}
else
{
    if(empty($_POST['name']))
    {
        $_SESSION['err'][]="Manque le nom";
    }
    if(empty($_POST['email']))
    {
        $_SESSION['err'][]="Email necessaire";
    }
    if(empty($_POST['phone']))
    {
        $_SESSION['err'][]="Telephone vide";
    }
    if(empty($_POST['mypasse']))
    {
        $_SESSION['err'][]="Mot de passe vide";
    }
    if(empty($_POST['confirmer']))
    {
        $_SESSION['err'][]="confirmation Mot de passe vide";
    }
    header('Location: ../sign.php');
}
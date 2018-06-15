<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 17:40
 */

if(isset($_POST['album'],$_POST['chanson']) && !empty($_POST['album']) && !empty($_POST['chanson']))
{
    include_once '../data/musique.fonc.class.php';

    $mus=new FoncMusique();
    $x=$_POST['chanson'];

    if(isset($_FILES['audio'])&& !empty($_FILES['audio']))
    {

        if(move_uploaded_file($_FILES['audio']['tmp_name'],'../data_save/audio_songs/'.$_FILES['audio']['name']))
        {
            if(file_exists('../data_save/audio_songs/'.$_FILES['audio']['name']))
            {
                $ex=new SplFileInfo($_FILES['audio']['name']);
                rename('../data_save/audio_songs/'.$_FILES['audio']['name'],'../data_save/audio_songs/'.$x.'.'.$ex->getExtension());
                $mus->add_audio($x,$x.'.'.$ex->getExtension());
            }
        }
        header('Location: ../dashboard.php');

    }
    else
    {
        echo 'fichier introuvable';
    }
}else
{
    echo 'manques des fichiers';
}
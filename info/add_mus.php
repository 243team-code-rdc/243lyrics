<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 15:33
 */
//var_dump($_FILES);

if(isset($_POST['album'],$_POST['categorie'],$_POST['titre'],$_POST['duree'],$_POST['studio'],$_POST['jour'],$_POST['mois'],$_POST['annee'])
    && !empty($_POST['album']) && !empty($_POST['categorie']) && !empty($_POST['duree']) && !empty($_POST['studio'])
&& !empty($_POST['jour']) && !empty($_POST['mois']) && !empty($_POST['annee']))
{
    include_once '../data/musique.class.php';
    include_once '../data/musique.fonc.class.php';

    $musique=new Musique();
    $fmusique=new FoncMusique();

    if($fmusique->check_musique($_SESSION['me'],$_POST['titre']))
    {
        $_SESSION['err'][]="Ce titre existe deja";
    }

    $musique->setTitre($_POST['titre']);
    $musique->setAlbum($_POST['album']);
    $musique->setCategorie($_POST['categorie']);
    $musique->setDurre($_POST['duree']);
    $musique->setStudio($_POST['studio']);
    $musique->setIdArt($_SESSION['me']);
    $musique->setDateSortie($_POST['jour'].' '.$_POST['mois'].' '.$_POST['annee']);

    if(isset($_FILES['paroles']) && !empty($_FILES['paroles']))
    {
        $paroles=file_get_contents($_FILES['paroles']['tmp_name']);
        $musique->setParoles($paroles);
    }


    if(empty($_SESSION['err']))
    {

        $x=$fmusique->add_musique($musique);

        if(isset($_FILES['audio'])&& !empty($_FILES['audio']))
        {
            if(move_uploaded_file($_FILES['audio']['tmp_name'],'../data_save/audio_songs/'.$_FILES['audio']['name']))
            {
                if(file_exists('../data_save/audio_songs/'.$_FILES['audio']['name']))
                {
                    $ex=new SplFileInfo($_FILES['audio']['name']);
                    rename('../data_save/audio_songs/'.$_FILES['audio']['name'],'../data_save/audio_songs/'.$x.'.'.$ex->getExtension());
                    $fmusique->add_audio($x,$x.'.'.$ex->getExtension());
                }
            }


        }

        if(isset($_FILES['image'])&& !empty($_FILES['image']))
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],'../data_save/audio_preview/'.$_FILES['image']['name']))
            {
                if(file_exists('../data_save/audio_preview/'.$_FILES['image']['name']))
                {
                    $ex=new SplFileInfo($_FILES['image']['name']);
                    rename('../data_save/audio_preview/'.$_FILES['image']['name'],'../data_save/audio_preview/'.$x.'.'.$ex->getExtension());
                    $fmusique->add_img($x,$x.'.'.$ex->getExtension());
                }
            }


        }



        header('Location: ../dashboard.php');
    }else
    {
        header('Location: ../add_musique.php');
    }


}
else
{
    header('Location: ../add_musique.php');
}

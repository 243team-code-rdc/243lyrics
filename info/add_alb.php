<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 11:29
 */
if(isset($_POST['titre'],$_POST['morceau'],$_POST['jour'],$_POST['mois'],$_POST['annee'],$_POST['description'])
&& !empty($_POST['titre']) && !empty($_POST['morceau']) && !empty($_POST['jour']) && !empty($_POST['mois'])
&& !empty($_POST['annee']) && !empty($_POST['description']))
{
    include_once '../data/album.class.php';
    include_once '../data/album.fonctions.php';

    $album=new Album();
    $falbum=new AlbumFonc();


    $album->setTitre($_POST['titre']);
    $album->setDescription($_POST['description']);
    $album->setNbMorceau($_POST['morceau']);
    $album->setDateSortie($_POST['jour'].' '.$_POST['mois'].' '.$_POST['annee']);
    $album->setIdArt($_SESSION['me']);

    if($falbum->check_name($_POST['titre'],$_SESSION['me']))
    {
        $_SESSION['err'][]="Cette album existe deja";

    }

    if(empty($_SESSION['err']))
    {
        $all=$falbum->add_album($album);
        if(isset($_FILES['image'])&& !empty($_FILES['image']))
        {
            move_uploaded_file($_FILES['image']['tmp_name'],'../data_save/album_preview/'.$_FILES['image']['name']);
            if(file_exists('../data_save/album_preview/'.$_FILES['image']['name']))
            {
                $ex=new SplFileInfo($_FILES['image']['name']);
                rename('../data_save/album_preview/'.$_FILES['image']['name'],'../data_save/album_preview/'.$all.'.'.$ex->getExtension());
                $falbum->add_img($all,$all.'.'.$ex->getExtension());
            }
        }
        header('Location: ../dashboard.php');

    }
    else
    {
        header('Location: ../add_album.php');
    }
}
else
{
    if(empty($_POST['titre']))
    {
        $_SESSION['err'][]="Donner le titre de l'album";
    }
    if(empty($_POST['desciption']))
    {
        $_SESSION['err'][]="Donner une description de l'album";
    }
    if(empty($_POST['morceau']))
    {
        $_SESSION['err'][]="Donner le nombre de titre de l'album";
    }
    header('Location: ../add_album.php');
}
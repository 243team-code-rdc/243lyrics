<?php

/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 11:21
 */
class AlbumFonc
{
    private $bdd;
    public function __construct()
    {
        include_once 'connexion.class.php';
        include_once 'album.class.php';
        $this->bdd=Connexion::getConnexion();
    }

    public function check_name($nom,$id)
    {
        $req=$this->bdd->prepare('SELECT id_alb FROM data_albums WHERE nom_album=? AND id_art=?');
        $req->execute(array($nom,$id));
        if($req->rowCount()==0)
        {
            return false;
        }
        return true;
    }

    public function add_album(Album $album)
    {
        $req=$this->bdd->prepare('INSERT INTO data_albums SET nom_album=?,nb_morceau=?,date_sortie=?,descriptions=?, id_art=?');
        $req->execute(array($album->getTitre(),$album->getNbMorceau(),$album->getDateSortie(),$album->getDescription(),$album->getIdArt()));
        return $this->bdd->lastInsertId();
    }
    public function add_img($id_alb,$nom_file)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_images WHERE id_alb=?');
        $req->execute(array($id_alb));
        if($req->rowCount()==0)
        {
            $req=$this->bdd->prepare('INSERT INTO data_images  SET nom_img=?,id_alb=?');
            $req->execute(array($nom_file,$id_alb));
        }
        else
        {
            $req=$this->bdd->prepare('UPDATE data_images SET nom_img=? WHERE id_alb=?');
            $req->execute(array($nom_file,$id_alb));
        }

    }

    public function get_info_album($id_album)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_albums WHERE id_alb=?');
        $req->execute(array($id_album));
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function get_all_album_users($id_art)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_albums WHERE id_art=?');
        $req->execute(array($id_art));
        return $req->fetchAll();
    }




}
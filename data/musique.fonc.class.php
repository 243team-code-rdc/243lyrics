<?php

/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 14:51
 */
class FoncMusique
{
    private  $bdd;
    public function __construct()
    {
        include_once 'connexion.class.php';
        include_once 'musique.class.php';
        $this->bdd = Connexion::getConnexion();
    }

    public function check_musique($id,$m)
    {
        $req=$this->bdd->prepare('SELECT id_mus FROM data_musiques WHERE id_art=? AND titre=?');
        $req->execute(array($id,$m));
        if($req->rowCount()==0)
        {
            return false;
        }
        return true;
    }
    public function add_musique(Musique $m)
    {
        $req=$this->bdd->prepare('INSERT INTO data_musiques SET id_alb=?,categorie=?,titre=?,duree=?,maison_prod=?,paroles=?, id_art=? ');
        $req->execute(array($m->getAlbum(),$m->getCategorie(),$m->getTitre(),$m->getDurre(),$m->getStudio(),$m->getParoles(),$m->getIdArt()));
        return $this->bdd->lastInsertId();
    }
    public function get_info_musique($id_musique)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_musiques WHERE id_mus=?');
        $req->execute(array($id_musique));
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function get_all_musique_album($id_alb)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_musiques WHERE id_alb=?');
        $req->execute(array($id_alb));
        return $req->fetchAll();
    }

    public function add_img($id_img,$nom_img)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_images_musiques WHERE id_mus=?');
        $req->execute(array($id_img));
        if($req->rowCount()==0)
        {
            $req=$this->bdd->prepare('INSERT INTO data_images_musiques  SET nom_img=?,id_mus=?');
            $req->execute(array($nom_img,$id_img));
        }
        else
        {
            $req=$this->bdd->prepare('UPDATE data_images_musiques SET nom_img=? WHERE id_mus=?');
            $req->execute(array($nom_img,$id_img));
        }
    }

    public function add_audio($id_mus,$nom_mus)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_audio WHERE id_mus=?');
        $req->execute(array($id_mus));
        if($req->rowCount()==0)
        {
            $req=$this->bdd->prepare('INSERT INTO data_audio  SET nom_audio=?,id_mus=?');
            $req->execute(array($nom_mus,$id_mus));
        }
        else
        {
            $req=$this->bdd->prepare('UPDATE data_audio SET nom_audio=? WHERE id_mus=?');
            $req->execute(array($nom_mus,$id_mus));
        }
    }

    public function add_parles($parles,$id_mus)
    {
        $req=$this->bdd->prepare('UPDATE data_musiques SET paroles=? WHERE id_mus=?');
        $req->execute(array($parles,$id_mus));
    }


}
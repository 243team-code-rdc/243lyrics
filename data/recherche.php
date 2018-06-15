<?php
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 19:07
 */
class Recherche
{
    private $bdd;
    public function __construct()
    {
        include_once 'connexion.class.php';
        $this->bdd=Connexion::getConnexion();
    }

    public function recherche_with_key($key)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_musiques WHERE  LOWER(CONCAT(id_alb,titre,paroles)) LIKE ?');
        $req->execute(array("%".strtolower($key)."%"));
        return $req->fetchAll();
    }

    public function recherche_with_key_categ($key,$kategorie)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_musiques WHERE  LOWER(CONCAT(id_alb,titre,paroles)) LIKE ? AND categorie=?');
        $req->execute(array("%".strtolower($key)."%",$kategorie));
        return $req->fetchAll();
    }

    public function recherche_with_key_categ_year($key,$categ,$year)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_musiques WHERE  LOWER(CONCAT(id_alb,titre,paroles)) LIKE ? AND categorie=?');
        $req->execute(array("%".strtolower($key)."%",$categ));
        return $req->fetchAll();
    }

    public function recherche_with_categorie($categproe)
    {
        $req=$this->bdd->prepare('SELECT LOWER(*) FROM data_musiques WHERE categorie=?');
        $req->execute(array($categproe));

        return $req->fetchAll();
    }


    public function get_image_sing($id)
    {
        $req=$this->bdd->prepare('SELECT nom_img FROM data_images_musiques WHERE id_mus=?');
        $req->execute(array($id));
        return $req->fetch()['nom_img'];
    }
    public function get_image_song($id)
    {
        $req=$this->bdd->prepare('SELECT nom_audio FROM data_audio WHERE id_mus=?');
        $req->execute(array($id));
        return $req->fetch()['nom_audio'];
    }

    public function get_infomation_musique_by_id($id)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_musiques m , data_users u WHERE m.id_mus=? AND u.id_art=m.id_art');
        $req->execute(array($id));
        return $req->fetch();
    }

}
?>
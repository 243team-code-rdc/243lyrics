<?php

/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 10:20
 */
class ArtisteFonc
{
    private $bdd;
    public function __construct()
    {
        include_once 'connexion.class.php';
        include_once 'artiste.class.php';
        $this->bdd=Connexion::getConnexion();
    }

    public function check_nom($pseudo)
    {
        $req=$this->bdd->prepare('SELECT id_art FROM data_users WHERE nom_artiste=?');
        $req->execute(array($pseudo));
        if($req->rowCount()==0)
        {
            return false;
        }
        return true;
    }

    public function check_email($email)
    {
        $req=$this->bdd->prepare('SELECT id_art FROM data_users WHERE email=?');
        $req->execute(array($email));
        if($req->rowCount()==0)
        {
            return false;
        }
        return true;

    }

    public function check_numero($numero)
    {
        $req=$this->bdd->prepare('SELECT id_art FROM data_users WHERE numero=?');
        $req->execute(array($numero));
        if($req->rowCount()==0)
        {
            return false;
        }
        return true;

    }

    public function verifie_numero($telephone){
        $error=false;
        $validity=preg_match('#(0)(81|82|84|85|89|97|99|90)([0-9]{7})$#',$telephone);
        if(!$validity){
            $error=true;
        }
        return $error;
    }


    public function add_new_artiste(Artiste $a)
    {
        $req=$this->bdd->prepare('INSERT INTO data_users SET nom_artiste=?,email=?,numero=?,ip_art=?,mot_de_passe=?');
        $req->execute(array($a->getNom(),$a->getEmail(),$a->getNumero(),$a->getIp(),sha1($a->getMotDePasse())));
        return $this->bdd->lastInsertId();
    }

    public function get_information_client($value)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_users WHERE id_art=?');
        $req->execute(array($value));
        return $req->fetchAll();
    }

    public function login($value1,$value2)
    {
        $req=$this->bdd->prepare('SELECT * FROM data_users WHERE email=? OR numero=? AND mot_de_passe=?');
        $req->execute(array($value1,$value1,$value2));
        return $req->fetchAll();
    }



}
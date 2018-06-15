<?php

/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 15:14
 */
class Categorie
{
    private $id_cat;
    private $nom_cat;

    private $bdd;

    /**
     * Categorie constructor.
     */
    public function __construct()
    {
        include_once 'connexion.class.php';
        $this->bdd=Connexion::getConnexion();
    }


    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * @param mixed $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
    }

    /**
     * @return mixed
     */
    public function getNomCat()
    {
        return $this->nom_cat;
    }

    /**
     * @param mixed $nom_cat
     */
    public function setNomCat($nom_cat)
    {
        $this->nom_cat = $nom_cat;
    }

    public function get_all_categories()
    {
        $req=$this->bdd->prepare('SELECT * FROM data_categories');
        $req->execute();
        return $req->fetchAll();
    }


}
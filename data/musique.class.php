<?php

/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 14:57
 */
class Musique
{
    private $id;
    private $album;
    private $titre;
    private $durre;
    private $studio;
    private $categorie;
    private $date_ajou;
    private $id_art;
    private $paroles;
    private $date_sortie;

    /**
     * Musique constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDurre()
    {
        return $this->durre;
    }

    /**
     * @param mixed $durre
     */
    public function setDurre($durre)
    {
        $this->durre = $durre;
    }

    /**
     * @return mixed
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * @param mixed $studio
     */
    public function setStudio($studio)
    {
        $this->studio = $studio;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getDateAjou()
    {
        return $this->date_ajou;
    }

    /**
     * @param mixed $date_ajou
     */
    public function setDateAjou($date_ajou)
    {
        $this->date_ajou = $date_ajou;
    }

    /**
     * @return mixed
     */
    public function getIdArt()
    {
        return $this->id_art;
    }

    /**
     * @param mixed $id_art
     */
    public function setIdArt($id_art)
    {
        $this->id_art = $id_art;
    }

    /**
     * @return mixed
     */
    public function getParoles()
    {
        return $this->paroles;
    }

    /**
     * @param mixed $paroles
     */
    public function setParoles($paroles)
    {
        $this->paroles = $paroles;
    }

    /**
     * @return mixed
     */
    public function getDateSortie()
    {
        return $this->date_sortie;
    }

    /**
     * @param mixed $date_sortie
     */
    public function setDateSortie($date_sortie)
    {
        $this->date_sortie = $date_sortie;
    }






}
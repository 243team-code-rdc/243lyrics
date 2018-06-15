<?php

/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 11:11
 */
class Album
{
    private $id;
    private $titre;
    private $nb_morceau;
    private $date_sortie;
    private $nb_vue;
    private $description;
    private $nb_appartions;
    private $nb_cliques;
    private $date_ajout;
    private $id_art;

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
    public function getNbMorceau()
    {
        return $this->nb_morceau;
    }

    /**
     * @param mixed $nb_morceau
     */
    public function setNbMorceau($nb_morceau)
    {
        $this->nb_morceau = $nb_morceau;
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

    /**
     * @return mixed
     */
    public function getNbVue()
    {
        return $this->nb_vue;
    }

    /**
     * @param mixed $nb_vue
     */
    public function setNbVue($nb_vue)
    {
        $this->nb_vue = $nb_vue;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getNbAppartions()
    {
        return $this->nb_appartions;
    }

    /**
     * @param mixed $nb_appartions
     */
    public function setNbAppartions($nb_appartions)
    {
        $this->nb_appartions = $nb_appartions;
    }

    /**
     * @return mixed
     */
    public function getNbCliques()
    {
        return $this->nb_cliques;
    }

    /**
     * @param mixed $nb_cliques
     */
    public function setNbCliques($nb_cliques)
    {
        $this->nb_cliques = $nb_cliques;
    }

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->date_ajout;
    }

    /**
     * @param mixed $date_ajout
     */
    public function setDateAjout($date_ajout)
    {
        $this->date_ajout = $date_ajout;
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


}
<?php
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 17:22
 */
require_once '../data/musique.fonc.class.php';
if(isset($_POST['categorie1']) && !empty($_POST['categorie1']))
{
    $catego=new FoncMusique();
    //$catego->get_id_by_categotie($_POST['categorie1']);
    $all_sous_cat=$catego->get_all_musique_album($_POST['categorie1']);
    echo json_encode($all_sous_cat);
}
else
{
    echo 'null';
}
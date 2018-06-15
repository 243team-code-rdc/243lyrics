<?php

/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 14/06/2018
 * Time: 10:05
 */
class Connexion
{
    public static function getConnexion()
    {

        try {
            $host = 'mysql:host=127.0.0.1;dbname=243lyrics';
            $user = 'root';
            $pwd = '';
            $pdo = new PDO($host, $user, $pwd,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true));
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

        return $pdo;
    }

}
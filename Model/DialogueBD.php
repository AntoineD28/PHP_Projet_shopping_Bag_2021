<?php
/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of DialogueBD
 *
 * @author antoine DUMAS
 */
require_once 'Connexion.php';

class DialogueBD
{
    //put your code here

    public function getUtilisateur($login, $mdp)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT PrenomUtil, NomUtil ";
            $sql = $sql . "FROM utilis ";
            $sql = $sql . "WHERE LoginUtil = ? AND PassUtil = ?";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($login, $mdp));
            //$sth->execute();
            $utilis = $sth->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($utilis);
            return $utilis;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            //echo $erreur;
        }
    }

    public function getCategories() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM categories";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $cat = $sth->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($cat);
            return $cat;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            //echo $erreur;
        }
    }

    public function getProducts(){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM products";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $produits = $sth->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($cat);
            return $produits;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            //echo $erreur;
        }
    }

    public function getProductsCat($id){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM products where cat_id = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id));
            $produits = $sth->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($cat);
            return $produits;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            //echo $erreur;
        }
    }


}

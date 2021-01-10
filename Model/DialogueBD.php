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
            $sql = "SELECT customer_id, username ";
            $sql = $sql . "FROM logins ";
            $sql = $sql . "WHERE username = ? AND password = ?";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($login, sha1($mdp)));
            $utilis = $sth->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($utilis);
            return $utilis;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            //echo $erreur;
        }
    }
    
    public function createCustomers($forname, $surname, $add1, $add2, $add3, $postcode, $phone, $email, $registered = 1) {
        $ajoutOK = false;
        try {
            // Insertion du nouveau customer
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO customers (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES ";
            $sql = "(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($forname, $surname, $add1, $add2, $add3, $postcode, $phone, $email, $registered));
            // Variable drapeau indiquant le succès de l'ajout
            $ajoutOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            //echo $erreur;
        }
        return $ajoutOK;
    }

    public function createLogins($customer_id, $username, $password) {
        $ajoutOK = false;
        try {
            // Insertion des logs du customer
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO logins (`id`, `customer_id`, `username`, `password`) VALUES ";
            $sql = "(NULL, ?, ?, ?)";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($customer_id, $username, $password));
            // Variable drapeau indiquant le succès de l'ajout
            $ajoutOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            //echo $erreur;
        }
        return $ajoutOK;
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

    public function getNomCat($id) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT name FROM categories WHERE id = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id));
            $name = $sth->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($name);
            return $name;
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

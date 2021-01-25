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

    public function createCustomers($forname, $surname, $add1, $add2, $add3, $postcode, $phone, $email)
    {
        $ajoutOK = false;
        try {
            // Insertion du nouveau customer
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO customers (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES 
                (NULL, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($forname, $surname, $add1, $add2, $add3, $postcode, $phone, $email));
            // Variable drapeau indiquant le succès de l'ajout
            $ajoutOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            echo $msgErreur;
        }
        return $ajoutOK;
    }

    public function getLastID()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT MAX(id) FROM customers";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute();
            $utilis = $sth->fetchAll(PDO::FETCH_ASSOC);
            var_dump($utilis);
            return $utilis;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            //echo $erreur;
        }
    }

    public function createLogins($customer_id, $username, $password)
    {
        $ajoutOK = false;
        try {
            // Insertion des logs du customer
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO logins (`id`, `customer_id`, `username`, `password`) VALUES (NULL, ?, ?, ?)";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($customer_id, $username, sha1($password)));
            // Variable drapeau indiquant le succès de l'ajout
            $ajoutOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            //echo $erreur;
        }
        return $ajoutOK;
    }

    public function getCategories()
    {
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

    public function getNomCat($id)
    {
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

    public function getProducts()
    {
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

    public function getProductsCat($id)
    {
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

    public function getPrix($id)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT price FROM products where id = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id));
            $price = $sth->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($cat);
            return $price;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            echo $erreur;
        }
    }

    public function AddOrderUnique($id)
    {
        $ajoutOK = false;
        try {
            // Insertion d'une nouvelle commande
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`)
                VALUES (NULL, '', 0, NULL, NULL, ?, 0, ? , 0)";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array(date("Y-m-d"), $id));
            // Variable drapeau indiquant le succès de l'ajout
            $ajoutOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            echo $msgErreur;
        }
        return $ajoutOK;
    }

    public function AddOrder($idUser, $session)
    {
        $ajoutOK = false;
        try {
            // Insertion d'une nouvelle commande
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`)
                VALUES (NULL, ?, 1, NULL, NULL, ?, 0, ? , 0)";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($idUser, date("Y-m-d"), $session));
            // Variable drapeau indiquant le succès de l'ajout
            $ajoutOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            echo $msgErreur;
        }
        return $ajoutOK;
    }

    public function getProductsOrder($order_id)
    {
        $id = (int)$order_id; // On converti en int order_id
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM `orderitems` o JOIN products p ON o.product_id = p.id WHERE order_id = ? ";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($id));
            $order = $sth->fetchAll(PDO::FETCH_ASSOC);
            var_dump($order);
            return $order;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            echo $erreur;
        }
    }

    public function getOrder($customer_id)
    {
        $id = (int)$customer_id; // On converti en int order_id
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM orders WHERE customer_id = ? AND `status` = 0";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($id));
            $order = $sth->fetchAll(PDO::FETCH_ASSOC);
            var_dump($order);
            return $order;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            echo $erreur;
        }
    }

    public function getOrderId()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT MAX(id) FROM orders";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute();
            $utilis = $sth->fetchAll(PDO::FETCH_ASSOC);
            var_dump($utilis);
            return $utilis;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            echo $erreur;
        }
    }

    public function AddProduct($order_id, $product_id, $quantity) {
        $ajoutOK = false;
        $id = (int)$order_id; // On converti en int order_id
        try {
            // Insertion d'un nouveau produit dans le panier
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`) 
                VALUES (NULL, ?, ?, ?)";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($id, $product_id, $quantity));
            // Variable drapeau indiquant le succès de l'ajout
            $ajoutOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            echo $msgErreur;
        }
        return $ajoutOK;
    }

    public function updateTotal($order_id, $price) {
        $updateOK = false;
        $id = (int)$order_id; // On converti en int order_id
        try {
            // Maj du prix total de la commande
            $conn = Connexion::getConnexion();
            $sql = "UPDATE `orders` SET total = total + ? WHERE id = ?";
            $sth = $conn->prepare($sql);
            // Exécution de la requête en lui passant le tableau des arguments
            $sth->execute(array($price, $id));
            // Variable drapeau indiquant le succès de l'ajout
            $updateOK = true;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage() . '(' . $e->getFile() . ', ligne ' . $e->getLine() . ')';
            echo $msgErreur;
        }
        return $updateOK;
    }
}

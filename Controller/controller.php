<?php
require_once './Model/DialogueBD.php';

function listProducts()
{
    // Récupération des produits de la BD  
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $products = $undlg->getProducts();
        require_once './View/listeProductView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function listCateg()
{
    // Récupération des catégories de produits
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();
        require_once './View/listeProductView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function TousProduits()
{
    // Récupération des catégories et des produits
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $products = $undlg->getProducts();
        $categories = $undlg->getCategories();
        require_once './View/listeProductView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function categorie($id)
{
    // Récupération les produits de la catégories passé en param
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();
        $products = $undlg->getProductsCat($id);
        $name = $undlg->getNomCat($id);
        require_once './View/listeProductCategView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function accueil()
{
    // Récupération des catégories
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();
        require_once './View/listeCategView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function inscription()
{
        // Récupération des catégories
        try {
            // on crée un objet référant la classe DialogueBD
            $undlg = new DialogueBD();
            $create = $undlg->createCustomers($_POST['inputForname'],$_POST['inputSurname'],$_POST['inputAdd1'],$_POST['inputAdd2'],
                $_POST['inputAdd3'],$_POST['inputPostCode'],$_POST['inputPhone'],$_POST['inputEmail']);
            if ($create) {
                $id = $undlg->getLastID();
                $log = $undlg->createLogins($id[0]['MAX(id)'], $_POST['inputForname'], $_POST['inputPassword']);
                if ($log) {
                    $_SESSION['REG'] = true;
                    require_once './View/connexionView.php';
                }
            }
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
}

function connexion()
{
    // Récupération de l'utilisateur
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $user = $undlg->getUtilisateur($_POST['login'], $_POST['mdp']);
        $categories = $undlg->getCategories();
        foreach($user as $u){
            $id = $u['customer_id'];
            $username = $u['username'];
        }
        if (isset($id) && isset($username)) {
            $_SESSION['ID'] = $id;
            $_SESSION['NAME'] = $username;
            require_once './View/listeCategView.php';
        }
        else {
            $_SESSION['authOK'] = false;
            require_once './View/connexionView.php';
        }
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function deconnexion()
{
    // l'utilisateur s'est déconnecté on détruit la session
    session_destroy();
    // Récupération des catégories
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();
        require_once './View/listeCategView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

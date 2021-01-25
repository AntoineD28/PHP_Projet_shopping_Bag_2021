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

function AjoutPanier($idProduct)
{
    $idUnique = session_id();
    //var_dump($idUnique);
    // Ajout d'un produit au panier
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();
        $price = $undlg->getPrix($idProduct); // On récupère le prix du produit 
        // Si il y déja une commande en cours 
        if (isset($_SESSION['SESS_ORDERNUM'])) {
            $order = $undlg->AddProduct($_SESSION['SESS_ORDERNUM'], $idProduct, $_POST['Quantity']);
            $prix = $_POST['Quantity'] * $price[0]['price'];
            //var_dump($prix);
            $updatePrice = $undlg->updateTotal($_SESSION['SESS_ORDERNUM'], $prix);
            //var_dump($updatePrice);
        } else { // Si il n'y pas de commande en cours
            if (isset($_SESSION['ID'])) // Si l'utilisateur connecté n'a pas de commande en cours 
                $orderOK = $undlg->AddOrder($_SESSION['ID'], $idUnique);
            else $orderOK = $undlg->AddOrderUnique($idUnique); // Si l'utilisateur n'est pas connecté 
            var_dump($orderOK);
            if ($orderOK) {
                $idOrder = $undlg->getOrderId(); // Récupération de l'id de la commande créée juste avant 
                $_SESSION['SESS_ORDERNUM'] = $idOrder[0]['MAX(id)'];
                var_dump($_SESSION['SESS_ORDERNUM']);
                $productOK = $undlg->AddProduct($_SESSION['SESS_ORDERNUM'], $idProduct, $_POST['Quantity']);
                $prix = $_POST['Quantity'] * $price[0]['price'];
                $updatePrice = $undlg->updateTotal($_SESSION['SESS_ORDERNUM'], $prix);
            }
        }
        require_once './View/listeCategView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function afficherPanier()
{
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $products = $undlg->getProductsOrder($_SESSION['SESS_ORDERNUM']);
        //var_dump($products);
        require_once './View/panierView.php';
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
        $create = $undlg->createCustomers(
            $_POST['inputForname'],
            $_POST['inputSurname'],
            $_POST['inputAdd1'],
            $_POST['inputAdd2'],
            $_POST['inputAdd3'],
            $_POST['inputPostCode'],
            $_POST['inputPhone'],
            $_POST['inputEmail']
        );
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
        session_destroy();
        session_start();
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $user = $undlg->getUtilisateur($_POST['login'], $_POST['mdp']);
        $categories = $undlg->getCategories();
        foreach ($user as $u) {
            $id = $u['customer_id'];
            $username = $u['username'];
        }
        if (isset($id) && isset($username)) {
            $_SESSION['ID'] = $id;
            $_SESSION['NAME'] = $username;
            $order = $undlg->getOrder($_SESSION['ID']);
            $_SESSION['SESS_ORDERNUM'] = $order[0]['id'];
            require_once './View/listeCategView.php';
        } else {
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

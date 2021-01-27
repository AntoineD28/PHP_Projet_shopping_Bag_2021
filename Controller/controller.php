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
    if (!isset($_SESSION['NB_PANIER']))
        $_SESSION['NB_PANIER'] = 0;

    $idUnique = session_id();
    // Ajout d'un produit au panier
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();

        $price = $undlg->getPrix($idProduct); // On récupère le prix du produit 

        // Si il y déja une commande en cours 
        if (isset($_SESSION['SESS_ORDERNUM'])) {
            // On vérifie si le produit ajouté au panier est déjà dans le commande 
            $product = $undlg->searchProductOrder($_SESSION['SESS_ORDERNUM'], $idProduct);

            if (count($product) == 1) // Alors on met a jour la quantité seulement 
                $updateQte = $undlg->updateQuantity($_SESSION['SESS_ORDERNUM'], $idProduct, $_POST['Quantity']);
            else // Sinon on ajoute le produit au panier
                $order = $undlg->AddProduct($_SESSION['SESS_ORDERNUM'], $idProduct, $_POST['Quantity']);

            // Mise à jour du prix
            $prix = $_POST['Quantity'] * $price[0]['price'];
            $updatePrice = $undlg->updateTotal($_SESSION['SESS_ORDERNUM'], $prix);
        } else { // Si il n'y pas de commande en cours

            if (isset($_SESSION['ID'])) // Si l'utilisateur connecté n'a pas de commande en cours 
                $orderOK = $undlg->AddOrder($_SESSION['ID'], $idUnique);
            else $orderOK = $undlg->AddOrderUnique($idUnique); // Si l'utilisateur n'est pas connecté 

            if ($orderOK) {

                $idOrder = $undlg->getOrderId(); // Récupération de l'id de la commande créée juste avant 
                $_SESSION['SESS_ORDERNUM'] = $idOrder[0]['MAX(id)'];

                // On ajoute le produit au panier
                $productOK = $undlg->AddProduct($_SESSION['SESS_ORDERNUM'], $idProduct, $_POST['Quantity']);

                // Mise à jour du prix
                $prix = $_POST['Quantity'] * $price[0]['price'];
                $updatePrice = $undlg->updateTotal($_SESSION['SESS_ORDERNUM'], $prix);
            }
        }

        // On met à jour le nombre de d'éléments dans le panier
        $_SESSION['NB_PANIER'] += $_POST['Quantity'];

        // On se revient sur la page où l'utilisateur été juste avant
        $cat_id = $undlg->getCatId($idProduct);
        categorie($cat_id[0]['cat_id']);
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function afficherPanier()
{
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();

        // On regarde si il y une commande en cours
        if (isset($_SESSION['SESS_ORDERNUM'])) {

            // Récupération des articles de la commande
            $products = $undlg->getProductsOrder($_SESSION['SESS_ORDERNUM']);
            // Récupération du prix total de la commande
            $total = $undlg->getTotal($_SESSION['SESS_ORDERNUM']);
            $connOK = true;
        } else {
            $connOK = false;
        }
        require_once './View/panierView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function retirerArticle($product_id, $price, $quantity)
{
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();

        // On retire le produit de la commande en cours
        $products = $undlg->removeProduct($_SESSION['SESS_ORDERNUM'], $product_id);

        // Mise à jour du prix
        $prix = $price * $quantity;
        $updatePrice = $undlg->updateTotal($_SESSION['SESS_ORDERNUM'], -$prix);

        // On met à jour le nombre de d'éléments dans le panier
        $_SESSION['NB_PANIER'] -= $quantity;

        // On réaffiche le panier
        afficherPanier();
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function payement()
{
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();

        // On regarde si l'utilisateur est connecté à son compte
        if (isset($_SESSION['ID']))
            $coordonnees = $undlg->getAdresse($_SESSION['ID']); // Si oui on récupère ses coordonnées 

        // On récupère les détails de sa commande (articles et prix total)
        $products = $undlg->getProductsOrder($_SESSION['SESS_ORDERNUM']);
        $total = $undlg->getTotal($_SESSION['SESS_ORDERNUM']);

        require_once './View/payementView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function commandeOK()
{
    //var_dump($_POST);
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $categories = $undlg->getCategories();

        if (isset($_SESSION['ID'])) { // On regarde si l'utilisateur est connecté à son compte

            if ($_POST['RadioAddSelec'] == 'Other') { // Si l'utilisateur choisi une autre adresse 
                $ajoutAddOK = $undlg->addDeliveryAdresse(
                    $_POST['prenom'],
                    $_POST['nom'],
                    $_POST['add1'],
                    $_POST['add2'],
                    $_POST['ville'],
                    $_POST['postcode'],
                    $_POST['phone'],
                    $_POST['email']
                );

                // Récupération de l'id de son adresse rentré juste avant 
                $IDadd = $undlg->getLastDeliveryId();
                // et on l'ajoute à la commande 
                $updateOk = $undlg->updateOrder($_SESSION['SESS_ORDERNUM'], $_POST['RadioPlaySelec'], $IDadd[0]['MAX(id)']);
            } else {
                // On utilise directement l'adresse que l'utilisateur a renseigné lors de son l'inscription d'où le '0'
                $updateOk = $undlg->updateOrder($_SESSION['SESS_ORDERNUM'], $_POST['RadioPlaySelec'], 0);
            }
        } else { // Si l'utilisateur ne possède pas de compte, il doit rentrer obligatoirement une adresse 
            $ajoutAddOK = $undlg->addDeliveryAdresse(
                $_POST['prenom'],
                $_POST['nom'],
                $_POST['add1'],
                $_POST['add2'],
                $_POST['ville'],
                $_POST['postcode'],
                $_POST['phone'],
                $_POST['email']
            );

            $IDadd = $undlg->getLastDeliveryId();
            $updateOk = $undlg->updateOrder($_SESSION['SESS_ORDERNUM'], $_POST['RadioPlaySelec'], $IDadd[0]['MAX(id)']);
        }

        $_SESSION['MOY_PAY'] = $_POST['RadioPlaySelec'];
        require_once './View/recapOrderView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function facturePDF($id) // Impression PDF de la facture
{
    $undlg = new DialogueBD();
    $order = $undlg->getProductsOrder($id);
    $total = $undlg->getTotal($id);
    require_once './View/factureView.php';
}

function confirmOrder($id)
{
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $updateStatut = $undlg->updateStatut($id);
        listeCommande();
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}


function inscription()
{
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
            if ($log) { // Après la création du compte on renvoie directement à la page de connexion
                $_SESSION['REG'] = true;
                require_once './View/connexionView.php';
            }
        }
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function listeCommande()
{
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        // On récupère les commandes payé 
        $commandes = $undlg->getOrderPaye();

        $adresse = array();
        $details = array();
        foreach ($commandes as $c) {

            if ($c['delivery_add_id'] == 0)
                $adresse[] = $undlg->getAdresse($c['customer_id'])[0];
            else $adresse[] = $undlg->getDeliveryAdd($c['delivery_add_id'])[0];

            $details[] = $undlg->getProductsOrder($c['id']);
        }
        //var_dump($adresse);
        //var_dump($details[0]);

        require_once './View/listeCommandeView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function connexionPage()
{
    $_SESSION['authOK'] = true; // true de base
    require_once './View/connexionView.php';
}

function registerPage()
{
    require_once './View/inscriptionView.php';
}

function connexion()
{
    // Récupération de l'utilisateur
    try {
        session_destroy();
        session_start();
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();

        $admin = $undlg->getAdmin($_POST['login'], $_POST['mdp']);

        // Si l'admin s'est connecté
        if (count($admin) == 1) {

            foreach ($admin as $u) {
                $id = $u['id'];
                $username = $u['username'];
            }

            $_SESSION['ID'] = $id;
            $_SESSION['NAME'] = $username;

            listeCommande();
        } else {
            // On récupère les infos de l'utilisateur
            $user = $undlg->getUtilisateur($_POST['login'], $_POST['mdp']);
            $categories = $undlg->getCategories();

            foreach ($user as $u) {
                $id = $u['customer_id'];
                $username = $u['username'];
            }

            // Si l'utilisteur existe 
            if (isset($id) && isset($username)) {
                $_SESSION['ID'] = $id;
                $_SESSION['NAME'] = $username;

                $order = $undlg->getOrder($_SESSION['ID']);

                if (count($order) != 0) {// Si l'utilisateur à une commande en cours
                
                    // On récupère l'id de la commande
                    $_SESSION['SESS_ORDERNUM'] = $order[0]['id'];

                    $nbProd = $undlg->getNbProduct($_SESSION['SESS_ORDERNUM']);
                    // On récupère les nombre d'éléments de la commande en cours
                    $_SESSION['NB_PANIER'] = $nbProd[0]['SUM(quantity)'];
                }

                require_once './View/listeCategView.php';
            } else { // Si la connexion a echoué on reste sur la page de connexion
                $_SESSION['authOK'] = false;
                require_once './View/connexionView.php';
            }
        }
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

function deconnexion()
{
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // A FAIRE : Régler ce problème : Il faut cliquer 2 fois sur déconnexion pour se déconnecter.
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();

        // Récupération des catégories
        $categories = $undlg->getCategories();

        // l'utilisateur s'est déconnecté on détruit la session
        session_destroy();

        require_once './View/listeCategView.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

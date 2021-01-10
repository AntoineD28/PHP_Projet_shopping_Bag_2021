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

function listCateg() {
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

function acceuil() {
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

function categorie($id) {
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

?>

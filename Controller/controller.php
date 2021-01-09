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
?>

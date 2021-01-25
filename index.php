<?php
require_once('./Controller/controller.php');
session_start();
$_SESSION['SESSION_ID'] = session_id();
var_dump($_SESSION['ID']);
var_dump($_SESSION['NAME']);
var_dump($_SESSION['authOK']);
var_dump($_SESSION['SESS_ORDERNUM']);
var_dump($_SESSION['SESSION_ID']);

//$param = explode('/', $_GET['action']);
if (isset($_GET['action'])) {
    // Choix d'un catégorie
    if (strlen($_GET['action']) == 1) {
        categorie($_GET['action']);
    } 
    // ??
    else if (isset($_GET['id'])) {
        $_GET['action']($_GET['id']);
    } 
    // Retire un article du panier
    else if (isset($_GET['product_id']))
        $_GET['action']($_GET['product_id'], $_GET['price'], $_GET['quantity']);
    else {
        $_GET['action']();
    }
} else {
    accueil();
}

<?php
     session_start();
     $_SESSION['test'] = 'ok';
    require_once('./Controller/controller.php');
    
    //$param = explode('/', $_GET['action']);
    if(isset($_GET['action'])) {
        if(strlen($_GET['action']) == 1){
            categorie($_GET['action']);
        }
        else {
            $_GET['action']();
        }
    }
    else {
        accueil();
    }
?>
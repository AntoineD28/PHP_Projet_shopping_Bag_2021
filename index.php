<?php
     session_start();
     $_SESSION['test'] = 'ok';
    require_once('./Controller/controller.php');
    
    if (isset($_GET['action'])){
        categorie($_GET['action']);
    }
    else {
        acceuil();
    }
?>
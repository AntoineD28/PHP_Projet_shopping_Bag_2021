<?php
require_once('./Controller/controller.php');
session_start();

//$param = explode('/', $_GET['action']);
if (isset($_GET['action'])) {
    if (strlen($_GET['action']) == 1) {
        categorie($_GET['action']);
    } else if (isset($_GET['id'])) {
        $_GET['action']($_GET['id']);
    } else {
        $_GET['action']();
    }
} else {
    accueil();
}

<?php $title = 'Admin commande'; ?>
<?php
ob_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #414141;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./productimages/biscuitNoel.png" alt="" width="60" height="48" class="d-inline-block">
            Teatea Henry
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            echo '<div class="me-2">
                        <button class="btn btn-warning" type="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> 
                        ' . $_SESSION['NAME'] . '
                        </button>
                    </div>
                    <a class="btn btn-dark text-warning " href="index.php?action=deconnexion">Déconnexion</a>        
            ';
            ?>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="text-center"> Liste des commandes</h1>
    <div class="accordion accordion-flush" id="accordionFlushExample">  
        <?php
        $i = 0;
        foreach ($commandes as $c) {
            echo '
            <div class="accordion-item mt-2 text-center">
                <h2 class="accordion-header" id="flush-heading'. $i .'">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'. $i .'" aria-expanded="false" aria-controls="flush-collapse'. $i .'">
                        Commande '. $c['id'] .' : '. $c['total'].' €
                    </button>
                </h2>
                <div id="flush-collapse'. $i .'" class="accordion-collapse collapse" aria-labelledby="flush-heading'. $i .'" data-bs-parent="#accordionFlushExample">
                    <div class="row">
                    <h4 class=text-center">Détails</h4>';
                    foreach ($details[$i] as $d) {
                        echo '<p>'. $d['name'] .' (x'. $d['quantity'] .')</p>';
                    }
                echo '
                    </div>
                    <div class="row">
                        <h4 class=text-center">Adresse de livraison</h4>
                        <p>'. $adresse[$i]['firstname'] .' '. $adresse[$i]['lastname'] .'</p>
                        <p>'. $adresse[$i]['add1'] .' '. $adresse[$i]['add2'] .' '. $adresse[$i]['city'] .' '. $adresse[$i]['postcode'] .'</p>
                        <p>'. $adresse[$i]['phone'] .' '. $adresse[$i]['email'] .'</p>
                    </div>
                    <div class="row">
                        <a class="btn btn-warning col-md-4 offset-md-4" href="index.php?action=confirmOrder&id='. $c['id'] .'" role="button"> Confirmer le payement</a>
                    </div>
                </div>
            </div>                    
                    ';
            $i++;
        }
        ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>
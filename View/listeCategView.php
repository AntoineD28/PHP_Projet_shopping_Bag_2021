<?php $title = 'TeaTea'; ?>
<?php ob_start(); 
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #414141;">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="./productimages/biscuitNoel.png" alt="" width="60" height="48" class="d-inline-block">
            Teatea Henry
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php
                foreach ($categories as $cat) {
                    echo '
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=' . $cat['id'] . '">' . $cat['name'] . '</a>
                        </li>';
                }
                ?>
            </ul>
            <?php
            if (isset($_SESSION['NAME'])) {
                echo '
                    <a class="btn btn-dark text-warning " href="index.php?action=deconnexion">Déconnexion</a> 
                    <div class="me-2">
                        <button class="btn btn-warning" type="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> 
                                ' . $_SESSION['NAME'] . '
                        </button>
                    </div>';
            } else echo '<a class="btn btn-warning me-2" href="index.php?action=connexionPage" role="button"><i class="fas fa-user"></i> Connexion</a>';
            ?>
            <a class="btn btn-dark text-warning" href="index.php?action=afficherPanier" role="button"><i class="fas fa-shopping-cart"></i> Mon Panier (<?php
                                                                                                                                                        if (isset($_SESSION['NB_PANIER']))
                                                                                                                                                            echo $_SESSION['NB_PANIER'];
                                                                                                                                                        else echo '0'
                                                                                                                                                        ?>)</a>
        </div>
    </div>
</nav>



<div class="container">
    <div class="row justify-content-md-center">
        <?php

        foreach ($categories as $c) {
            echo '<div class="card me-3 mt-3 ps-0" style="width: 40rem;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="./productimages/' .  $c['image'] . '"class="card-img-top align-self-center" alt="...">
                            </div>
                            <div class="col-md-8 row align-items-center">
                                <div class="card-body">
                                    <h5 class="card-title text-center">' . $c['name'] . '</h5>
                                     <a class="stretched-link" href="index.php?action=' . $c['id'] . '"> </a>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        ?>

    </div>
</div>

<nav class="nav navbar-dark mt-5" style="background-color: #414141; position:absolute; width: 100%; bottom: 0;">
    <div class="row col-md-12">
        <div class=" row col-md-6 text-white pt-3 align-items-center text-center">
            <p class="">Réalisé par : </p>
            <p class="">Antoine DUMAS</p>
            <p class="">Lény Metzger</p>
        </div>
        <div class="col-md-6 text-white pt-3 text-center">
            <img src="./productimages/Logo_polytech_lyon.png" alt="" width="150px">
        </div>
    </div>
</nav>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>
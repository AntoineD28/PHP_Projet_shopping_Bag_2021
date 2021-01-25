<?php $title = 'Mon panier'; ?>
<?php ob_start(); ?>

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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégories</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        foreach ($categories as $cat) {
                            echo '<li><a class="dropdown-item" href="index.php?action=' . $cat['id'] . '">' . $cat['name'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['NAME']))
                //echo '<a class="btn btn-warning me-2" href="#" role="button"><i class="fas fa-user"></i> '. $_SESSION['NAME'] .'</a>';
                echo '<div class="dropdown me-2">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> 
                        ' . $_SESSION['NAME'] . '
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item" href="index.php?action=deconnexion">Déconnexion</a></li>
                        </ul>
                    </div>';
            else echo '<a class="btn btn-warning me-2" href="View/connexionView.php" role="button"><i class="fas fa-user"></i> Connexion</a>';
            ?>
            <a class="btn btn-dark text-warning" href="index.php?action=afficherPanier" role="button"><i class="fas fa-shopping-cart"></i> Mon Panier</a>
        </div>
    </div>
</nav>

<div class="text-center">
    <?php
    echo "<h1> Mon panier</h1>";
    ?>
</div>

<div class="container">
    <?php
    if (count($products) == 0) {
        echo "<div class=\"text-center\">
                <p> Vous n'avez pas d'article dans votre panier... </p>
              </div>";
    } else {
        foreach ($products as $p) {
            echo '<div class="row justify-content-md-center">
                            <div class="card me-3 mt-3 ps-0" style="width: 40rem;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="./productimages/' .  $p['image'] . '"class="card-img-top align-self-center" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">' . $p['name'] . '</h5>
                                            <p class="card-text">' . $p['description'] . '</p>
                                            <p class="card-text"><small class="text-muted">Quantité : ' . $p['quantity'] . '</small></p>
                                        </div>
                                        <div class="row justify-content-end align-items-end">
                                        <a class="col-1 text-Danger" href="index.php?action=retirerArticle&product_id=' . $p['product_id'] . '&price=' . $p['price'] . '&quantity=' . $p['quantity'] . '"><i class="fas fa-times"></i></a>
                                    </div>
                                    </div>
                                </div>
                            </div>';
        }
        echo '<div class="row justify-content-md-center">
                <a class="btn btn-warning me-3 mt-3 ps-0" style="width: 40rem;" href="index.php?action=payement" role="button"><strong>Payer : '. $total[0]['total'] .' €</strong></a>
            </div>';
    }
    ?>
</div>
</div>
<?php
$content = ob_get_clean();
require_once 'template.php';
?>
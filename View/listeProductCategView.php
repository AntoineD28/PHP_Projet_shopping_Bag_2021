<?php $title = $name[0]['name'];?>
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
            <a class="btn btn-warning me-2" href="#" role="button"><i class="fas fa-user"></i> Connexion</a>

            <a class="btn btn-dark text-warning" href="#" role="button"><i class="fas fa-shopping-cart"></i> Mon Panier</a>
        </div>
    </div>
</nav>

<div class="text-center">
    <?php
    echo "<h1> Nos ". $name[0]['name'] ."</h1>";
    echo $_SESSION['test'];    
    ?>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <?php
        foreach ($products as $p) {
            echo '<div class="card col-md-auto me-2 mb-2" style="width: 30rem;">
                <img src="./productimages/' . $p['image'] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $p['name'] . '</h5>
                    <p class="card-text">' . $p['description'] . '</p>
                    <p class="card-text">' . $p['price'] . ' €</p>
                    <a href="#" class="btn btn-warning">Buy</a>
                </div>
            </div>';
        }
        ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once 'template.php';
?>
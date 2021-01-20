<?php $title = $name[0]['name']; ?>
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
            <a class="btn btn-dark text-warning" href="#" role="button"><i class="fas fa-shopping-cart"></i> Mon Panier</a>
        </div>
    </div>
</nav>

<div class="text-center">
    <?php
    echo "<h1> Nos " . $name[0]['name'] . "</h1>";
    ?>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <?php
        $i = 0;
         foreach ($products as $p) {
            echo '<div class="card col-md-auto me-2 mb-2" style="width: 30rem;">
                <img src="./productimages/' . $p['image'] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $p['name'] . '</h5>
                    <p class="card-text">' . $p['description'] . '</p>
                    <p class="card-text">' . $p['price'] . ' €</p>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#static'.$i.'">
                        Buy
                    </button>
                </div>
            </div>
            <div class="modal fade" id="static'.$i.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="'.$i.'Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="'.$i.'Label">' . $p['name'] . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?action=AjoutPanier&id='.$p['id'].'" method="post">
                                <label for="Quantity"> Veuillez selectionner un quantité : </label>
                                <input type="number" id="Quantity" name="Quantity" min="1" max="100" required>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-dark text-warning" data-bs-dismiss="modal">Annuler</button>
                                <input type="submit" class="btn btn-warning" value="Confirmer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
        $i++;
        }
        ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once 'template.php';
?>
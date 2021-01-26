<?php $title = 'Payement'; ?>
<?php
ob_start();
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

<h1 class="text-center mt-3"> Commande confirmé ! </h1>

<div class="container">
    <p class="text-center"> Votre facture est disponible <a href="index.php?action=facturePDF&id=<?php echo $_SESSION['SESS_ORDERNUM'];?>" target="_blank">ici</a> </p>
</div>


<?php
$_SESSION['SESS_ORDERNUM'] = NULL;
$content = ob_get_clean();
require_once 'template.php';
?>
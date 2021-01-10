<?php $title = 'TeaTea';?>
 <?php ob_start();?>

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

<div class="container">
    <div class="row justify-content-md-center">
        <?php
            foreach ($categories as $c) {
                echo '<div class="card me-3 mt-3 ps-0" style="width: 40rem;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="./productimages/' .  $c['image'] . '"class="card-img-top align-self-center" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">' . $c['name'] . '</h5>
                                     <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                     <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                     <a class="stretched-link" href="index.php?action=' . $c['id'] . '"> </a>
                                </div>
                            </div>
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
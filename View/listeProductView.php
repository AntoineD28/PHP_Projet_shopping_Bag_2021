<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title> Menu principal </title>
    <link href="./Bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0c2bc87b87.js" crossorigin="anonymous"></script>
</head>

<body>
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
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                            foreach($categories as $cat){
                                echo '<li><a class="dropdown-item" href="index.php?action='. $cat['id'] .'">'. $cat['name'] .'</a></li>';
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

    <nav>
        <ul>
            <?php
                foreach($categories as $cat){
                    echo '<li><a href="index.php?action='. $cat['id'] .'">'. $cat['name'] .'</a></li>';
                }
            ?>
        </ul>
    </nav>

    <?php
        foreach($products as $p){
            echo '<div>';
            echo "<p>". $p['name'] ."</p>";
            echo "<p>". $p['description'] ."</p>";
            echo '<img src="./productimages/'. $p['image'] .'"  alt="">';
            echo "<p>". $p['price'] ."</p>";
            echo "</div>"; 
        }
    ?>
    
    <script src="./Bootstrap/js/jquery-3.5.1.js"></script>
    <script src="./Bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
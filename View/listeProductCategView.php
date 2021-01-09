<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title> Menu principal </title>
</head>

<body>
    <div class="header">
        <h1>TeaTea Henry</h1> 
    </div>

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
</body>

</html>
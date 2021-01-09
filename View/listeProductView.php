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
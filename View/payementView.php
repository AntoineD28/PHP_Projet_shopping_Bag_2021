<?php $title = 'Payement'; ?>
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
            <a class="btn btn-dark text-warning" href="index.php?action=afficherPanier" role="button"><i class="fas fa-shopping-cart"></i>Mon Panier (<?php
                                                                                                                                                        if (isset($_SESSION['NB_PANIER']))
                                                                                                                                                            echo $_SESSION['NB_PANIER'];
                                                                                                                                                        else echo '0'
                                                                                                                                                        ?>)</a>
        </div>
    </div>
</nav>


<h1 class="text-center mt-3"> Payement</h1>

<div class="container">

    <?php
    if (isset($_SESSION['ID']))
        echo '<h4 class="text-center mt-5"> Veuillez sélectionner votre adresse de livraison : </h4>';
    else echo '<h4 class="text-center mt-5"> Veuillez rentrer votre adresse de livraison : </h4>';
    ?>
    <form action="index.php?action=commandeOK" method="POST" id="deliveryAdd">
        <?php
        if (isset($_SESSION['ID'])) {
            foreach ($coordonnees as $c) {
                echo '<div class="row justify-content-md-center">
                                <div class="card me-3 mt-3 ps-0" style="width: 40rem;">
                                    <div class="row g-0">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="RadioAddSelec" id="flexRadioDefault1" value="Defaut" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        <h5 class="card-title"> Votre adresse (Actuelle) : </h5>
                                                        <p class="card-text">' . $c['firstname'] . '</p>
                                                        <p class="card-text">' . $c['lastname'] . '</p>
                                                        <p class="card-text">' . $c['add1'] . '</p>
                                                        <p class="card-text">' . $c['add2'] . '</p>
                                                        <p class="card-text">' . $c['city'] . '</p>
                                                        <p class="card-text">' . $c['postcode'] . '</p>
                                                        <p class="card-text">' . $c['phone'] . '</p>
                                                        <p class="card-text">' . $c['email'] . '</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
            }
        }
        ?>
        <div class="row justify-content-md-center">
            <div class="card me-3 mt-3 ps-0" style="width: 40rem;">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="form-check">
                                <?php
                                if (isset($_SESSION['ID'])) {
                                    echo '
                                    <input class="form-check-input" type="radio" name="RadioAddSelec" id="flexRadioDefault2" value="Other">
                                    <label class="col-md-12 form-check-label" for="flexRadioDefault2">
                                        <h5 class="card-title"> Autre adresse : </h5>
                                        <fieldset id="fieldset" form="deliveryAdd" disabled>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputText1" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" name="prenom" id="inputText1" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputText1" class="form-label">Nom </label>
                                                    <input type="text" class="form-control" name="nom" id="inputText2" form="deliveryAdd" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputText3" class="form-label">Adresse 1</label>
                                                    <input type="text" class="form-control" name="add1" id="inputText3" form="deliveryAdd" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputText4" class="form-label">Adresse 2</label>
                                                    <input type="text" class="form-control" name="add2" id="inputText4" form="deliveryAdd">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputText5" class="form-label">Ville</label>
                                                    <input type="text" class="form-control" name="ville" id="inputText5" form="deliveryAdd" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputText6" class="form-label">Code postal</label>
                                                    <input type="text" class="form-control" name="postcode" id="inputText6" form="deliveryAdd" pattern="[0-9]{5,5}" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputTel1" class="form-label">Téléphone</label>
                                                    <input type="tel" class="form-control" name="phone" id="inputTel1" form="deliveryAdd" required
                                                        pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="inputEmail1" form="deliveryAdd" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </label>
                                    ';
                                } else {
                                    echo '
                                        <h5 class="card-title"> Votre adresse : </h5>
                                        <fieldset id="fieldset" form="deliveryAdd">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputText1" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" name="prenom" id="inputText1" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputText1" class="form-label">Nom </label>
                                                    <input type="text" class="form-control" name="nom" id="inputText2" form="deliveryAdd" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputText3" class="form-label">Adresse 1</label>
                                                    <input type="text" class="form-control" name="add1" id="inputText3" form="deliveryAdd" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputText4" class="form-label">Adresse 2</label>
                                                    <input type="text" class="form-control" name="add2" id="inputText4" form="deliveryAdd">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputText5" class="form-label">Ville</label>
                                                    <input type="text" class="form-control" name="ville" id="inputText5" form="deliveryAdd" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputText6" class="form-label">Code postal</label>
                                                    <input type="text" class="form-control" name="postcode" id="inputText6" form="deliveryAdd" pattern="[0-9]{5,5}" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputTel1" class="form-label">Téléphone</label>
                                                    <input type="tel" class="form-control" name="phone" id="inputTel1" form="deliveryAdd" required
                                                        pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="inputEmail1" form="deliveryAdd" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <h4 class="text-center mt-3"> Veuillez sélectionner votre moyen de payement : </h4>
            <div class="card me-3 mt-3 ps-0" style="width: 40rem;">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="col-md-12">
                                <input class="form-check-input" type="radio" name="RadioPlaySelec" id="flexRadioDefault3" value="paypal" checked>
                                <label class="form-check-label" for="flexRadioDefault3">PayPal</label>
                            </div>
                            <div class="col-md-12 mt-3">
                                <input class="form-check-input" type="radio" name="RadioPlaySelec" id="flexRadioDefault4" value="cheque" checked>
                                <label class="form-check-label" for="flexRadioDefault4">Chèque</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <h4 class="text-center mt-3"> Résumé de votre commande : </h4>
            <div class="card me-3 mt-3 ps-0" style="width: 40rem;">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <ul>
                                <?php
                                foreach ($products as $p) {
                                    echo '<li class="card-text">' . $p['name'] . ' x' . $p['quantity'] . '</li>';
                                }
                                ?>
                            </ul>
                            <?php echo '<h3 class="text-center"> Total : ' . $total[0]['total'] . ' €</h3>'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <input type="submit" class="btn btn-warning me-3 mt-3 mb-3 ps-0" style="width: 40rem;" value="Confirmer">
        </div>
    </form>
</div>

<script>
    const radio = document.getElementsByName('RadioAddSelec');
    const form = document.getElementById('fieldset');

    console.log(radio);
    console.log(form);

    // Si on sélectionne "Autre adresse" on active les inputs 
    function modify() {
        if (radio[1].checked)
            form.removeAttribute('disabled');
        else form.setAttribute('disabled', true);
    }

    radio[0].addEventListener("click", modify, false);
    radio[1].addEventListener("click", modify, false);
</script>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>
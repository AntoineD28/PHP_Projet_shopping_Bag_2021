<?php $title = 'Inscription'; ?>
<?php ob_start(); ?>

<h1 class="text-center"> Inscription </h1>

<form class="container" action="index.php?action=inscription" method="post">
    <div class="row mb-3">
        <label for="inputForname" class="col-sm-2 col-form-label">Prénom</label>
        <div>
            <input type="text" class="form-control" name="inputForname" id="inputForname" placeholder="Jean" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputSurname" class="col-sm-2 col-form-label">Nom</label>
        <div>
            <input type="text" class="form-control" name="inputSurname" id="inputSurname" placeholder="Dupont" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div>
            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="" required> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputAdd1" class="col-sm-2 col-form-label">Addresse 1</label>
        <div>
            <input type="text" class="form-control" name="inputAdd1" id="inputAdd1" placeholder="" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputAdd2" class="col-sm-2 col-form-label">Adresse 2</label>
        <div>
            <input type="text" class="form-control" name="inputAdd2" id="inputAdd2" placeholder="">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputAdd2" class="col-sm-2 col-form-label">Ville</label>
        <div>
            <input type="text" class="form-control" name="inputAdd3" id="inputAdd3" placeholder="" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPosteCode" class="col-sm-2 col-form-label">Code Postal</label>
        <div>
            <input type="text" class="form-control" name="inputPostCode" id="inputPostCode" placeholder="69000" pattern="[0-9]{5,5}" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPhone" class="col-sm-2 col-form-label">Téléphone</label>
        <div>
            <input type="tel" class="form-control" name="inputPhone" id="inputPhone" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div>
            <input type="password" class="form-control" name="inputPassword" id="inputPassword" required>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-warning col-lg-1 me-2">Sign in</button>
        <a class="btn btn-dark text-warning col-lg-1" href="index.php?action=connexionPage"> Retour </a>
    </div>

</form>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>
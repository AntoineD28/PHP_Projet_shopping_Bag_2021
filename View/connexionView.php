<?php $title = 'Connexion';
?>
<?php ob_start(); ?>

<div class="container">
    <div class="row justify-content-md-center">
        <H2 class="text-center"> Identification </H2>
        <p class="text-center">Merci d'entrer votre username et votre mot de passe pour accéder à votre espace client.</p>
        <form action="index.php?action=connexion" method="post">
            <div class="row mb-3 text-center">
                <label for="champNom" class="col-form-label">Login</label>
                <div>
                    <input class="col-lg-4" type="text" class="form-control" name="login" id="champNom" required>
                </div>
            </div>
            <div class="row mb-3 text-center">
                <label for="champMdp" class="col-form-label">Mot de passe</label>
                <div>
                    <input class="col-lg-4" type="password" class="form-control" name="mdp" id="champMdp" required>
                </div>
            </div>
            <div class="text-center mt-2">
                <input type="submit" class="btn btn-warning" value="Connexion">
            </div>
        </form>
        <?php
        if (!($_SESSION['authOK']))
            echo '<p class="text-center text-danger">Login ou mot de passe incorrect. Veuillez réessayer ...</p>';
        ?>
        <p class="text-center mt-4"> Si vous n'avez pas de compte client vous pouuvez en créer un ici :</p>
        <a class="btn btn-dark text-warning col-lg-4" href="index.php?action=registerPage">Inscription</a>
        <div class="row justify-content-md-center">
            <a class="btn btn-warning col-lg-4 mt-2" href="index.php">Retour acceuil</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$_SESSION['REG'] = NULL;
require_once 'template.php';
?>
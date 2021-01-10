<?php $title = 'Connexion';
if (!isset($_SESSION['authOK'])) session_start();
?>
<?php ob_start(); ?>

<div class="header">
    <h1>Le petit point ...</h1>
</div>
<div class="log">
    <H2> Identification </H2>
    <?php
        if (isset($_SESSION['authOK']))
            echo '<form action="index.php?action=connexion" method="post">';
        else echo '<form action="../index.php?action=connexion" method="post">';
    ?>
        <label for="champNom">Login </label>
        <input type="text" name="login" id="champNom" required />

        <label for="champMdp">Mot de passe </label>
        <input type="password" name="mdp" id="champMdp" required />

        <input type="submit" value="Connexion">
    </form>
    <?php
        if (isset($_SESSION['authOK']))
            echo '<p>Login ou mot de passe incorrect. Veuillez réessayer ...</p>';
    ?>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>
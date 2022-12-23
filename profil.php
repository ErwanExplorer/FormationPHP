<?php
$user = [
    'nom' => 'Doe',
    'prenom' => 'Erwan',
    'age' => 18,
    'email' => ''
];
setcookie('user', serialize($user));
/*
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['user']);
    setcookie('user', '', time() - 10);
}
if (!empty($_COOKIE['user'])) {
   $nom = $_COOKIE['user'];
}
if (!empty($_POST['nom'])) {
   setcookie('user', $_POST['nom']);
   $nom = $_POST['nom'];
}
*/
require 'elements/header.php';
?>

<?php if ($nom): ?>
    <div class="alert alert-success">
        Vous êtes connecté en tant que <?= htmlentities($nom) ?>
        <a href="profil.php?action=deconnecter">Se déconnecter</a>
    </div>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
<?php endif; ?>

<?php require 'elements/footer.php'; ?>
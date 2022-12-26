<?php

$error = null;
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    if ($_POST['pseudo'] === 'Admin' && $_POST['password'] === 'admin') {
        session_start();
        $_SESSION['connecte'] = 1;
        header('location: /dashboard.php');
        exit();
    } else {
        $error = 'Identifiant ou mot de passe incorrect';
    }
}

require  'functions/auth.php';
if (est_connecte()) {
    header('location: /dashboard.php');
    exit();
}

require 'elements/header.php';?>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif ?>

<form action="" method='post'>
    <div class="form-group">
        <input class='form-control' type="text" name='pseudo' placeholder="Nom d'Uitlisateur">
    </div>
    <div class="form-group">
        <input class='form-control' type="password" name='password' placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>


<?php require 'elements/footer.php'?>
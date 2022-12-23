<?php 

$age = null;

if (!empty($_POST['birthay'])) {
    setcookie('birthay', $_POST['birthay']);
    $_COOKIE['birthay'] = $_POST['birthay'];
}

if (!empty($_COOKIE['birthay'])) {
    $birthay = (int)$_COOKIE['birthay'];
    $age = (int)date('Y') - $birthay;
}



require 'elements/header.php';?>

<?php if ($age && $age >= 18): ?>
    <h1>Du contenu réservé aux adultes</h1>
<?php elseif ($age !== null): ?>
    <div class="alert alert-danger">Vous n'avez pas l'age requis pour voir le contenu</div>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="birthay">Section réservée pour les adultes, entrer votre année de naissance :</label>
            <select name="birthay" class="form-control" id="birthay">
                <?php for ($i = 2010; $i > 1919; $i--): ?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
<?php endif;?>


<?php require 'elements/footer.php'; ?>
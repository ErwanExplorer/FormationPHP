<?php
$error = null;
$success = null;
$email = null;
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = "Votre email a bien été enregistré";
        $email = null;
    } else {
        $error = "Votre email n'est pas valide";
    }
}

require 'elements/header.php';
?>

<h1>S'incrire à la newletter</h1>

<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam laudantium eligendi blanditiis earum perspiciatis, ipsa officiis in eos, hic consequatur, temporibus illum vitae corrupti inventore id labore quo modi similique.</p>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="alert alert-success">
        <?=$success?>
    </div>
    <?php endif; ?>

<form action="/newletter.php" method="post" class="form-inline">
    <div class="form-group">
        <input type="email" name="email" placeholder="Entrer votre email" class="form-control" required value="<?= htmlentities($email) ?>">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?php require 'elements/footer.php'; ?>
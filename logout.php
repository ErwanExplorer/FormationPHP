<?php
session_start();
unset($_SESSION['connecte']);
header('location: /login.php');

?>

    <div class="alert alert-danger">
       Vous êtes déconnecté
    </div>
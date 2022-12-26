<?php

function est_connecte() : bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
   return !empty($_SESSION['connecte']);
}

function user_connect ():void {
    if (!est_connecte()) {
        header('location: /login.php');
        exit();
    }
}
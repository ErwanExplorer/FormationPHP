<?php 
session_start();
$title = 'Contact';
$nav = "contact";
require_once 'config.php';
require_once 'function.php';
date_default_timezone_set('Europe/Paris');
//Récuper l'heure d'aujourd'hui $heure
$heure = (int)($_GET['heure'] ?? (int)date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
//Récuper les créneaux d'aujourd'hui $créneaux
$creneaux = CRENEAUX[$jour];
//Récuper l'état d'ouverture du magasin
$ouvert = in_creneaux($heure, $creneaux);
if ($ouvert) {$color = 'green';} else {$color = 'red';}

require 'elements/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Debug</h2>
            <pre>
                <?php var_dump($_SESSION);?>
            </pre>
            <h1 class="mt-5">Nous-Contactez</h1>
            <p class='text-center'>Contactez-nous par mail : contact.pro@Formationphp.org</p>
        </div>
        <div class="col-md-4">
            <h2>Horaire d'ouverture</h2>

            <?php if ($ouvert):?>
            <div class="alert alert-success">
                Le magasin sera ouvert
            </div>
            <?php else: ?>
            <div class="alert alert-danger">
                Le magasin sera fermé
            </div>
            <?php endif; ?>

            <form action="" method='GET'>
                <div class="form-group">
                    <?= select('jour', $jour, JOURS); ?>
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" name='heure' value="<?=$heure?>">
                </div>
                <button class="btn btn-primary" type='submit'>Voir si le magasin est ouvert</button>
            </form>

          
            <ul>
                <?php foreach (JOURS as $k => $jours):?> 
                <li <?php if ($k + 1 === (int)date('N')):?> style="color:<?= $color; ?>"<?php endif ?>>
                    <strong><?= $jours ?></strong>
                     <?= creneaux_html(CRENEAUX[$k]); ?>
                    <?php endforeach; ?>
                </li>
            </ul>
        </div>
    </div>




</div>

<?php require 'elements/footer.php'; ?>
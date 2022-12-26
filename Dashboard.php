<?php 
require  'functions/auth.php';
user_connect();

require  'functions/compteur.php';
$annee  = (int)date('Y');
$annee_selection  = empty($_GET['annee']) ? $annee : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? date('m') :  $_GET['mois'];
if ($annee_selection &&  $mois_selection) {
    $total =  nombre_vues_mois($annee_selection,  $mois_selection);
    $detail =  nombre_vues_detail_mois($annee_selection,  $mois_selection);
} else {
    $total =  nombre_vues();
}

$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03'  =>  'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];

require 'elements/header.php'; ?>





<div class="row">
    <div class="col-md-4">
        <div class="list-group">
                <?php for ($i = 0; $i < 5; $i++): ?>
                <a class="list-group-item <?= $annee - $i  === $annee_selection ? 'active' : '';?>" href="Dashboard.php?annee=<?=$annee - $i?>"><?=$annee - $i?></a>
                <?php if ($annee - $i  === $annee_selection):?>
                        <div class="list-group">
                            <?php foreach ($mois as $numero => $nom):?>
                                <a href="dashboard.php?annee=<? $annee_selection ?>&mois=<?=$numero?>" class="list-group-item <?php $numero === $mois_selection ? 'active' : '' ?>">
                                    <?=$nom?>
                                </a>
                        </div>
                            <?php endforeach?>
        </div>
                <?php endif?>
                <?php endfor ?>
    </div>
    <div class="col-md-8">

        <div class="card mb-4">
            <div class="card-body">
                <strong style="font-size:3em;"><?=$total + 1?></strong><br>
                Visite<?php if ($total +  1 > 1):?>s<?php endif?> total
            </div>
        </div>
        <?php if (!empty($detail)):?>
            <h2>Détails des visites pour le mois</h2>
            <table class='table table-striped'>
                <thead>
                    <th>Jour</th>
                    <th>Mois</th>
                    <th>Années</th>
                    <th>Nombre de visite</th>
                </thead>
                <tbody>
                <?php foreach($detail as $ligne): ?>
                    <tr>
                        <td><?=$ligne['jour']?></td>
                        <td><?=$ligne['mois']?></td>
                        <td><?=$ligne['annee']?></td>
                        <td><?=$ligne['visites']?> visite<?= $ligne['visites'] > 1 ? 's' :  ''?></td>
                    </tr>
                <?php endforeach?>
                </tbody>
            </table>
        <?php endif ?>

    </div>
</div>
<?php require 'elements/footer.php'; ?>
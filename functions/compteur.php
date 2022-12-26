<?php
function ajouter_vue() {
    //vérifier si le ficher compteur éxiste
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    acremmenter_compteur($fichier);
    acremmenter_compteur($fichier_journalier);
}

function acremmenter_compteur (string $fichier): void {
    if (file_exists($fichier)) {
        //incrémenter le compteur
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
        file_put_contents($fichier, $compteur);
    } else {
        //créer le fichier compteur
        file_put_contents($fichier, '1');
    }
}

function nombre_vues(): string {
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_exists($fichier) ? file_get_contents($fichier) : 0;
}

function nombre_vues_mois(int $year, int $mois):int  {
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $year . '-' . $mois . '-*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach ($fichiers as $fichier) {
        $total += (int)file_get_contents($fichier);
    }
    return $total;
}

function nombre_vues_detail_mois(int $year, int $mois): array{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $year . '-' . $mois . '-*';
    $fichiers = glob($fichier);
    $visites = [];
    foreach ($fichiers as $fichier) {
        $parties  = explode('-', basename($fichier));
        $visites[] = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'visites'  =>  file_get_contents($fichier)     
        ];
    }
    return $visites;
}
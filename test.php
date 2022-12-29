<?php
/*
$date = '2023-01-01';
$date2 = '2019-05-01';

$d = new DateTime($date);
$d2 = new DateTime($date2);

$interval = $d->diff($d2, true);
echo $interval->format('%y ans, %m mois, %d jours');
*/
$date = new DateTime('2023-01-01');
$interval = new DateInterval('P1M1DT1M');
$date->add($interval);
var_dump($date);
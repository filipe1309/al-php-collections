<?php

require_once 'Album.php';
require_once 'Musica.php';

$albuns = new SplObjectStorage();

$divide = new Album('Divide');

$albuns->attach($divide);

$scorpion = new Album('Scorpion');

$albuns->attach($scorpion);
$albuns->attach($scorpion);

var_dump($albuns);

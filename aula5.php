<?php

require_once 'Album.php';
require_once 'Musica.php';

$albuns = new SplObjectStorage();

$divide = new Album('Divide');

$albuns->attach($divide);

$scorpion = new Album('Scorpion');

$albuns->attach($scorpion);
$albuns->attach($scorpion);

$musicasDivide = new SplFixedArray(2);
$musicasDivide[0] = new Musica('musicasDivide 1');
$musicasDivide[1] = new Musica('musicasDivide 2');

$musicasScorpion = new SplFixedArray(3);
$musicasScorpion[0] = new Musica('musicasScorpion 1');
$musicasScorpion[1] = new Musica('musicasScorpion 2');
$musicasScorpion[2] = new Musica('musicasScorpion 3');

$albuns[$divide] = $musicasDivide;
$albuns[$scorpion] = $musicasScorpion;

foreach ($albuns as $album) {
  echo "Album: " . $album->getNome() . PHP_EOL;

  foreach ($albuns[$album] as $musica) {
    echo "Musica: " . $musica->getNome() . PHP_EOL;
  }

  echo PHP_EOL;
}

<?php

require_once 'TocadorDeMusica.php';

$musicas = new SplFixedArray(2);

$musicas[0] = 'One Dance';
$musicas[1] = 'Closer';

$musicas->setSize(4);

$musicas[2] = 'Rockstar';
$musicas[3] = 'Love Yourself';

echo $musicas->getSize() . PHP_EOL;

$tocador = new TocadorDeMusica();
$tocador->adicionarMusicas($musicas);
$tocador->tocarMusica();

$tocador->adicionarMusica("Havana");

$tocador->avancarMusica();
$tocador->tocarMusica();


$tocador->adicionarMusicaNoComecoDaPlaylist('Havana Comeco');
$tocador->removerMusicaNoComecoDaPlaylist();
$tocador->removerMusicaDoFinalDaPlaylist();

$tocador->exibirMusicas();

$tocador->exibirQuantidadeDeMusicas();

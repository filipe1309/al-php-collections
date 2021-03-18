<?php

class TocadorDeMusica
{
    private $musicas;

    public function __construct()
    {
        $this->musicas = new SplDoublyLinkedList();
        $this->musicas->rewind();
    }

    public function adicionarMusicas(SplFixedArray $musicas)
    {
        for ($musicas->rewind(); $musicas->valid(); $musicas->next()) {
            $this->musicas->push($musicas->current());
        }

        $this->musicas->rewind();
    }

    public function tocarMusica()
    {
        if (!$this->musicas->count()) {
            echo 'Erro, nenhuma musica no tocador';
            return;
        }

        echo 'Tocando musica: ' . $this->musicas->current();
    }
}

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

    public function adicionarMusica($musica)
    {
        $this->musicas->push($musica);
    }

    public function adicionarMusicaNoComecoDaPlaylist($musica)
    {
        $this->musicas->unshift($musica);
    }

    public function removerMusicaNoComecoDaPlaylist()
    {
        $this->musicas->shift();
    }

    public function removerMusicaDoFinalDaPlaylist()
    {
        $this->musicas->pop();
    }

    public function tocarMusica()
    {
        if (!$this->musicas->count()) {
            echo 'Erro, nenhuma musica no tocador' . PHP_EOL;
            return;
        }

        echo 'Tocando musica: ' . $this->musicas->current() . PHP_EOL;
    }

    public function avancarMusica()
    {
        $this->musicas->next();

        if (!$this->musicas->valid()) {
            $this->musicas->rewind();
        }
    }

    public function voltarMusica()
    {
        $this->musicas->prev();

        if (!$this->musicas->valid()) {
            $this->musicas->rewind();
        }
    }

    public function exibirMusicas()
    {
        for ($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()) {
            echo 'Musica: ' . $this->musicas->current() . PHP_EOL;
        }

        $this->musicas->rewind();
    }

    public function exibirQuantidadeDeMusicas()
    {
        echo 'Existe ' . $this->musicas->count() . ' musicas no tocador' . PHP_EOL;
    }
}

<?php

class TocadorDeMusica
{
    private $musicas;
    private $historico;
    private $filaDeDownloads;
    private $ranking;

    public function __construct()
    {
        $this->musicas = new SplDoublyLinkedList();
        $this->musicas->rewind();
        $this->historico = new SplStack(); // LIFO
        $this->filaDeDownloads = new SplQueue(); // FIFO
        $this->ranking = new Ranking();
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

        $this->historico->push($this->musicas->current());
        $this->musicas->current()->tocar();
    }

    public function tocarUltimaMusicaTocada()
    {
        echo 'Tocando musica do histórico: ' . $this->historico->pop() . PHP_EOL;
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

    public function baixarMusicas()
    {
        if (!$this->musicas->count()) {
            echo 'Erro, nenhuma musica no tocador' . PHP_EOL;
            return;
        }

        for ($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()) {
            $this->filaDeDownloads->push($this->musicas->current());
        }

        for ($this->filaDeDownloads->rewind(); $this->filaDeDownloads->valid(); $this->filaDeDownloads->next()) {
            echo 'Baixando: ' . $this->filaDeDownloads->current() . PHP_EOL;
        }

        $this->musicas->rewind();
    }

    public function exibeRanking()
    {
        if (!$this->musicas->count()) {
            echo 'Erro, nenhuma musica no tocador' . PHP_EOL;
            return;
        }

        foreach ($this->musicas as $musica) {
            $this->ranking->insert($musica);
        }


        foreach ($this->ranking as $musica) {
            echo $musica->getNome() . ' - ' . $musica->getVezesTocada() . PHP_EOL;
        }
    }
}

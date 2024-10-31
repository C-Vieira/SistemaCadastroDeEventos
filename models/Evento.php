<?php
class Evento {
    private $nome;
    private $data;
    private $local;
    private $limiteDeInscricao;

    public function __construct($nome, $data, $local, $limiteDeInscricao) {
        $this->nome = $nome;
        $this->data = $data;
        $this->local = $local;
        $this->limiteDeInscricao = $limiteDeInscricao;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getData() {
        return $this->data;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getLimiteDeInscricao() {
        return $this->limiteDeInscricao;
    }
}
?>
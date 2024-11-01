<?php
class Inscricao {
    private $idUsuario;
    private $idEvento;

    public function __construct($idUsuario, $idEvento) {
        $this->idUsuario = $idUsuario;
        $this->idEvento = $idEvento;
    }

    public function getUsuario() {
        return $this->idUsuario;
    }

    public function getEvento() {
        return $this->idEvento;
    }
}
?>
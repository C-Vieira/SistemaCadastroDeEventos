<?php
class Usuario {
    private $nome;
    private $email;
    private $admin;

    public function __construct($nome, $email, $admin = 0) {
        $this->nome = $nome;
        $this->email = $email;
        $this->admin = $admin;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function isAdmin() {
        return $this->admin;
    }
}
?>
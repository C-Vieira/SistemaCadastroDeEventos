<?php
require_once 'models/Inscricao.php';
require_once 'models/InscricaoDAO.php';

class InscricaoController {
    private $model;

  public function __construct() {
    $this->model = new InscricaoDAO();
  }

  public function inserir($inscricao) {
    $this->model->inserirInscricao($inscricao);
  }

  public function excluir($id) {
    $this->model->excluirInscricao($id);
  }

  public function mostarTodasInscricoes(){
    return $this->model->getTodasInscricoes();
  }

  public function inscrever($idUsuario, $idEvento){
    $this->model->inserirInscricao(new Inscricao($idUsuario, $idEvento));
  }
}

?>
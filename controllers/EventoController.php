<?php
require_once 'models/Evento.php';
require_once 'models/EventoDAO.php';

class EventoController {
    private $model;

  public function __construct() {
    $this->model = new EventoDAO();
  }

  public function inserir($evento) {
    $this->model->inserirEvento($evento);
  }

  public function editar($id, $evento) {
    $this->model->editarEvento($id, $evento);
  }

  public function excluir($id) {
    $this->model->excluirEvento($id);
  }

  public function mostarTodosEventos(){
    return $this->model->getTodosEventos();
  }

  public function mostrarDadosEvento($id){
    return $this->model->getEvento($id);
  }
}

?>
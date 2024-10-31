<?php
require_once 'models/Usuario.php';
require_once 'models/UsuarioDAO.php';

class UsuarioController {
    private $model;

  public function __construct() {
    $this->model = new UsuarioDAO();
  }

  public function inserir($usuario) {
    $this->model->inserirUsuario($usuario);
  }

  public function excluir($id) {
    $this->model->excluirUsuario($id);
  }

  public function mostarTodosUsuarios(){
    return $this->model->getTodosUsuarios();
  }

  public function mostrarDadosUsuario($id){
    return $this->model->getUsuario($id);
  }

  public function login($id, $nome, $email){
    $result = $this->model->getUsuario($id);

    if ($result->num_rows > 0) {
      $login = $result->fetch_assoc();
        if($login["id"] == $id && $login["nome"] == $nome && $login["email"] == $email){
          echo "Fazendo Login...";
        }
      } else {
        echo "Usuário não encontrado";
      }
  }
}

?>
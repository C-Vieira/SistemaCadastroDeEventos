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

  public function login($id, $nome, $email, $lembrar){
    session_start();

    if($lembrar) setcookie("lembrar_me", "true", time() + (86400), "/");
    else setcookie("lembrar_me", "true", time() - 3600, "/");

    if(isset ($_COOKIE["lembrar_me"])) header("Location: ?acao=menu");

    $result = $this->model->getUsuario($id);

    if ($result->num_rows > 0) {
      $login = $result->fetch_assoc();
        if($login["id"] == $id && $login["nome"] == $nome && $login["email"] == $email){
          $_SESSION["id_salvo"] = $id;
          $_SESSION["usuario"] = $nome;
          $_SESSION["email_salvo"] = $email;
          
          setcookie("id_salvo", $id, time() + (86400), "/");
          setcookie("usuario_logado", $nome, time() + (86400), "/");
          setcookie("email_salvo", $email, time() + (86400), "/");
          
          // Check if admin
          if($login["admin"] == 1) header("Location: ?acao=menu");
          else header("Location: ?acao=mostrarTodosEventos");
        } else {
          echo "Login Falhou para $nome com email: ". $email ."<br>";
          session_destroy();
        }
    } else {
      echo "Login Falhou para $nome com email: ". $email ."<br>";
      session_destroy();
    }
  }
}

?>
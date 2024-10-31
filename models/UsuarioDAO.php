<?php
class UsuarioDAO{

    public function __construct() { }

    public function inserirUsuario($usuario){
        include_once 'connect.php';
        include_once 'Usuario.php';
    
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $admin = $usuario->isAdmin();
    
        $sql = "INSERT INTO usuarios (nome, email, admin) VALUES ('$nome', '$email', '$admin')";
        if($connection->query($sql) === TRUE){
            echo "<br> Novo Registro Criado com Sucesso!";
        }else{
            echo "Erro: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close();
    }
    
    public function excluirUsuario($id){
        include_once 'connect.php';
        include_once 'Usuario.php';
    
        $sql = "DELETE FROM usuarios WHERE id='$id'";
        if ($connection->query($sql) === TRUE) {
            echo "<br> Registro deletado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close();
    }
    
    public function getTodosUsuarios(){
        include_once 'connect.php';
        include_once 'Usuario.php';
    
        $sql = "SELECT * FROM usuarios";
        $result = $connection->query($sql);
    
        $connection->close();

        return $result;
    }
    
    public function getUsuario($id){
        include_once 'connect.php';
        include_once 'Usuario.php';
    
        $sql = "SELECT * FROM usuarios WHERE id='$id'";
        $result = $connection->query($sql);
    
        $connection->close();

        return $result;
    }
}
?>
<?php
class InscricaoDAO{

    public function __construct() { }

    public function inserirInscricao($inscricao){
        include 'connect.php';
        include_once 'Inscricao.php';
    
        $idUsuario = $inscricao->getUsuario();
        $idEvento = $inscricao->getEvento();
    
        $sql = "INSERT INTO inscricoes (user_id, evento_id) VALUES ('$idUsuario', '$idEvento')";
        if($connection->query($sql) === TRUE){
            echo "<br> Novo Registro Criado com Sucesso! <br>";
        }else{
            echo "Erro: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close();
    }
    
    public function excluirInscricao($id){
        include 'connect.php';
        include_once 'Inscricao.php';
    
        $sql = "DELETE FROM inscricoes WHERE id='$id'";
        if ($connection->query($sql) === TRUE) {
            echo "<br> Registro deletado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close();
    }
    
    public function getTodasInscricoes($idUsuario){
        include_once 'connect.php';
        include_once 'Inscricao.php';
        
        $sql = "SELECT * FROM inscricoes WHERE user_id='$idUsuario'";
        $result = $connection->query($sql);
    
        $connection->close();

        return $result;
    }
    
    public function getInscricao($id){
        include_once 'connect.php';
        include_once 'Inscricao.php';
    
        $sql = "SELECT * FROM inscricoes WHERE id='$id'";
        $result = $connection->query($sql);
    
        $connection->close();

        return $result;
    }
}
?>
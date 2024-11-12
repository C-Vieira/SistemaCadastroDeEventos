<?php
class EventoDAO{

    public function __construct() { }

    public function inserirEvento($evento){
        include_once 'connect.php';
        include_once 'Evento.php';
    
        $nome = $evento->getNome();
        $data = $evento->getData();
        $local = $evento->GetLocal();
        $limiteDeInscricao = $evento->getLimite();
    
        $sql = "INSERT INTO eventos (nome, data, local, limite) VALUES ('$nome', '$data', '$local', '$limiteDeInscricao')";
        if($connection->query($sql) === TRUE){
            echo "<br> Novo Registro Criado com Sucesso!";
        }else{
            echo "Erro: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close();
    }

    function editarEvento($id, $evento){
        include 'connect.php';
        include_once 'Evento.php';
    
        $novoNome = $evento->getNome();
        $novaData = $evento->getData();
        $novoLocal = $evento->getLocal();
        $novoLimite = $evento->getLimite();
        
        // TODO
        $sql = "UPDATE eventos SET nome='$novoNome', data='$novaData', local='$novoLocal', limite='$novoLimite' WHERE id=$id";
        if ($connection->query($sql) === TRUE) {
            echo "<br> Registro atualizado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close();
    }
    
    public function excluirEvento($id){
        include_once 'connect.php';
        include_once 'Evento.php';
    
        $sql = "DELETE FROM eventos WHERE id='$id'";
        if ($connection->query($sql) === TRUE) {
            echo "<br> Registro deletado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $connection->error;
        }
    
        $connection->close();
    }
    
    public function getTodosEventos(){
        include_once 'connect.php';
        include_once 'Evento.php';
    
        $sql = "SELECT * FROM eventos";
        $result = $connection->query($sql);
    
        $connection->close();

        return $result;
    }
    
    public function getEvento($id){
        include 'connect.php';
        include_once 'Evento.php';
    
        $sql = "SELECT * FROM eventos WHERE id='$id'";
        $result = $connection->query($sql);
        
        $connection->close();

        return $result;
    }
}
?>
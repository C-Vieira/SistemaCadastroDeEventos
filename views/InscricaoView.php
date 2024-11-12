<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/EventoController.php';
$eventoController = new EventoController();

require_once 'controllers/InscricaoController.php';
$inscricaoController = new InscricaoController();

if (isset($_COOKIE["id_salvo"])) $idUsuario = $_COOKIE["id_salvo"];

if(isset($_GET['id'])){
    // Get evento
    $result = $eventoController->mostrarDadosEvento($_GET['id']);
    $evento = mysqli_fetch_array($result);

    if($evento["limite"] < 1){
        echo "Limite de Inscrições Atingido <br>";
    }else{
        $eventoController->editar($_GET['id'], new Evento(
            $evento["nome"],
            $evento["data"],
            $evento["local"],
            ($evento["limite"] - 1)
        ));
        $inscricaoController->inscrever($idUsuario, $_GET['id']);
    }
}else{
    $result = $inscricaoController->mostarTodasInscricoes($idUsuario);

    if ($result->num_rows > 0) {
        
        echo "<br>
            <table border='2px'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Local</th>
                    <th>Limite</th>
                </tr>";

        while($rowInsc = mysqli_fetch_array($result)){
            $evento = $eventoController->mostrarDadosEvento($rowInsc["evento_id"]);
            
            // TESTES
            /*echo "ID Inscricao é: " . $rowInsc["id"] . " ";

            if ($evento->num_rows > 0) echo "Pelo menos um item";
            else echo "Vazio...";*/

            while($row = mysqli_fetch_array($evento)){
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["data"]; ?></td>
                        <td><?php echo $row["local"]; ?></td>
                        <td><?php echo $row["limite"]; ?></td>
        
                        <td><a href="?acao=desinscrever&inscId=<?php echo $rowInsc["id"]; ?>&eventoId=<?php echo $row["id"]; ?>" >Cancelar Inscrição</a></td>
                    </tr>
                <?php
            }
        }
        echo "</table>";

    } else {
        echo "0 resultados";
    }

    //echo "<br><a href='?acao=menu'> Voltar ao menu </a>";
}

?>
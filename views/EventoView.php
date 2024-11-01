<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/EventoController.php';
require_once 'controllers/InscricaoController.php';

$inscricaoController = new InscricaoController();
if (isset($_COOKIE["id_salvo"])) $idUsuario = $_COOKIE["id_salvo"];

$eventoController = new EventoController();
$result = $eventoController->mostarTodosEventos();

$eventos = array();

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){
        array_push($eventos, $row["id"]);
    }

    $i = -1;
    echo "<br>
        <table border='2px'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Local</th>
                <th>Limite de Inscr.</th>
            </tr>";

    foreach($result as $result){
        echo "<tr>";
        foreach(array_values($result) as $value){
            echo "<td> $value </td>";
        }
        $i++;
        // TODO = Selecionar id evento e inserir
        echo "<td> <button onclick=location.href='?acao=inscrever&id_usuario=$idUsuario&id_evento=1'> Inscrever </button> </td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<br>Clique <a href='?acao=sair'> aqui </a> para sair.";

} else {
    echo "0 resultados";
}

// Teste
function inscrever($idUsuario, $idEvento){
    $inscricaoController->inscrever($idUsuario, $idEvento);
}

?>
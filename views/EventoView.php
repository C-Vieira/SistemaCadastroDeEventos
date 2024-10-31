<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/EventoController.php';
$controller = new EventoController();
$result = $controller->mostarTodosEventos();

if ($result->num_rows > 0) {
    
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
        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "0 resultados";
}

?>
<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/InscricaoController.php';
$controller = new InscricaoController();
$result = $controller->mostarTodasInscricoes();

if ($result->num_rows > 0) {
    
    echo "<br>
        <table border='2px'>
            <tr>
                <th>ID</th>
                <th>ID Usuario</th>
                <th>ID Evento</th>
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
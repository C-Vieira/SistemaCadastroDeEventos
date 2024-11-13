<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/EventoController.php';

$eventoController = new EventoController();
$result = $eventoController->mostarTodosEventos();

echo "<h2>Eventos</h2>";

if ($result->num_rows > 0) {

    echo "
        <table border='2px'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Local</th>
                <th>Limite de Inscr.</th>
            </tr>";

    while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["nome"]; ?></td>
                <td><?php echo $row["data"]; ?></td>
                <td><?php echo $row["local"]; ?></td>
                <td><?php echo $row["limite"]; ?></td>

                <td><a href="?acao=inscrever&id=<?php echo $row["id"]; ?>" >Inscrever</a></td>
            </tr>
        <?php
    }

    echo "</table>";

    echo "<br><a href='?acao=inscrever'> Ver Inscrições </a><br>";
    echo "<br>Clique <a href='?acao=sair'> aqui </a> para sair.";

} else {
    echo "0 resultados";
}

?>
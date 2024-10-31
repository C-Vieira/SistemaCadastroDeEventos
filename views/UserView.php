<?php
require_once 'controllers/UsuarioController.php';
$controller = new UsuarioController();
$result = $controller->mostarTodosUsuarios();

if ($result->num_rows > 0) {
    
    echo "<br>
        <table border='2px'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Admin</th>
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
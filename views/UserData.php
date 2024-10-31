<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuário</title>
</head>
<body>
<h2>Mostrar Usuário</h2>
    <form action="" method="post">
        Id: <input type="text" name="id" /><br />
        <input type="submit" value="Mostrar Usuário" />
      </form>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/UsuarioController.php';
$controller = new UsuarioController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'models/Usuario.php';

    $id = filter_var($_POST['id']);
    
    $erros = array();
  
    if (empty($id)) {
        $erros[] = "Campo \"Id\" é obrigatório.";
    }

    if (empty($erros)) {
       $result = $controller->mostrarDadosUsuario($id);

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

    } else {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
    }  
}
?>
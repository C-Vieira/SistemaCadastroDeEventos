<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
</head>
<body>
<h2>Editar Evento</h2>
    <form action="" method="post">
        Id: <input type="text" name="id" /><br />
        Nome: <input type="text" name="nome" /><br />
        Data: <input type="text" name="data" /><br />
        Local: <input type="text" name="local" /><br />
        Limite: <input type="text" name="limite" /><br />
        <input type="submit" value="Editar Evento" />
      </form>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/EventoController.php';
$controller = new EventoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'models/Evento.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $local = $_POST['local'];
    $limite = $_POST['limite'];
    
    $erros = array();
  
    if (empty($id)) {
        $erros[] = "Campo \"Id\" é obrigatório.";
    }
    else if (empty($nome)) {
        $erros[] = "Campo \"Nome\" é obrigatório.";
    }
    if (empty($data)) {
        $erros[] = "Campo \"Data\" é obrigatório.";
    }
    if (empty($local)) {
        $erros[] = "Campo \"Local\" é obrigatório.";
    }
    if (empty($limite)) {
        $erros[] = "Campo \"Limite\" é obrigatório.";
    }

    if (empty($erros)) {
       $result = $controller->editar($id, new Evento($nome, $data, $local, $limite));
    } else {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
    }
}
?>
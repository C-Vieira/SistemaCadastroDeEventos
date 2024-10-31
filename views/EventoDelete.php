<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Evento</title>
</head>
<body>
<h2>Remover Evento</h2>
    <form action="" method="post">
        Id: <input type="text" name="id" /><br />
        <input type="submit" value="Remover Evento" />
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

    $id = filter_var($_POST['id']);
    
    $erros = array();
  
    if (empty($id)) {
        $erros[] = "Campo \"Id\" é obrigatório.";
    }

    if (empty($erros)) {
       $controller->excluir($id);
    } else {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
    }
}
?>
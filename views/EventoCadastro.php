<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Evento</title>
</head>
<body>
<h2>Cadastrar Evento</h2>
    <form action="" method="post">
        Nome: <input type="text" name="nome" /><br />
        Data: <input type="text" name="data" /><br />
        Local: <input type="text" name="local" /><br />
        Limite: <input type="text" name="limite" /><br />
        <input type="submit" value="Cadastrar Evento" />
      </form>
</body>
</html>

<?php
require_once 'controllers/EventoController.php';
$controller = new EventoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'models/Evento.php';

    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $local = $_POST['local'];
    $limite = $_POST['limite'];
    
    $erros = array();
  
    if (empty($nome)) {
        $erros[] = "Campo \"Nome\" é obrigatório.";
    }
    else if (empty($data)) {
        $erros[] = "Campo \"Data\" é obrigatório.";
    }
    else if (empty($local)) {
        $erros[] = "Campo \"Local\" é obrigatório.";
    }
    else if (empty($limite)) {
        $erros[] = "Campo \"Limite\" é obrigatório.";
    }

    if (empty($erros)) {
       $controller->inserir(new Evento($nome, $data, $local, $limite));
    } else {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
    }  
}
?>
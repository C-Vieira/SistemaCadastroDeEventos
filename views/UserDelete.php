<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Usuário</title>
</head>
<body>
<h2>Remover Usuário</h2>
    <form action="" method="post">
        Id: <input type="text" name="id" /><br />
        <input type="submit" value="Remover Usuário" />
      </form>
</body>
</html>

<?php
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
       $controller->excluir($id);
    } else {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
    }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
    <form action="" method="post">
        Id:    <input type="text" name="id" /><br />
        Nome:  <input type="text" name="nome" /><br />
        Email: <input type="text" name="email" /><br />
        <input type="submit" value="Login" />
      </form>
</body>
</html>

<?php

require_once 'controllers/UsuarioController.php';
$controller = new UsuarioController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'models/Usuario.php';

    $id = filter_var($_POST['id']);
    $nome = filter_var($_POST['nome']);
    $email = filter_var($_POST['email']);
    
    $erros = array();
  
    if (empty($id)) {
        $erros[] = "Campo \"Id\" é obrigatório.";
    }else if (empty($nome)) {
        $erros[] = "Campo \"Nome\" é obrigatório.";
    }else if (empty($email)) {
        $erros[] = "Campo \"Email\" é obrigatório.";
    }

    if (empty($erros)) {
       $controller->login($id, $nome, $email);
    }
}

echo "<br><a href=?acao=cadastrar> Criar Conta </a><br>";
?>
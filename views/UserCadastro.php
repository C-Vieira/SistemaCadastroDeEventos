<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
</head>
<body>
<h2>Cadastrar Usuário</h2>
    <form action="" method="post">
        Nome: <input type="text" name="nome" /><br />
        Email: <input type="text" name="email" /><br />
        Organizador: <input type='checkbox' name='admin'>
        <input type="submit" value="Cadastrar Usuário" />
      </form>
</body>
</html>

<?php
require_once 'controllers/UsuarioController.php';
$controller = new UsuarioController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'models/Usuario.php';

    $nome = filter_var($_POST['nome']);
    $email = filter_var($_POST['email']);
    $admin = $_POST['admin'] ?? 0;

    if($admin == 'on') $admin = 1;
    
    $erros = array();
  
    if (empty($nome)) {
        $erros[] = "Campo \"Nome\" é obrigatório.";
    }
    else if (empty($email)) {
        $erros[] = "Campo \"Email\" é obrigatório.";
    }

    if (empty($erros)) {
       $controller->inserir(new Usuario($nome, $email, $admin));
    } else {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
    }  
}
?>
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
        <?php
            if(isset ($_COOKIE["lembrar_me"])){
                $id = $_COOKIE["id_salvo"];
                $user = $_COOKIE["usuario_logado"];
                $email = $_COOKIE["email_salvo"];

                echo "Id: <input type='text' name='id' value='$id'><br>
                Usuário: <input type='text' name='nome' value='$user'><br>
                Email: <input type='password' name='email' value='$email'><br>
                <input type='submit' value='Login'>
                Lembrar-me<input type='checkbox' name='lembrar' checked=true>";
            }
            else{
                if(isset ($_COOKIE["id_salvo"])) setcookie("id_salvo", "true", time() - 3600, "/");
                if(isset ($_COOKIE["usuario_logado"])) setcookie("usuario_logado", "true", time() - 3600, "/");
                if(isset ($_COOKIE["email_salvo"])) setcookie("email_salvo", "true", time() - 3600, "/");

                echo "Id: <input type='text' name='id'><br>
                Usuário: <input type='text' name='nome'><br>
                Email: <input type='text' name='email'><br>
                <input type='submit' value='Login'>
                Lembrar-me<input type='checkbox' name='lembrar'>";
            }
        ?>
    </form>
</body>
</html>

<?php

require_once 'controllers/UsuarioController.php';
$controller = new UsuarioController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'models/Usuario.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $lembrar = $_POST['lembrar'] ?? 0;
    
    $erros = array();
  
    if (empty($id)) {
        $erros[] = "Campo \"Id\" é obrigatório.";
    }else if (empty($nome)) {
        $erros[] = "Campo \"Nome\" é obrigatório.";
    }else if (empty($email)) {
        $erros[] = "Campo \"Email\" é obrigatório.";
    }

    if (empty($erros)) {
       $controller->login($id, $nome, $email, $lembrar);
    }else{
        foreach ($erros as $erro) {
            echo "<br>" . $erro . "<br>";
        }
    }
}

echo "<br><a href=?acao=cadastrar> Criar Conta </a><br>";
?>
<?php
session_start();
if (isset($_SESSION["usuario"])){
    if (!isset ($_COOKIE["lembrar_me"])){
        setcookie("id_salvo", $_COOKIE["id_salvo"], time() - 3600, "/");
        setcookie("usuario_logado", $_COOKIE["usuario_logado"], time() - 3600, "/");
        setcookie("email_salvo", $_COOKIE["email_salvo"], time() - 3600, "/");
    }

    session_unset();
    session_destroy();
}
else header("Location: ?acao=login");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2">
    <title>Logout</title>
</head>
<body>
    <?php 
        echo "Sessão Finalizada";
    ?>
<hr>

</body>
</html>
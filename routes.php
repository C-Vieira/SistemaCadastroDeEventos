<?php

if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
        case 'login':
            include 'views/UserLogin.php';
            break;
        case 'cadastrar':
            include 'views/userCadastro.php';
            break;
        case 'excluir':
            include "views/UserDelete.php";
            break;
        case 'mostrar':
            include 'views/userData.php';
            break;
        case 'mostrarTodos':
            include 'views/userView.php';
            break;
        default:
            echo "Ação não encontrada";
            break;
    }
} else {
   echo "Sem ação selecionada";
   include 'views/UserLogin.php';
}
?>
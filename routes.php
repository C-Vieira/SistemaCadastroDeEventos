<?php

if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
        case 'login':
            include 'views/UserLogin.php';
            break;
        case 'cadastrarUsuario':
            include 'views/userCadastro.php';
            break;
        case 'cadastrarEvento':
            include 'views/EventoCadastro.php';
            break;
        case 'menu':
            include 'views/Menu.php';
            break;
        case 'excluirUsuario':
            include "views/UserDelete.php";
            break;
        case 'excluirEvento':
            include "views/EventoDelete.php";
            break;
        case 'mostrarUsuario':
            include 'views/userData.php';
            break;
        case 'editarEvento':
            include 'views/EventoUpdate.php';
            break;
        case 'mostrarTodosUsuarios':
            include 'views/userView.php';
            break;
        case 'mostrarTodosEventos':
            include 'views/EventoView.php';
            break;
        case 'sair':
            include 'views/UserLogout.php';
            break;
        case 'inscrever':
            include 'views/InscricaoView.php';
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
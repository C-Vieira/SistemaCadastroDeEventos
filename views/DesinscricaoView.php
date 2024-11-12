<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/EventoController.php';
$eventoController = new EventoController();

require_once 'controllers/InscricaoController.php';
$inscricaoController = new InscricaoController();

if(isset($_GET['inscId'])){
    if(isset($_GET['eventoId'])){
        // Get evento
        $result = $eventoController->mostrarDadosEvento($_GET['eventoId']);
        $evento = mysqli_fetch_array($result);

        $eventoController->editar($_GET['eventoId'], new Evento(
            $evento["nome"],
            $evento["data"],
            $evento["local"],
            ($evento["limite"] + 1)
        ));
    }
    
    $inscricaoController->excluir($_GET['inscId']);
}

?>
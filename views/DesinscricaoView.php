<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ?acao=login");

require_once 'controllers/InscricaoController.php';
$inscricaoController = new InscricaoController();

if(isset($_GET['id'])){
    $inscricaoController->excluir($_GET['id']);
}

?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "eventos";

$connection = new mysqli($servername, $username, $password, $dbName);

if ($connection->connect_error){
    die("Falha na Conexão: " . $connection->connect_error);
}
echo "Conexão Bem Sucedida! <br>";

?>
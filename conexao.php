<?php

$usuario = 'root';
$senha = '';
$database = 'trabalhofinal';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    die("Falha de conexão com o banco de dados: " . $mysqli->connect_error);
}

?>


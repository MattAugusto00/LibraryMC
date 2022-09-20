<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\UsuarioDAO.php';

$nomeUsuario = $_POST['nomeUsuario'];
$senha = $_POST['senha'];

$conn = new Connection();

$conn = $conn->getConnection();

$usuarioDAO = new UsuarioDAO();

$usuarioDAO->login($nomeUsuario, $senha, $conn);

?>
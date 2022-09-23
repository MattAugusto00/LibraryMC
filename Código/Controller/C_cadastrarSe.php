<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Usuario.php';
include_once '..\Persistence\UsuarioDAO.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$dataNasc = $_POST['dataNasc'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

$conexao = new Connection();
$conn = $conexao->getConnection();

$usuario = new Usuario($nome, $cpf, $endereco, $email, $dataNasc, $senha, $tipo);

$usuarioDAO = new UsuarioDAO();

$usuarioDAO->salvar($usuario, $conn);

?>
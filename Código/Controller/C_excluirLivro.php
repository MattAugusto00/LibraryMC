<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Livro.php';
include_once '..\Persistence\LivroDAO.php';

$id = $_GET['cod'];

$conexao = new Connection();
$conn = $conexao->getConnection();

$livroDAO = new LivroDAO();

$livroDAO->excluir($conn, $id);

?>

<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\EmprestimoDAO.php';

$id = $_GET['cod'];

$conexao = new Connection();
$conn = $conexao->getConnection();

$emprestimoDAO = new EmprestimoDAO();

$emprestimoDAO->excluir($conn, $id);

?>
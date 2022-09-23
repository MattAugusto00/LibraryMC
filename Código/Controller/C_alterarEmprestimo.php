<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Emprestimo.php';
include_once '..\Persistence\EmprestimoDAO.php';

$id = $_POST['id'];
$idLivro = $_POST['idLivro'];
$idEstudante = $_POST['idEstudante'];
$dataInicial = $_POST['dataInicial'];
$dataFinal= $_POST['dataFinal'];


$conexao = new Connection();
$conn = $conexao->getConnection();

$emprestimo = new Emprestimo($idLivro, $idEstudante, $dataInicial, $dataFinal);

$emprestimoDAO = new EmprestimoDAO();

$emprestimoDAO->alterar($conn, $id, $emprestimo);

?>
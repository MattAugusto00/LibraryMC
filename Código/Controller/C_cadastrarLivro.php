<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Livro.php';
include_once '..\Persistence\LivroDAO.php';

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editora = $_POST['editora'];
$ano = $_POST['ano'];
$genero = $_POST['genero'];


$conexao = new Connection();
$conn = $conexao->getConnection();

$livro = new Livro($titulo, $autor, $editora, $ano, $genero);

$livroDAO = new LivroDAO();

$livroDAO->salvar($livro, $conn);

?>

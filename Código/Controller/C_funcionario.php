<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\UsuarioDAO.php';

$id = $_GET['id'];

$conn = new Connection();
$conn = $conn->getConnection();

$usuarioDAO = new UsuarioDAO();

$res = $usuarioDAO->consultar($conn, $id);
$linha = $res->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionario</title>
    <link rel="stylesheet" href="../View/css/funcionario.css">
</head>
<body>
    <header>.</header>
    <div class="moveSecao">
        <section class="secaoLogin">
            <div class="welcome">
                <h1>Bem-vindo, <?= $linha['nome']?> (Funcion�rio)</h1>
            </div>
            <div class="opcoes">
                <div class="linha">
                <a href="C_meusDadosFuncionario.php?id=<?=$id?>"><div><h1>Meus Dados</h1></div></a>
                <a href="../View/html/cadastrarLivro.html"><div><h1>Cadastrar Livro</h1></div></a>
                <a href="C_listarLivrosFuncionario.php"><div><h1>Listar Livros</h1></div></a>
                <a href="../View/html/realizarEmprestimo.html"><div><h1>Realizar Empr�stimo</h1></div></a>
                <a href="../View/html/realizarDevolucao.html"><div><h1>Realizar Devolu��o</h1></div></a>
                <a href="../View/html/gerarRelatorioEmprestimo.html"><div><h1>Gerar relat�rio de Empr�stimo</h1></div></a>
                </div>
            </div>
        </section>
    </div>
    <footer>.</footer>
</body>
</html>

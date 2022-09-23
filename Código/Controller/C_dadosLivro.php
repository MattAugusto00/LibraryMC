<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\LivroDAO.php';

$cod = $_GET['cod'];

$conn = new Connection();
$conn = $conn->getConnection();

$livroDAO = new LivroDAO();

$consulta = $livroDAO->consultaCod($conn, $cod);

$dados = $consulta->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
    <link rel="stylesheet" href="../View/css/alterarLivro.css">
</head>
<body>
    <header>.</header>

<div class="moveSecao">
    <section class="secao">
        <div class="welcome">
        <h1>Página do Funcionário</h1>
            <div class="opcoes">
                <a href=""><div>Meus Dados</div></a>
                <a href="../View/html/cadastrarLivro.html"><div>Cadastrar Livro</div></a>
                <a href="C_listarLivrosFuncionario.php"><div>Listar Livros</div></a>
                <a href="../View/html/realizarEmprestimo.html"><div>Realizar Empréstimo</div></a>
                <a href="../View/html/realizarDevolucao.html"><div>Realizar Devolução</div></a>
                <a href="C_gerarRelatorioEmprestimo.php"><div>Gerar relatório de Empréstimo</div></a>
            </div>
        </div>
        <div class="opcaoEscolhida">
            <h1>Alterar Livro</h1>
            <form class="formulario" method="post" action="C_alterarLivro.php">
                <p>
                    <input id="id" name="id" type="hidden" value="<?= $dados['id']?>" />
                </p>
                <p>
                    <input id="titulo" name="titulo" required="required" type="text" placeholder="Título do livro" value= "<?= $dados['titulo'] ?>" />
                </p>
                <p>
                    <input id="autor" name="autor" required="required" type="text" placeholder="Autor" value="<?= $dados['autor'] ?>" />
                </p>
                <p>
                    <input id="editora" name="editora" required="required" type="text" placeholder="Editora" value="<?= $dados['editora'] ?>" />
                </p>
                <p>
                    <input id="ano" name="ano" required="required" type="text" placeholder="Ano" value="<?= $dados['ano'] ?>" />
                </p>
                <p>
                    <input id="genero" name="genero" required="required" type="text" placeholder="Gênero" value="<?= $dados['genero'] ?>" />
                </p>

                <div class="botoes">
                <p>
                    <input id="alterarLivro" type="submit" value="Alterar Livro" /> 
                </p>
                </div>
            </form>
        </div>
    </section>
</div>


<footer>.</footer>
</body>
</html>
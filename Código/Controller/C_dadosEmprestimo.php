<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\EmprestimoDAO.php';

$cod = $_GET['cod'];

$conn = new Connection();
$conn = $conn->getConnection();

$emprestimoDAO = new EmprestimoDAO();

$consulta = $emprestimoDAO->consultaCod($conn, $cod);

$dados = $consulta->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alterar Emprésmtimo</title>
    <link rel="stylesheet" href="../View/css/realizarEmprestimo.css" />
</head>
<body>
    <header>.</header>

    <div class="moveSecao">
        <section class="secao">
            <div class="welcome">
                <h1>Página do Funcionário</h1>
                <div class="opcoes">
                    <a href="">
                        <div>Meus Dados</div>
                    </a>
                    <a href="../View/html/cadastrarLivro.html">
                        <div>Cadastrar Livro</div>
                    </a>
                    <a href="C_listarLivrosFuncionario.php">
                        <div>Listar Livros</div>
                    </a>
                    <a href="../View/html/realizarEmprestimo.html">
                        <div>Realizar Empréstimo</div>
                    </a>
                    <a href="../View/html/realizarDevolucao.html">
                        <div>Realizar Devolução</div>
                    </a>
                    <a href="C_gerarRelatorioEmprestimo.php">
                        <div>Gerar relatório de Empréstimo</div>
                    </a>
                </div>
            </div>
            <div class="opcaoEscolhida">
                <h1>Alterar Empréstimo</h1>
                <form class="formulario" method="post" action="C_alterarEmprestimo.php">
                    <p>
                        Código do Empréstimo:<br />
                        <input id="idEmprestimo" name="id" type="text" placeholder="Código do empréstimo" value="<?= $dados['id'] ?>" readonly/>
                    </p>
                    <p>
                        Cédigo do Livro:<br />
                        <input id="idLivro" name="idLivro" required="required" type="text" placeholder="ID do livro" value="<?= $dados['id_livro'] ?>" />
                    </p>
                    <p>
                        Cédigo do Estudante:<br />
                        <input id="idEstudante" name="idEstudante" required="required" type="text" placeholder="ID do estudante" value="<?= $dados['id_estudante'] ?>"/>
                    </p>
                    <p>
                        Data do Empréstimo:<br />
                        <input id="
                            datainicial" name="dataInicial" required="required" type="date" placeholder="Data inicial" value="<?= $dados['dataInicial'] ?>"/>
                    </p>
                    <p>
                        Data Limite para Entrega:<br />
                        <input id="
                            datafinal" name="dataFinal" required="required" type="date" placeholder="Data final" value="<?= $dados['dataLimite'] ?>"/>
                    </p>

                    <div class="botoes">
                        <p>
                            <input id="emprestarLivro" type="submit" value="Alterar Dados" />
                        </p>
                    </div>
                </form>
            </div>
        </section>
    </div>


    <footer>.</footer>
</body>
</html>
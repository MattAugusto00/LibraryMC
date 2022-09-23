<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\EmprestimoDAO.php';
include_once '..\Model\Livro.php';
include_once '..\Model\Usuario.php';

$conexao = new Connection();
$conn = $conexao->getConnection();

$EmprestimoDAO = new EmprestimoDAO();

$res = $EmprestimoDAO->consultar($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Livros</title>
    <link rel="stylesheet" href="../View/css/gerarRelatorioEmprestimo.css" />
</head>
<body>
    <header>.</header>

    <div class="moveSecao">
        <section class="secao">
            <div class="welcome">
                <h1>Página do Funcionário</h1>
                <div class="opcoes">
                <a href="C_meusDadosFuncionario.php"><div>Meus Dados</div></a>
                <a href="../View/html/cadastrarLivro.html"><div>Cadastrar Livro</div></a>
                <a href="C_listarLivrosFuncionario.php"><div>Listar Livros</div></a>
                <a href="../View/html/realizarEmprestimo.html"><div>Realizar Empréstimo</div></a>
                <a href="../View/html/realizarDevolucao.html"><div>Realizar Devolução</div></a>
                <a href=""><div>Gerar relatório de Empréstimo</div></a>
                </div>
            </div>
            
            <div class="opcaoEscolhida">
                <h1>Relatório de Empréstimos</h1><br />
                    <table>
                        <tr>
                            <th>Código</th>
                            <th>Estudante</th>
                            <th>Livro</th>
                            <th>Data do Empréstimo</th>
                            <th>Data Limite para Devolução</th>
                        </tr>

                        <?php
                        if ($res->num_rows > 0){
                            while($linha = $res->fetch_assoc()){
                                $cod = $linha['id'];

                                echo "<tr>";
                                echo "<td>".$linha['id']."</td>".
                                "<td>".$linha['nome']."</td>".
                                "<td>".$linha['titulo']."</td>".
                                "<td>".$linha['dataInicial']."</td>".
                                "<td>".$linha['dataLimite']."</td>".
                                "<div class="."botoes".">".
                                "<td><a href="."C_dadosEmprestimo.php?cod=$cod".">"."<img border="."0"." alt="."alterar"." src="."../View/icons/editar.svg"." width="."30"." height="."30"."></a>".
                                "<td><a href="."C_confirmarExclusaoEmprestimo.php?cod=$cod".">"."<img border="."0".""."><img border="."0"." alt="."deletar"." src="."../View/icons/deletar.svg"." width="."30"." height="."30"."></a>".
                                "</div>";
                                echo "</tr>";
                            }
                        }
                        else {
                            echo "<tr><td colspan='10'>Nenhum empréstimo realizado.</td></tr>";
                        }
                        ?>

                    </table>
            </div>
        </section>
    </div>


    <footer>.</footer>
</body>
</html>
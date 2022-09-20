<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\LivroDAO.php';

$conexao = new Connection();
$conn = $conexao->getConnection();


$livroDAO = new LivroDAO();

$res = $livroDAO->consultar($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Livros</title>
    <link rel="stylesheet" href="../View/css/listarLivrosFuncionario.css" />
</head>
<body>
    <header>.</header>

    <div class="moveSecao">
        <section class="secao">
            <div class="welcome">
                <h1>Página do Funcionário</h1>
                <div class="opcoes">
                <a href="../View/html/meusDadosFuncionario.html"><div>Meus Dados</div></a>
                <a href="../View/html/cadastrarLivro.html"><div>Cadastrar Livro</div></a>
                <a href=""><div>Listar Livros</div></a>
                <a href="../View/html/realizarEmprestimo.html"><div>Realizar Empréstimo</div></a>
                <a href="../View/html/realizarDevolucao.html"><div>Realizar Devolução</div></a>
                <a href="../View/html/gerarRelatorioEmprestimo.html"><div>Gerar relatório de Empréstimo</div></a>
                </div>
            </div>
            
            <div class="opcaoEscolhida">
                <h1>Listar Livros</h1><br />
                <div class="tabela">
                    <table>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Ano</th>
                            <th>Gênero</th>
                            <th>Situação</th>
                        </tr>

                        <?php
                        if ($res->num_rows > 0){
                            while($linha = $res->fetch_assoc()){
                                $cod = $linha['id'];
                                $situacao = $linha['situacao'];
                                if ($situacao == 'd'){
                                    $situacao = "Disponível";
                                }
                                else if($situacao == 'e'){
                                    $situacao = "Emprestado";
                                }
                                echo "<tr>";
                                echo "<td>".$linha['id']."</td>".
                                "<td>".$linha['titulo']."</td>".
                                "<td>".$linha['autor']."</td>".
                                "<td>".$linha['editora']."</td>".
                                "<td>".$linha['ano']."</td>".
                                "<td>".$linha['genero']."</td>".
                                "<td>".$situacao."</td>".
                                "<div class="."botoes".">".
                                "<td><a href="."C_dadosLivro.php?cod=$cod".">"."<img border="."0"." alt="."alterar"." src="."../View/icons/editar.svg"." width="."30"." height="."30"."></a>".
                                "<td><a href=".""."><img border="."0"." alt="."listaDeEspera"." src="."../View/icons/lista.svg"." width="."30"." height="."30"."></a>".
                                "<td><a href=".""."><img border="."0"." alt="."alterar"." src="."../View/icons/info.svg"." width="."30"." height="."30"."></a>".
                                "<td><a href="."C_confirmarExclusaoLivro.php?cod=$cod".">"."<img border="."0".""."><img border="."0"." alt="."deletar"." src="."../View/icons/deletar.svg"." width="."30"." height="."30"."></a>".
                                "</div>";
                                echo "</tr>";
                            }
                        }
                        else {
                            echo "<tr><td colspan='10'>Nenhum Livro Cadastrado.</td></tr>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </section>
    </div>


    <footer>.</footer>
</body>
</html>
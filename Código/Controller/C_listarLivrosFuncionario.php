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
    <!--Cabeçalho-->
    <header>.</header>

    <!--Seçao nao tava descendo por motivos que nao sei, logo criei para deixar a seçao no meio da pagina rsrs-->
    <div class="moveSecao">
        <!--Dentro da section terao 2 Divisoes. A primeira para o formulario do Estudante, a segunda para o formulario do Funcionario-->
        <!--Coloquei as 2 divisoes dentro da mesma section para facilitar no alinhamento delas com uso do flexbox no CSS-->
        <section class="secao">
            <!--Primeira divisao(Estudante)-->
            <div class="welcome">
                <!--Titulo da divisao-->
                <h1>Página do Estudante</h1>
                <!--Segunda Divisão(Funcionario)-->
                <div class="opcoes">
                    <a href="1">
                        <div>Meus Dados</div>
                    </a>
                    <a href="">
                        <div>Listar Livros</div>
                    </a>
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
                        </tr>

                        <?php
                        if ($res->num_rows > 0){
                            while($linha = $res->fetch_assoc()){
                                $cod = $linha['id'];
                                echo "<tr>";
                                echo "<td>".$linha['id']."</td>".
                                "<td>".$linha['titulo']."</td>".
                                "<td>".$linha['autor']."</td>".
                                "<td>".$linha['editora']."</td>".
                                "<td>".$linha['ano']."</td>".
                                "<td>".$linha['genero']."</td>".
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
                            echo "Nenhum Livro Cadastrado.";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </section>
    </div>

    <!--Rodapé da pagina-->
    <footer>.</footer>
</body>
</html>

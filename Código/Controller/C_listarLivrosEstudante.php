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
    <link rel="stylesheet" href="../View/css/listarLivrosEstudante.css" />
</head>
<body>
    <header>.</header>

    <div class="moveSecao">
        <section class="secao">
            <div class="welcome">
                <h1>Página do Estudante</h1>
                <div class="opcoes">
                    <a href="C_meusDadosEstudante.php">
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
                            <th>Situação</th>
                        </tr>

                        <?php
                        if ($res->num_rows > 0){
                            while($linha = $res->fetch_assoc()){
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
                                "<td><a href=".""."><img border="."0"." alt="."listaDeEspera"." src="."../View/icons/lista.svg"." width="."30"." height="."30"."></a>".
                                "<td><a href=".""."><img border="."0"." alt="."info"." src="."../View/icons/info.svg"." width="."30"." height="."30"."></a>".
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
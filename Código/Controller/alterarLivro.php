<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\LivroDAO.php';

$cod = $_GET['cod'];

$conn = new Connection();

$livroDAO = new LivroDAO();

$livroDAO->consultaCod($conn, $cod);

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
  <!--Cabe�alho-->
  <header>.</header>

  <!--Se�ao nao tava descendo por motivos que nao sei, logo criei para deixar a se�ao no meio da pagina rsrs-->
  <div class="moveSecao">
    <!--Dentro da section terao 2 Divisoes. A primeira para o formulario do Estudante, a segunda para o formulario do Funcionario-->
    <!--Coloquei as 2 divisoes dentro da mesma section para facilitar no alinhamento delas com uso do flexbox no CSS-->
    <section class="secao">
      <!--Primeira divisao(Estudante)-->
      <div class="welcome">
        <!--Titulo da divisao-->
        <h1>P�gina do Funcion�rio</h1>
        <!--Segunda Divis�o(Funcionario)-->
        <div class="opcoes">
            <a href="1"><div>Meus Dados</div></a>
            <a href="2"><div>Cadastrar Livro</div></a>
            <a href="3"><div>Listar Livros</div></a>
            <a href="4"><div>Realizar Empr�stimo</div></a>
            <a href="5"><div>Realizar Devolu��o</div></a>
            <a href="6"><div>Gerar relat�rio de Empr�stimo</div></a>
        </div>
      </div>
      <div class="opcaoEscolhida">
        <h1>Alterar Livro</h1>
        <form class="formulario" method="post" action="../../Controller/cadastrarLivro.php">
          <p>
            <input id="titulo" name="titulo" required="required" type="text" placeholder="T�tulo do livro"/>
          </p>
          <p>
            <input id="autor" name="autor" required="required" type="text" placeholder="Autor"/>
          </p>
          <p>
            <input id="editora" name="editora" required="required" type="text" placeholder="Editora"/>
          </p>
          <p>
            <input id="ano" name="ano" required="required" type="text" placeholder="Ano"/>
          </p>
          <p>
            <input id="genero" name="genero" required="required" type="text" placeholder="G�nero"/>
          </p>

          <!--Div criada para usar o flex e deixar os botoes alterar e excluir lado a lado-->
          <div class="botoes">
            <p>
              <!--Botao de Altera��o de dados do perfil-->
              <input id="alterarLivro" type="submit" value="Alterar Livro" /> 
            </p>
          </div>
        </form>
      </div>
    </section>
  </div>

  <!--Rodap� da pagina-->
  <footer>.</footer>
</body>
</html>
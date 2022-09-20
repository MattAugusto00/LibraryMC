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
        <h1>Página do Funcionário</h1>
        <!--Segunda Divisão(Funcionario)-->
        <div class="opcoes">
            <a href="1"><div>Meus Dados</div></a>
            <a href="2"><div>Cadastrar Livro</div></a>
            <a href="3"><div>Listar Livros</div></a>
            <a href="4"><div>Realizar Empréstimo</div></a>
            <a href="5"><div>Realizar Devolução</div></a>
            <a href="6"><div>Gerar relatório de Empréstimo</div></a>
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

          <!--Div criada para usar o flex e deixar os botoes alterar e excluir lado a lado-->
          <div class="botoes">
            <p>
              <!--Botao de Alteração de dados do perfil-->
              <input id="alterarLivro" type="submit" value="Alterar Livro" /> 
            </p>
          </div>
        </form>
      </div>
    </section>
  </div>

  <!--Rodapé da pagina-->
  <footer>.</footer>
</body>
</html>

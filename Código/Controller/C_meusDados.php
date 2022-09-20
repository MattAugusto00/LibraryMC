<?php

include_once '..\Persistence\Connection.php';

$conn = new Connection();
$conn = $conn->getConnection();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados Estudante</title>
  <link rel="stylesheet" href="../css/meusDadosEstudante.css">
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
        <h1>P�gina do Estudante</h1>
        <!--Segunda Divis�o(Funcionario)-->
        <div class="opcoes">
            <a href="1"><div>Meus Dados</div></a>
            <a href="3"><div>Listar Livros</div></a>
        </div>
      </div>
      <div class="opcaoEscolhida">
        <h1>Meus Dados</h1>
        <form class="formulario" method="post" action="">
          <p>
            <input id="nomeUsuario" name="nomeUsuario" required="required" type="text" placeholder="Nome de usu�rio"/>
          </p>
          <p>
            <input id="cpf" name="cpf" required="required" type="text" placeholder="CPF"/>
          </p>
          <p>
            <input id="email" name="email" required="required" type="email" placeholder="Email"/>
          </p>
          <p>
            <input id="endereco" name="endereco" required="required" type="text" placeholder="Endere�o completo"/>
          </p>
          <p>
            <input id="senha" name="senha" required="required" type="password" placeholder="Senha de usu�rio"/>
          </p>

          <!--Div criada para usar o flex e deixar os botoes alterar e excluir lado a lado-->
          <div class="botoes">
            <p>
              <!--Botao de Altera��o de dados do perfil-->
              <input id="alterarDados" type="submit" value="Alterar Dados" /> 
            </p>
            <p>
              <!--Botao de Exclus�o de perfil-->
              <input id="excluirPerfil" type="submit" value="Excluir Perfil" /> 
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
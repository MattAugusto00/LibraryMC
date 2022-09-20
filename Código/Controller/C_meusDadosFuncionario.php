<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\UsuarioDAO.php';
include_once '..\Model\Usuario.php';

$id = $_GET['id'];

$conn = new Connection();
$conn = $conn->getConnection();

$usuarioDAO = new UsuarioDAO();

$res = $usuarioDAO->consultar($conn, $id);
$linha = $res->fetch_assoc();

$nome = $linha['nome'];
$cpf = $linha['cpf'];
$endereco = $linha['endereco'];
$email = $linha['email'];
$dataNasc = $linha['dataNasc'];
$tipo = $linha['tipo'];
$senha = $linha['senha'];

$usuario = new Usuario($nome, $cpf, $endereco, $email, $dataNasc, $senha, $tipo);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados Funcionario</title>
  <link rel="stylesheet" href="../View/css/meusDadosFuncionario.css">
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
            <a href=""><div>Meus Dados</div></a>
            <a href="../View/html/cadastrarLivro.html"><div>Cadastrar Livro</div></a>
            <a href="C_listarLivrosFuncionario.php"><div>Listar Livros</div></a>
            <a href="../View/html/realizarEmprestimo.html"><div>Realizar Empréstimo</div></a>
            <a href="../View/html/realizarDevolucao.html"><div>Realizar Devolução</div></a>
            <a href="../View/html/gerarRelatorioEmprestimo.html"><div>Gerar relatório de Empréstimo</div></a>
        </div>
      </div>
      <div class="opcaoEscolhida">
        <h1>Meus Dados</h1>
        <form class="formulario" method="post" action="">
          <p>
            <input id="nomeUsuario" name="nomeUsuario" required="required" type="text" placeholder="Nome de usuário" value="<?= $usuario->getNome(); ?>"/>
          </p>
          <p>
              <input id="cpf" name="cpf" required="required" type="text" placeholder="CPF" value="<?= $usuario->getCpf(); ?>" />
          </p>
          <p>
              <input id="email" name="email" required="required" type="email" placeholder="Email" value="<?= $usuario->getEmail(); ?>" />
          </p>
          <p>
              <input id="endereco" name="endereco" required="required" type="text" placeholder="Endereço completo" value="<?= $usuario->getEnderecoCompleto(); ?>" />
          </p>
          <p>
              <input id="senha" name="senha" required="required" type="password" placeholder="Senha de usuário" value="<?= $usuario->getSenha(); ?>" />
          </p>

          <!--Div criada para usar o flex e deixar os botoes alterar e excluir lado a lado-->
          <div class="botoes">
            <p>
              <!--Botao de Alteração de dados do perfil-->
              <input id="alterarDados" type="submit" value="Alterar Dados" /> 
            </p>
            <p>
              <!--Botao de Exclusão de perfil-->
              <input id="excluirPerfil" type="submit" value="Excluir Perfil" /> 
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
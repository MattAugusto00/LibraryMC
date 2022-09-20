<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\UsuarioDAO.php';

$id = $_GET['id'];

$conn = new Connection();
$conn = $conn->getConnection();

$usuarioDAO = new UsuarioDAO();

$res = $usuarioDAO->consultar($conn, $id);
$linha = $res->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funcionario</title>
  <link rel="stylesheet" href="../View/css/funcionario.css">
</head>
<body>
  <!--Cabeçalho-->
  <header>.</header>

  <!--Seçao nao tava descendo por motivos que nao sei, logo criei para deixar a seçao no meio da pagina rsrs-->
  <div class="moveSecao">
    <!--Dentro da section terao 2 Divisoes. A primeira para o formulario do Estudante, a segunda para o formulario do Funcionario-->
    <!--Coloquei as 2 divisoes dentro da mesma section para facilitar no alinhamento delas com uso do flexbox no CSS-->
    <section class="secaoLogin">
      <!--Primeira divisao(Estudante)-->
      <div class="welcome">
        <!--Titulo da divisao-->
        <h1>Bem-vindo, <?= $linha['nome']?> (Funcionário)</h1>
      </div>
      <!--Segunda Divisão(Funcionario)-->
      <div class="opcoes">
        <div class="linha">
          <a href="C_meusDadosFuncionario.php?id=<?=$id?>"><div><h1>Meus Dados</h1></div></a>
          <a href="../View/html/cadastrarLivro.html"><div><h1>Cadastrar Livro</h1></div></a>
          <a href="C_listarLivrosFuncionario.php"><div><h1>Listar Livros</h1></div></a>
          <a href="../View/html/realizarEmprestimo.html"><div><h1>Realizar Empréstimo</h1></div></a>
          <a href="../View/html/realizarDevolucao.html"><div><h1>Realizar Devolução</h1></div></a>
          <a href="../View/html/gerarRelatorioEmprestimo.html"><div><h1>Gerar relatório de Empréstimo</h1></div></a>
        </div>
      </div>
    </section>
  </div>

  <!--Rodapé da pagina-->
  <footer>.</footer>
</body>
</html>
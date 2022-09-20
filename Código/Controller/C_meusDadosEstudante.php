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
    <title>Dados Estudante</title>
    <link rel="stylesheet" href="../View/css/meusDadosEstudante.css">
</head>
<body>

    <header>.</header>

<div class="moveSecao">
    <section class="secao">
        <div class="welcome">
        
        <h1>Página do Estudante</h1>
        
        <div class="opcoes">
            <a href=""><div>Meus Dados</div></a>
            <a href="C_listarLivrosEstudante.php?id=<?=$id?>"><div>Listar Livros</div></a>
        </div>
        </div>
        <div class="opcaoEscolhida">
        <h1>Meus Dados</h1>
        <form class="formulario" method="post" action="C_alterarEstudante.php?id=<?=$id?>">
            <p>
                Nome:<br />
                <input id="nome" name="nome" required="required" type="text" placeholder="Nome de usuário" value="<?= $usuario->getNome(); ?>" />
            </p>
            <p>
                CPF:<br />
                <input id="cpf" name="cpf" required="required" type="text" placeholder="CPF" value="<?= $usuario->getCpf(); ?>" />
            </p>
            <p>
                Data de Nascimento:<br />
                <input id="dataNasc" name="dataNasc" required="required" type="date" placeholder="Data de Nascimento" value="<?= $usuario->getDataNascimento();?>"/>
            </p>
            <p>
                Email:<br />
                <input id="email" name="email" required="required" type="email" placeholder="Email" value="<?= $usuario->getEmail(); ?>" />
            </p>
            <p>
                Endereço:<br />
                <input id="endereco" name="endereco" required="required" type="text" placeholder="Endere�o completo" value="<?= $usuario->getEnderecoCompleto(); ?>" />
            </p>
            <p>
                Senha:<br />
                <input id="senha" name="senha" required="required" type="password" placeholder="Senha de usu�rio" value="<?= $usuario->getSenha(); ?>" />
            </p>

          
            <div class="botoes">
                <p>
                    <input id="alterarDados" type="submit" value="Alterar Dados" /> 
                </p>
                <p>
                    <input id="excluirPerfil" type="button" value="Excluir Perfil" onclick=""> 
                </p>
            </div>
            </form>
        </div>
    </section>
</div>

<footer>.</footer>
</body>
</html>
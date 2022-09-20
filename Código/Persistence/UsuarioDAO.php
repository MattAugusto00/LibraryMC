<?php

class UsuarioDAO {

    function __construct(){}

    function salvar($usuario, $conn){
        $sql = "INSERT INTO `usuario` (`nome`, `cpf`, `endereco`, `email`, `dataNasc`, `tipo`, `senha`) VALUES ('" .
            $usuario->getNome() . "','" .
            $usuario->getCpf() . "','" .
            $usuario->getEnderecoCompleto() . "','" .
            $usuario->getEmail() . "','" .
            $usuario->getDataNascimento() . "','" .
            $usuario->getTipo() . "','".
            $usuario->getSenha() . "')";


        if ($conn->query($sql) == TRUE){
            if ($usuario->getTipo() == 'f'){
                echo "<script>alert('Funcionário cadastrado com sucesso!');
                      location.href='../View/html/funcionario.html'</script>";
            }
            else if ($usuario->getTipo() == 'e'){
                echo "<script>alert('Estudante cadastrado com sucesso!');
                      location.href='../View/html/estudante.html'</script>";
            }
        }

        else {
            if ($conn->errno == 1062) {
                echo "<script type='text/javascript'>alert('Este usuário já possui cadastro, efetue login!');
                                                     location.href='../View/html/cadastrarSe.html'</script>";
            }
            else{
                echo "<script>alert('Erro no cadastramento!')
                  location.href='../View/html/cadastrarSe.html'</script>";
            }
        }
    }

    function consultar($conn, $id){
        $sql = "SELECT * FROM usuario WHERE id = ".$id;
        $res = $conn->query($sql);
        return $res;
    }

    function alterar($conn, $id, $usuario){
        $sql = "UPDATE `usuario` SET `nome` = '".$usuario->getNome()."',".
                                  "`cpf` = '".$usuario->getCpf()."',".
                                  "`endereco` = '".$usuario->getEnderecoCompleto()."',".
                                  "`email` = '".$usuario->getEmail()."',".
                                  "`dataNasc` = '".$usuario->getDataNascimento()."',".
                                  "`tipo` = '".$usuario->getTipo()."',".
                                  "`senha` = '".$usuario->getSenha()."'".
                                  "WHERE `id` =".$id;

        if ($conn->query($sql) == TRUE){
            echo "<script>alert('Dados alterados com sucesso!!!');
                 location.href='C_meusDadosEstudante.php?id=$id' </script>";
        }

        else {
            echo "<script>alert('Erro na alteração!!!');
                 location.href='C_meusDadosEstudante.php?id=$id' </script>";
        }
    }

    function excluir($conn, $id){
        $sql = "DELETE FROM usuario WHERE `usuario`.`id` = ".$id;

        if ($conn->query($sql) == TRUE){
            echo "<script>alert('Usuario excluído com sucesso!!!');
                 location.href='../../index.html' </script>";
        }
        else {
            echo "<script>alert('Erro na exclusão!!!');
                 location.href='C_meusDadosEstudantes.php' </script>";
        }
    }

    function login($usuario, $senha, $conn){
        $sqlUsuario = "SELECT email FROM usuario WHERE email = '".$usuario."'";
        $sqlSenha = "SELECT senha FROM usuario WHERE senha = '".$senha."'";

        $usuarioBD = $conn->query($sqlUsuario);
        $senhaBD = $conn->query($sqlSenha);

        if (mysqli_num_rows($usuarioBD) >= 1){
            $userBD = $usuarioBD->fetch_assoc();

            if ($usuario == $userBD['email']){

                if (mysqli_num_rows($senhaBD) >= 1){
                    $passwordBD = $senhaBD->fetch_assoc();
                    if($senha == $passwordBD['senha']){
                        $sql = "SELECT id, tipo FROM usuario WHERE email= '".$usuario."'";
                        $res = $conn->query($sql);
                        $linha = $res->fetch_assoc();
                        $id = $linha['id'];
                        if ($linha['tipo'] == 'f'){
                            echo "<script>location.href='../Controller/C_funcionario.php?id=$id'</script>";
                        }
                        else if($linha['tipo'] == 'e'){
                            echo "<script>location.href='../Controller/C_estudante.php?id=$id'</script>";
                        }
                    }
                }
                else {
                    echo "<script>alert('Senha incorreta!')
                          location.href='../../index.html'</script>";
                }
            }
        }
        else {
            echo "<script>alert('Usuário não registrado!')
                  location.href='../../index.html'</script>";
        }

    }
}

?>
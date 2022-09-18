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
            $usuario->getTipo() . "',".
            $usuario->getSenha() . ")";


        if ($conn->query($sql) == TRUE){
            echo "Cliente Salvo";
        }

        else {
            echo "Erro no cadastramento: <br>". $conn->error;
        }
    }
}

?>
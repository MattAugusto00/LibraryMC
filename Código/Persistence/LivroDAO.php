<?php

class LivroDAO {

    function __construct(){}

    function salvar($livro, $conn){
        $sql = "INSERT INTO `livro` (`titulo`, `autor`, `editora`, `ano`, `genero`, `situacao`) VALUES ('" .
            $livro->getTitulo() . "','" .
            $livro->getAutor() . "','" .
            $livro->getEditora() . "','" .
            $livro->getAno() . "','" .
            $livro->getGenero() . "','" .
            $livro->getSituacao() . "')";

        if ($conn->query($sql) == TRUE){
            echo "Livro Salvo";
        }

        else {
            echo "Erro no cadastramento: <br>". $conn->error;
        }
    }

    function consultar($conn){
        $sql = "SELECT id, titulo, autor, editora, ano, genero FROM `livro`";

        $res = $conn->query($sql);
        return $res;
    }

    function consultaCod($conn, $cod){
        $sql = "SELECT * FROM `livro` WHERE `cod` = ";
        echo $sql;
    }

    //function alterar($conn, $cod){
    //    $consulta = "UPDATE `livro` SET `autor` = 'Luiz Andrade' WHERE `livro`.`id` = 2;"
    //}
}

?>
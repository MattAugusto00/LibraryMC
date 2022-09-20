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
            echo "<script>alert('Livro cadastrado com sucesso!!!');
                 location.href='C_listarLivrosFuncionario.php' </script>";
        }

        else {
            echo "<script>alert('Erro no cadastramento!!!');
                 location.href='../View/html/cadastrarLivro.html' </script>";
        }
    }

    function consultar($conn){
        $sql = "SELECT id, titulo, autor, editora, ano, genero, situacao FROM `livro`";

        $res = $conn->query($sql);
        return $res;
    }

    function consultaCod($conn, $cod){
        $sql = "SELECT * FROM `livro` WHERE `id` = ".$cod;

        $res = $conn->query($sql);
        return $res;
    }

    function alterar($conn, $id, $livro){
        $sql = "UPDATE `livro` SET `titulo` = '".$livro->getTitulo()."',".
                                  "`autor` = '".$livro->getAutor()."',".
                                  "`editora` = '".$livro->getEditora()."',".
                                  "`ano` = '".$livro->getAno()."',".
                                  "`genero` = '".$livro->getGenero()."'".
                                  "WHERE `id` =".$id;

        if ($conn->query($sql) == TRUE){
            echo "<script>alert('Dados alterados com sucesso!!!');
                 location.href='C_listarLivrosFuncionario.php' </script>";
        }

        else {
            echo "<script>alert('Erro na alteração!!!');
                 location.href='C_dadosLivro.php' </script>";
        }
    }

    function excluir($conn, $id){
        $sql = "DELETE FROM livro WHERE `livro`.`id` = ".$id;

        if ($conn->query($sql) == TRUE){
            echo "<script>alert('Livro excluído com sucesso!!!');
                 location.href='C_listarLivrosFuncionario.php' </script>";
        }
        else {
            echo "<script>alert('Erro na exclusão!!!');
                 location.href='C_listarLivrosFuncionario.php' </script>";
        }
    }

}

?>
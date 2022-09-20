<?php

class EmprestimoDAO {

    function __construct(){}

    function salvar($emprestimo, $conn){
        $sql = "INSERT INTO `emprestimo` (`id_estudante`, `id_livro`, `dataInicial`, `dataLimite`) VALUES ('" .
            $emprestimo->getIdEstudante() . "','" .
            $emprestimo->getIdLivro() . "','" .
            $emprestimo->getDataInicial() . "','" .
            $emprestimo->getDataFinal() . "')";

        if ($conn->query($sql) == TRUE){

            $estado = "UPDATE `livro` SET `situacao` = 'e' WHERE `livro`.`id` = ". $emprestimo->getIdLivro();

            $conn->query($estado);

            echo "<script>alert('Emprestimo cadastrado com sucesso!!!');
                 location.href='../Controller/C_listarLivrosFuncionario.php' </script>";
        }

        else {
            echo "<script>alert('Erro no cadastramento!!!');
                 location.href='../View/html/realizarEmprestimo.html' </script>";

        }

    }


}

?>
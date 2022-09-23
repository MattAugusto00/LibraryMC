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

            $this->setSituacaoLivro($conn, $emprestimo->getIdLivro(), 'e');

            echo "<script>alert('Emprestimo cadastrado com sucesso!!!');
                 location.href='../Controller/C_gerarRelatorioEmprestimo.php' </script>";
        }

        else {
            if ($conn->errno == 1062) {
                echo "<script type='text/javascript'>alert('Este Livro ja esta emprestado!');
                                                     location.href='../View/html/realizarEmprestimo.html'</script>";
            }
            else if ($conn->errno == 1452) {
                echo "<script type='text/javascript'>alert('Livro ou Estudante inexistente!');
                                                     location.href='C_dadosEmprestimo.php?cod=$id'</script>";
            }
            else{
                echo "<script>alert('Erro no cadastramento!!!');
                     location.href='../View/html/realizarEmprestimo.html' </script>";
            }
        }

    }

    function consultar($conn){
        $sql = "SELECT e.id, u.nome, l.titulo, e.dataInicial, e.dataLimite FROM emprestimo e, usuario u, livro l WHERE e.id_estudante = u.id AND e.id_livro = l.id";

        $res = $conn->query($sql);
        return $res;
    }

    function consultaCod($conn, $cod){
        $sql = "SELECT * FROM `emprestimo` WHERE `id` = ".$cod;

        $res = $conn->query($sql);
        return $res;
    }

    function alterar($conn, $id, $emprestimo){
        $sql = "UPDATE `emprestimo` SET `id_estudante` = '".$emprestimo->getIdEstudante()."',".
                                  "`id_livro` = '".$emprestimo->getIdLivro()."',".
                                  "`dataInicial` = '".$emprestimo->getDataInicial()."',".
                                  "`dataLimite` = '".$emprestimo->getDataFinal()."' ".
                                  "WHERE `id` = ".$id;

        $consulta = "SELECT id_livro FROM emprestimo WHERE id = ". $id;
        $res = $conn->query($consulta);
        $dado = $res->fetch_assoc();
        $idAntigo = $dado['id_livro'];


        if ($conn->query($sql) == TRUE){
            if ($idAntigo != $emprestimo->getIdLivro()){
                $this->setSituacaoLivro($conn, $idAntigo, 'd');
                $this->setSituacaoLivro($conn, $emprestimo->getIdLivro(), 'e');
            }
            echo "<script>alert('Dados alterados com sucesso!!!');
                 location.href='C_gerarRelatorioEmprestimo.php' </script>";
        }

        else {
            if ($conn->errno == 1062) {
                echo "<script type='text/javascript'>alert('Este Livro ja esta emprestado!');
                                                     location.href='C_dadosEmprestimo.php?cod=$id'</script>";
            }
            else if ($conn->errno == 1452) {
                echo "<script type='text/javascript'>alert('Livro ou Estudante inexistente!');
                                                     location.href='C_dadosEmprestimo.php?cod=$id'</script>";
            }
            else{
                echo "<script>alert('Erro na alteração!!!');
                     location.href='C_dadosEmprestimo.php?cod=$id' </script>";
            }
        }
    }

    function excluir($conn, $id){
        $consulta = "SELECT livro.id FROM livro, emprestimo WHERE livro.id = emprestimo.id_livro and emprestimo.id =".$id;
        $res = $conn->query($consulta);
        $res = $res->fetch_assoc();
        $idLivro = $res['id'];

        $sql = "DELETE FROM emprestimo WHERE `emprestimo`.`id` = ".$id;


        if ($conn->query($sql) == TRUE){
            $this->setSituacaoLivro($conn, $idLivro, 'd');
            echo "<script>alert('Registro de emprestimo excluido com sucesso!!!');
                 location.href='C_gerarRelatorioEmprestimo.php' </script>";
        }
        else {
            echo "<script>alert('Erro na exclusao!!!');
                 location.href='C_gerarRelatorioEmprestimo.php' </script>";
        }
    }

    function setSituacaoLivro($conn, $id, $situacao){
        $sql = "UPDATE `livro` SET `situacao` = '". $situacao ."' WHERE `livro`.`id` = ". $id;

        $conn->query($sql);
    }
}

?>
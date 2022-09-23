<?php

class Emprestimo {
    private $idLivro;
    private $idEstudante;
    private $dataInicial;
    private $dataFinal;

    function __construct($idLivro, $idEstudante, $dataInicial, $dataFinal){
        $this->idLivro = $idLivro;
        $this->idEstudante = $idEstudante;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
    }

    function getIdLivro() {
        return $this->idLivro;
    }
    function getIdEstudante() {
        return $this->idEstudante;
    }
    function getDataInicial() {
        return $this->dataInicial;
    }
    function getDataFinal() {
        return $this->dataFinal;
    }

}


?>
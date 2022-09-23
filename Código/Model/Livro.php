<?php

class Livro {
    private $titulo;
    private $autor;
    private $editora;
    private $ano;
    private $genero;
    private $situacao;

    function __construct($titulo, $autor, $editora, $ano, $genero){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->situacao = 'd';
    }

    function getTitulo() {
        return $this->titulo;
    }
    function getAutor() {
        return $this->autor;
    }
    function getEditora() {
        return $this->editora;
    }
    function getAno() {
        return $this->ano;
    }
    function getGenero() {
        return $this->genero;
    }

    function getSituacao() {
        return $this->situacao;
    }
  
}


?>
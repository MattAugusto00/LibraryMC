<?php

class Usuario {
    private $nome;
    private $cpf;
    private $enderecoCompleto;
    private $email;
    private $dataNascimento;
    private $senha;
    private $tipo;

    function __construct($nome, $cpf, $enderecoCompleto, $email, $dataNascimento, $senha, $tipo){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->enderecoCompleto = $enderecoCompleto;
        $this->email = $email;
        $this->dataNascimento = $dataNascimento;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    function getNome() {
        return $this->nome;
    }
    function getCpf() {
        return $this->cpf;
    }
    function getEnderecoCompleto() {
        return $this->enderecoCompleto;
    }
    function getEmail() {
        return $this->email;
    }
    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getSenha() { 
        return $this->senha; 
    }
    function getTipo() {
        return $this->tipo; 
    }
}


?>
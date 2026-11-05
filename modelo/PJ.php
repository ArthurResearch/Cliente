<?php

require_once("Cliente.php");

class PJ extends Cliente {
    private string $razaoSocial;
    private string $cnpj;

    public function getNome(){
        return $this->razaoSocial;
    }
    public function getNumDoc(){
        return $this->cnpj;
    }
    public function getTipo(){
        return "Pessoa Jurídica";
    }

    
}
<?php

require_once("Cliente.php");

class PF extends Cliente {
    private string $nomeCompleto;
    private string $cpf;

    public function getNome(){
        return $this->nomeCompleto;
    }
    public function getNumDoc(){
        return $this->cpf;
    }
    public function getTipo(){
        return "F";
    }

    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto(string $nomeCompleto): self
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }
}
<?php

require_once("modelo/Cliente.php");
require_once("modelo/PF.php");
require_once("modelo/PJ.php");
require_once("dados/Conexao.php");

class ClienteDAO {
    public function inserir(Cliente $cliente){
        $sql = "insert into clientes (tipo, nome_social, email, nome_completo, cpf, razao_social, cnpj)
                values (?, ?, ?, ?, ?, ?, ?)";
        $conexao = Conexao::getConexao();
        $stm =  $conexao->prepare($sql);
        if ($cliente instanceof PF) {
            $stm->execute(array(
            $cliente->getTipo(),
            $cliente->getNomeSocial(),
            $cliente->getEmail(),
            $cliente->getNomeCompleto(),
            $cliente->getCpf(),
            null,
            null
            ));
        } else if ($cliente instanceof PJ) {
            $stm->execute(array(
            $cliente->getTipo(),
            $cliente->getNomeSocial(),
            $cliente->getEmail(),
            null,
            null,
            $cliente->getRazaoSocial(),
            $cliente->getCnpj()
            ));
        }
    }
        
    public function listar(){
        $sql = "select * from clientes";
        $conexao = Conexao::getConexao();
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchAll();
        $clientes = $this->mapear($dados);
        return $clientes;
    }

    private function mapear(array $dados): array {
        $clientes = array();

        foreach($dados as $d) {
            $tipo = $d['tipo'];
            $cliente = null;
            if($tipo == 'F'){
                $cliente = new PF();
                $cliente->setNomeCompleto($d['nome_completo']);
                $cliente->setCpf($d['cpf']);
            } else if ($tipo == 'J'){
                $cliente = new PJ();
                $cliente->setRazaoSocial($d['razao_social']);
                $cliente->setCnpj($d['cnpj']);
            }

            $cliente->setId($d['id']);
            $cliente->setNomeSocial($d['nome_social']);
            $cliente->setEmail($d['email']);

            array_push($clientes, $cliente);
        }
        return $clientes;
    }
}
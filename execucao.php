<?php

require_once("modelo/PF.php");

/*
require_once("dados/Conexao.php");

$objConexao = Conexao::getConexao();
print_r($objConexao);
*/

do {
    echo "Cadastro de Clientes\n";
    echo "1 - Inserir cliente PF\n";

    $opcao = readline("Informe uma opção: ");

    switch($opcao) {
        case 1:
            $PF = new PF();
            $PF->setNomeCompleto(readline("Informe o nome completo: "));
            $PF->setNomeSocial(readline("Informe o nome social: "));
            $PF->setCpf(readline("Informe o seu CPF: "));
            $PF->setEmail(readline("informe o seu E-mail"));
            break;

        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "opcão inválida!\n";
    }
} while($opcao != 0);
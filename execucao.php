<?php

require_once("modelo/PF.php");
require_once("dao/ClienteDAO.php");

$DAO = new ClienteDAO();

/*
require_once("dados/Conexao.php");

$objConexao = Conexao::getConexao();
print_r($objConexao);
*/

do {
    echo "Cadastro de Clientes\n";
    echo "1 - Inserir cliente PF\n";
    echo "2 - Inserir cliente PJ\n";
    echo "3 - Listar\n";
    echo "4 - Buscar\n";
    echo "5 - Excluir\n";
    echo "0 - Sair\n";

    $opcao = readline("Informe uma opção: ");

    switch($opcao) {
        case 1:
            $PF = new PF();
            $PF->setNomeCompleto(readline("Informe o nome completo: "));
            $PF->setNomeSocial(readline("Informe o nome social: "));
            $PF->setCpf(readline("Informe o seu CPF: "));
            $PF->setEmail(readline("informe o seu E-mail: "));
            $DAO->inserir($PF);
            break;

        case 2:
            $PJ = new PJ();
            $PJ->setRazaoSocial(readline("Informe o nome completo: "));
            $PJ->setNomeSocial(readline("Informe o nome social: "));
            $PJ->setCnpj(readline("Informe o seu CPF: "));
            $PJ->setEmail(readline("informe o seu E-mail: "));
            $DAO->inserir($PJ);
            break;

        case 3:
            $clientes = $DAO->listar();
            foreach($clientes as $c) {
                echo $c . "\n";
            }
            break;

        case 0:
            echo "Programa encerrado!\n";
            break;
/*
        default:
            echo "opcão inválida!\n";
            */
    }
} while($opcao != 0);
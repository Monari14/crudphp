<?php

include "pessoasbanco.class.php";
include "conexao.class.php";

// Criação de um objeto (p)
$p = new Pessoas_banco();

// Verifica se o ID da pessoa foi enviado via POST
if(isset($_POST['id_pessoa'])) {
    // Obtém o ID da pessoa do formulário
    $id_pessoa = $_POST['id_pessoa'];

    // Define o ID da pessoa no objeto Pessoas_banco
    $p->setId_pessoa($id_pessoa);

    // Deleta a pessoa
    if ($p->deletarPessoa()) {
        echo "<div class='link'>Pessoa apagada com sucesso!</div> <br>";
    } else {
        echo "<div class='link'>Erro ao apagar pessoa.</div> <br>";
    }
} else {
    echo "ID da pessoa não fornecido.";
}

// Link para o listarPessoas.php
echo "<div class='link'><a href='listarPessoas.php'>TABELA PESSOAS</a></div>";

?>

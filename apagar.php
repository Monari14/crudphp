<?php
include "pessoasbanco.class.php";

// Verifica se o ID da pessoa foi passado pela URL
if(isset($_GET['id'])) {
    // Obtém o ID da pessoa da URL
    $id_pessoa = $_GET['id'];

    // Cria um objeto Pessoas_banco
    $p = new Pessoas_banco();

    // Define o ID da pessoa a ser excluída
    $p->setId_pessoa2($id_pessoa);
    echo "<link rel='stylesheet' href='css/style.css'>";
    // Exclui a pessoa
    if ($p->deletarPessoa()) {
        echo "<div class='link'>Pessoa apagada com sucesso!</div> <br>";
    } else {
        echo "<div class='link'>Erro ao apagar pessoa.</div> <br>";
    }
} else {
    echo "ID da pessoa não fornecido.";
}

// Link para retornar à página anterior
echo "<div class='link'><a href='listarPessoas.php'>TABELA PESSOAS</a>
</div>";
?>

<?php

include "pessoasbanco.class.php";

//criação de um objeto ( p )
$p =  new Pessoas_banco();

//puxagem do html
$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];

//setagem
$p->setNome($nome);
$p->setEmail($email);
$p->setIdade($idade);

echo "<link rel='stylesheet' href='css/style.css'>";

// mensagem de inserção
if ($p->inserirPessoa()) {
    echo "<div class='link'>Pessoa inserida com sucesso!</div> <br>";
} else {
    echo "<div class='link'>Erro ao inserir pessoa.</div> <br>";
}
//link para o listarPessoas.php
echo "
<div class='link'>
<a href='listarPessoas.php'>TABELA PESSOAS</a>
</div>
"

?>

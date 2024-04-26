<?php

include "pessoasbanco.class.php";

//criação de um objeto ( p )
$p =  new Pessoas_banco();

//puxagem do html
$nomeA = $_POST['nomeA'];
$emailA = $_POST['emailA'];
$idadeA = $_POST['idadeA'];
$id = $_POST['id_pessoa'];

//setagem
$p->setNome($nomeA);
$p->setEmail($emailA);
$p->setIdade($idadeA);
$p->setId_pessoa($id);

echo "<link rel='stylesheet' href='css/style.css'>";

// mensagem de inserção
if ($p->update()) {
    echo "<div class='link'>Pessoa atualizada com sucesso!</div> <br>";
} else {
    echo "<div class='link'>Erro ao atualizar pessoa.</div> <br>";
}
//link para o listarPessoas.php
echo "
<div class='link'>
<a href='listarPessoas.php'>TABELA PESSOAS</a>
</div>
"

?>

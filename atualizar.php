<?php
// Verifica se o ID foi passado pela URL
if(isset($_GET['id'])) {
    $id_pessoa = $_GET['id'];
    
    // Inclui o arquivo da classe para acessar o banco de dados
    include "pessoasbanco.class.php";

    // Instancia a classe
    $p = new Pessoas_banco();

    // Obtém os dados da pessoa pelo ID
    $pessoa = $p->getPessoaById($id_pessoa);

    // Verifica se a pessoa existe
    if($pessoa) {
        // Exibe o formulário com os dados preenchidos
        echo "
        <html>
        <head>
        <title>Atualizar Pessoa</title>
        <link rel='stylesheet' href='css/style.css'>
        </head>
        <body>
        <h2>Atualizar Pessoa</h2>
        <form action='salva.php' method='POST'>
            <input type='hidden' name='id_pessoa' value='". $pessoa['id_pessoa'] ."'>
            <label for='nomeA'>Nome:</label><br>
            <input type='text' id='nomeA' name='nomeA' value='". $pessoa['nome'] ."'><br>
            <label for='emailA'>Email:</label><br>
            <input type='email' id='emailA' name='emailA' value='". $pessoa['email'] ."'><br>
            <label for='idadeA'>Idade:</label><br>
            <input type='number' id='idadeA' name='idadeA' value='". $pessoa['idade'] ."'><br>
            <input type='submit' value='Atualizar'>
        </form>
        </body>
        </html>";
    } else {
        echo "Pessoa não encontrada.";
    }
} else {
    echo "ID não foi fornecido.";
}
?>

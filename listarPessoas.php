<?php
include "pessoasbanco.class.php";

$p = new Pessoas_banco();
$pessoas = $p->listaPessoas();

echo "<link rel='stylesheet' href='css/style.css'>";

foreach ($pessoas as $pessoa) {
    echo "
    <table border=1>
    <tbody>
        <tr>
            <td>
                <a href='atualizar.php?id=". $pessoa['id_pessoa'] ."'>". $pessoa['id_pessoa'] ."</a>
            </td>
            <td>". $pessoa['nome'] . "</td>
            <td>". $pessoa['email'] . "</td>
            <td>". $pessoa['idade'] . "</td>
            <td>
                <a href='apagar.php?id=". $pessoa['id_pessoa'] ."'>apagar</a>
            </td>
        </tr>
    </tbody>
    </table>";
}
?>

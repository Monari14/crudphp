<?php

include "conexao.class.php";

class Pessoas_banco {
    private $id_pessoa;
    private $id_pessoa2;
    private $nome;
    private $email;
    private $idade;

    private $nomeA;
    private $emailA;
    private $idadeA;

    function setId_pessoa($id_pessoa) { $this->id_pessoa = $id_pessoa; }
    function getId_pessoa() { return $this->id_pessoa; }
    function setNome($nome) { $this->nome = $nome; }
    function getNome() { return $this->nome; }
    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }
    function setIdade($idade) { $this->idade = $idade; }
    function getIdade() { return $this->idade; }

    function setNomeA($nomeA) { $this->nomeA = $nomeA; }
    function getNomeA() { return $this->nomeA; }
    function setEmailA($emailA) { $this->emailA = $emailA; }
    function getEmailA() { return $this->emailA; }
    function setIdadeA($idadeA) { $this->idadeA = $idadeA; }
    function getIdadeA() { return $this->idadeA; }

    function setId_pessoa2($id_pessoa2) { $this->id_pessoa2 = $id_pessoa2; }
    function getId_pessoa2() { return $this->id_pessoa2; }

    function getPessoaById($id) {
        $database = new Conexao(); //nova instância da conexao
        $db = $database->getConnection(); // tenta conectar

        $sql = "SELECT * FROM pessoa WHERE id_pessoa = :id";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            echo 'Erro ao buscar pessoa por ID: ' . $e->getMessage(); 
            return false;
        }   
    }
    function update(){
        $database = new Conexao(); //nova instância da conexao
        $db = $database->getConnection(); // tenta conectar
        
        // Obtendo os dados atualizados
        $id = $this->getId_pessoa();
        $nome = $this->getNome();
        $email = $this->getEmail();
        $idade = $this->getIdade();
        
        // Preparando a consulta SQL
        $sql = "UPDATE pessoa SET nome=:nome, email=:email, idade=:idade WHERE id_pessoa=:id";
    
        try {
            // Preparando e executando a consulta
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':idade', $idade);
            $stmt->execute();
    
            return true;
    
        } catch(PDOException $e) { 
            echo "Erro ao atualizar pessoa: " . $e->getMessage();
            return false;
        }
    }
    
    function listaPessoas() {
        $database = new Conexao(); //nova instância da conexao
        $db = $database->getConnection(); // tenta conectar

        $sql = "SELECT * FROM pessoa";
        try {
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $e) {
            echo 'Erro ao listar pessoas: ' . $e->getMessage(); 
            return false;
        }   
    }

    function inserirPessoa(){
        $database = new Conexao(); //nova instância da conexao
        $db = $database->getConnection(); // tenta conectar
    
        $sql = "INSERT INTO pessoa (nome, email, idade) VALUES (:nome, :email, :idade)";
        try {
            $nome = $this->getNome();
            $email = $this->getEmail();
            $idade = $this->getIdade();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':idade', $idade);
            $stmt->execute(); // Executa a consulta preparada
            return true;
    
        } catch(PDOException $e) { 
            echo "Erro ao inserir pessoa: " . $e->getMessage();
            return false;
        }
    }

    function alterarPessoa() { 
        $database = new Conexao(); //nova instância da conexao
        $db = $database->getConnection(); // tenta conectar 

        try{
            $sql = "UPDATE pessoa SET nome=:nome, email=:email, idade=:idade WHERE id_pessoa=:id_pessoa";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_pessoa', $this->getId_pessoa());
            $stmt->bindParam(':nome', $this->getNome());
            $stmt->bindParam(':email', $this->getEmail());
            $stmt->bindParam(':idade', $this->getIdade());
            $stmt->execute(); // Executa a consulta preparada
            return true;

        }catch(PDOException $e){
            echo "Erro ao atualizar pessoa: " . $e->getMessage();
            return false;
        }
    }

    function deletarPessoa(){
        // Instância da conexão
        $database = new Conexao(); 
        $db = $database->getConnection(); // Obtém a conexão
    
        try{
            // Prepara a consulta SQL para deletar a pessoa com base no ID
            $sql = "DELETE FROM pessoa WHERE id_pessoa = :id_pessoa";
            $stmt = $db->prepare($sql);
            
            // Obtém o ID da pessoa
            $id_pessoa = $this->getId_pessoa2();
            
            // Vincula o parâmetro :id_pessoa ao valor do ID da pessoa
            $stmt->bindParam(':id_pessoa', $id_pessoa, PDO::PARAM_INT);
            
            // Executa a consulta preparada
            $stmt->execute();
    
            // Retorna true para indicar que a deleção foi realizada com sucesso
            return true;
        
        } catch(PDOException $e){
            // Em caso de erro, imprime a mensagem de erro
            echo "Erro ao deletar pessoa: " . $e->getMessage();
            return false; // Retorna false para indicar falha na deleção
        }
    }
    
    
}
?>

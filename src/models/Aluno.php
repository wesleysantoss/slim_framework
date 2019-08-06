<?php 

namespace App\models;

use App\helper\ConnectionDbFactory;

class Aluno {
    public $id;
    public $nome;
    public $sobrenome;
    public $ra;

    public function __construct($id)
    {
        $pdo = ConnectionDbFactory::getConnection();

        $stmt = $pdo->prepare("SELECT id, nome, sobrenome, ra FROM alunos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $this->id = $resultado['id'];
        $this->nome = $resultado['nome'];
        $this->sobrenome = $resultado['sobrenome'];
        $this->ra = $resultado['ra'];
    }

    public static function criar($nome, $sobrenome, $ra)
    {
        $pdo = ConnectionDbFactory::getConnection();

        $stmt = $pdo->prepare("INSERT INTO alunos (nome, sobrenome, ra) VALUES (:nome, :sobrenome, :ra)");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':sobrenome', $sobrenome);
        $stmt->bindValue(':ra', $ra);
        return $stmt->execute();
    }

    public static function listarTodos()
    {
        $pdo = ConnectionDbFactory::getConnection();

        $stmt = $pdo->prepare("SELECT id, nome, sobrenome, ra FROM alunos");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } 

    public static function excluir($id)
    {
        $pdo = ConnectionDbFactory::getConnection();

        $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
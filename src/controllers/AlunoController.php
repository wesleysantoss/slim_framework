<?php

namespace App\controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\models\Aluno;

class AlunoController {
    public function listarTodos(Request $request, Response $response, $args)
    {
        $listAlunos = Aluno::listarTodos();

        $payload = json_encode($listAlunos);

        $response->getBody()->write($payload);

        return $response->withHeader("Content-Type", "application/json");
    }

    public function criar(Request $request, Response $response, $args)
    {
        $body = $request->getParsedBody();
        $nome = $body['nome'];
        $sobrenome = $body['sobrenome'];
        $ra = $body['ra'];

        $status = Aluno::criar($nome, $sobrenome, $ra);

        $payload = json_encode(array(
            "status" => $status
        ));

        $response->getBody()->write($payload);

        return $response->withHeader("Content-Type", "application/json");
    }

    public function listar(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $cliente = new Aluno($id);

        $payload = json_encode(array(
            "id" => $cliente->id,
            "nome" => $cliente->nome,
            "sobrenome" => $cliente->sobrenome,
            "ra" => $cliente->ra
        ));

        $response->getBody()->write($payload);

        return $response->withHeader("Content-Type", "application/json");
    }

    public function excluir(Request $request, Response $response, $args)
    {
        $id = $args['id'];

        $status = Aluno::excluir($id);

        $payload = json_encode(array(
            "status" => $status
        ));

        $response->getBody()->write($payload);

        return $response->withHeader("Content-Type", "application/json");
    }
}
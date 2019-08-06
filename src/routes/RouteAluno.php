<?php

use Slim\App;
use App\controllers\AlunoController;

return function (App $app) {
    /**
     * @OA\Get(
     *     path="/slim_mobile/alunos",
     *     @OA\Response(response="200", description="Retorna todos os alunos cadastrados")
     * )
     */
    $app->get('/slim_mobile/alunos', AlunoController::class . ':listarTodos');

    /**
     * @OA\Post(
     *     path="/slim_mobile/aluno",
     *     @OA\Response(response="200", description="Cadastra um novo aluno"),
     *     @OA\Parameter(
     *         name="nome",
     *         in="path",
     *         description="Nome do aluno",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="sobrenome",
     *         in="path",
     *         description="Sobrenome do aluno",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="ra",
     *         in="path",
     *         description="RA do aluno",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     * )
     */
    $app->post('/slim_mobile/aluno', AlunoController::class . ':criar');

    /**
     * @OA\Get(
     *     path="/slim_mobile/aluno/{id}",
     *     @OA\Response(response="200", description="Retorna os dados de um aluno especifico"),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do aluno",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     * )
     */
    $app->get('/slim_mobile/aluno/{id}', AlunoController::class . ':listar');

    /**
     * @OA\Delete(
     *     path="/slim_mobile/aluno/{id}",
     *     @OA\Response(response="200", description="Exclui um aluno especifico do banco de dados"),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do aluno",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     * )
     */
    $app->delete('/slim_mobile/aluno/{id}', AlunoController::class . ':excluir');
};


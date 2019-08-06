<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

/**
 * @OA\Info(title="API para o slim mobile", version="0.1")
 */

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$RouteAluno = require __DIR__ . "/src/routes/RouteAluno.php";
$RouteAluno($app);

$app->run();
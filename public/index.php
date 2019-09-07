<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathDetector;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$basePath = (new BasePathDetector($_SERVER))->getBasePath();
$app->setBasePath($basePath);

// Add middleware
// $app->addRoutingMiddleware();
// $app->addErrorMiddleware(true, true, true);

// Define app routes
$app->get('/', static function (Request $request, Response $response) {
    $response->getBody()->write('Hello, World!');
    return $response;
})->setName('root');

// Run app
$app->run();

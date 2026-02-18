<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/Controller/HomeController.php';

use App\Controller\HomeController;

$projectRoot = dirname(__DIR__);
$routes = require $projectRoot . '/config/routes.php';
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    echo 'Pagina niet gevonden';
    exit;
}

[$controllerClass, $action] = $routes[$path];
$controller = new $controllerClass($projectRoot . '/templates');

if (!method_exists($controller, $action)) {
    http_response_code(500);
    echo 'Controller actie niet gevonden';
    exit;
}

$response = $controller->{$action}();

http_response_code($response['status'] ?? 200);
header('Content-Type: text/html; charset=utf-8');
echo $response['content'] ?? '';

<?php

use Aura\Router\RouterContainer;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';


$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions('config/container.php');

$container = $containerBuilder->build();
$request = $container->get(ServerRequest::class);
$routerContainer = $container->get(RouterContainer::class);

$map = $routerContainer->getMap();

require 'config/routes.php';
$request2 = $container->get(ServerRequest::class);

// get the route matcher from the container ...
$matcher = $routerContainer->getMatcher();

// .. and try to match the request to a route.
$route = $matcher->match($request);


if (!$route) {
    echo "No route found for the request.";
    exit;
}

// add route attributes to the request
foreach ($route->attributes as $key => $val) {
    $request = $request->withAttribute($key, $val);
}

// dispatch the request to the route handler.
// (consider using https://github.com/auraphp/Aura.Dispatcher
// in place of the one callable below.)
$callable = $route->handler;
/** @var Response $response */
$response = $callable($request);

// emit the response
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
http_response_code($response->getStatusCode());
echo $response->getBody();
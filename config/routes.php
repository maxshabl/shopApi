<?php

use App\Controllers\OrderController;
use Aura\Router\Map;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

/** @var Map $map */
// add a route to the map, and a handler for it
$map->get('order', '/order/get/{id}', function (ServerRequest $request) use ($container) {
    $controller = $container->get(OrderController::class);
    $rq = $controller->getRequest();
    return new Response\JsonResponse($controller->get());
});
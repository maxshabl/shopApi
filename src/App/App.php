<?php

namespace App;

use Aura\Router\Route;
use Aura\Router\RouterContainer;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

/**
 * Class App
 * @package App
 */
class App
{
    /**
     * Annotation combined with phpdoc:
     * @var RouterContainer
     */
    private $routerContainer;

    /**
     * @var ServerRequestInterface
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var callable[]
     */
    private $routes;

    /**
     * App constructor.
     * @Inject
     * @param RouterContainer $routerContainer
     * @param Response $response
     */
    public function __construct(RouterContainer $routerContainer, Response $response)
    {
        // create the router container and get the routing map
        $this->routerContainer = $routerContainer;
        $this->response = $response;
    }

    /**
     * @param ServerRequestInterface $request
     */
    public function setRequest(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return void Returns the body as a stream.
     */
    public function emit()
    {
        $route = $this->getRoute();

        if (!$route) {
            echo "No route found for the request.";
            exit;
        }

        // add route attributes to the request
        foreach ($route->attributes as $key => $val) {
            $this->request = $this->request->withAttribute($key, $val);
        }

        // dispatch the request to the route handler.
        // (consider using https://github.com/auraphp/Aura.Dispatcher
        // in place of the one callable below.)
        $callable = $route->handler;
        /** @var Response $response */
        $response = $callable($this->request);

        // emit the response
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }
        http_response_code($response->getStatusCode());
        echo $response->getBody();
    }


    /**
     * @return Route|false
     */
    private function getRoute()
    {
        $map = $this->routerContainer->getMap();
        require 'config/routes.php';

        // get the route matcher from the container ...
        $matcher = $this->routerContainer->getMatcher();

        // .. and try to match the request to a route.
        return $matcher->match($this->request);
    }
}
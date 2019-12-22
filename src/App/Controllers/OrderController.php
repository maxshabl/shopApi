<?php


namespace App\Controllers;

use Zend\Diactoros\ServerRequest;

/**
 * Class OrderController
 * @package App\Controllers
 */
class OrderController
{
    /**
     * @var ServerRequest
     */
    private $request;

    /**
     * OrderController constructor.
     * Inject
     * @param ServerRequest $request
     */
    public function __construct(ServerRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function get()
    {
        return 'OrderController->get';
    }

    /**
     * @return ServerRequest
     */
    public function getRequest(): ServerRequest
    {
        return $this->request;
    }
}
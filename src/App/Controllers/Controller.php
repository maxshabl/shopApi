<?php


namespace App\Controllers;


use Zend\Diactoros\ServerRequest;

class Controller
{
    /**
     * @var ServerRequest
     */
    private $request;

    /**
     * @return string
     */
    public function get()
    {
        return 'BuyController->get';
    }

    /**
     * @param ServerRequest $request
     */
    public function setRequest(ServerRequest $request): void
    {
        $this->request = $request;
    }

}
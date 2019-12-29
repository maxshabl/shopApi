<?php

namespace App\Requests;

use Zend\Diactoros\ServerRequest;

/**
 * Class Request
 */
class Request
{
    /**
     * @var ServerRequest
     */
    protected $request;

    /**
     * GeneratorResponse constructor.
     * @param ServerRequest $request
     */
    public function __construct(ServerRequest $request)
    {
        $this->request = $request;
    }
}
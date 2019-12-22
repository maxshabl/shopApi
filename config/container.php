<?php

use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;

return [

    ServerRequest::class => function () {
        return ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );
    }

];
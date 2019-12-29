<?php
// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__.'/src');
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'app',
    'password' => 'secret',
    'dbname'   => 'app',
    'host' => 'mysql',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode,null,  null, false);
$entityManager = EntityManager::create($dbParams, $config);
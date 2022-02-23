<?php
require_once 'database/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

function getEntityManager () : EntityManager
{
      $dbParams = [
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => '',
        'dbname' => 'kgb',
    ];

    $config = Setup::createAnnotationMetadataConfiguration(['entities'], true, null, null, false);

    return EntityManager::create($dbParams, $config);
}

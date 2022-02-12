<?php
require_once 'vendor/autoload.php';
require_once 'entityManager.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet(getEntityManager());
<?php
$env = getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development';
define('APPLICATION_ENV', $env);
 
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/models/entity'),
    realpath(APPLICATION_PATH . '/util'),
    realpath(APPLICATION_PATH . '/models'),  
    get_include_path(),
)));

// Doctrine and Symfony Classes
require_once __DIR__ . '/../vendor/autoload.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Symfony', 'Doctrine');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Entities', APPLICATION_PATH . '/models');
$classLoader->setNamespaceSeparator('_');
$classLoader->register();

// Zend Components
require_once 'Zend/Application.php';
 
// Create application
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

// bootstrap doctrine
$application->getBootstrap()->bootstrap('doctrine');
$em = $application->getBootstrap()->getResource('doctrine');

// generate the Doctrine HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);

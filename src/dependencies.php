<?php
// DIC configuration
$container = $app->getContainer();

// view renderer
$container['renderer'] = function() use ($container) {
    $settings = $container->get('settings')['renderer'];
    return new \Slim\Views\PhpRenderer($settings['template_path']);
};

// database
$container['db'] = function() use ($container) {
    $settings = $container->get('settings')['db'];
    $dsn = 'mysql:dbname='.$settings['dbname'].
        'host='.$settings['host'].
        'port='.$settings['port'];

    $db = new PDO($dsn = "mysql:host=mariadb-dev.ctqka5csqsg2.us-west-2.rds.amazonaws.com;dbname=student",
        'student', 'letmein');
    return $db;
};

// monolog
$container['logger'] = function() use ($container) {
    $settings = $container->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
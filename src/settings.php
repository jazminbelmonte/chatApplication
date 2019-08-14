<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        // Database settings
        'db' => [
            'host' => 'mariadb-dev.ctqka5csqsg2.us-west-2.rds.amazonaws.com',
            'port' => '3306',
            'dbname' => 'student',
            'username' => 'student',
            'password' => 'letmein'
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ]
    ],
];
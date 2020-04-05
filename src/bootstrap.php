<?php

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Slim\App;
use Slim\Views\PhpRenderer;

const PUBLIC_PATH = __DIR__ . '/../public/';
const SRC_PATH = __DIR__ . '/';

$app = null;

/*
 * Load the autoloader
 */
$autoloader = require __DIR__ . '/../vendor/autoload.php';

// Create Slim App instance
$app = new App([
    'settings' => [
        'displayErrorDetails' => true,
    ],
]);

/*
 * Set up dependencies
 */
$container = $app->getContainer();

// View Renderer
$container['renderer'] = function ($c) {
    $templatePath = SRC_PATH;
    return new PhpRenderer($templatePath);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Logger('app');
    $logger->pushProcessor(new UidProcessor());

    $handler = new RotatingFileHandler(__DIR__ . '/../log/app.log', 0, \Monolog\Logger::DEBUG, true, 0664);
    $handler->setFilenameFormat('{date}-{filename}', 'Y/m/d');
    $logger->pushHandler($handler);

    return $logger;
};

return $app;
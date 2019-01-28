<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use Intersect\Application;
use Intersect\Core\Http\Request;
use Intersect\Http\RequestHandler;

$request = Request::initFromGlobals();

$application = Application::instance();
$application->setBasePath(realpath(__DIR__ . '/../'));
$application->handleRequest($request);
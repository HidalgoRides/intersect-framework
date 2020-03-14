<?php

error_reporting(E_ALL);


require_once dirname(__FILE__) . '/../vendor/autoload.php';

use Intersect\Application;
use Intersect\Core\Http\Request;

$request = Request::initFromGlobals();

$application = Application::instance();
$application->setBasePath(realpath(__DIR__ . '/../'));
$application->handleRequest($request);
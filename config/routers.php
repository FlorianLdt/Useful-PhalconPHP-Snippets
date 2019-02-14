<?php

use Phalcon\Mvc\Router;

$router = new Router();

$request = new \Phalcon\Http\Request();
$action = $request->getMethod();

$router->add('/', [
	'module' => 'api_v1',
	'controller' => 'index',
	'action' => 'index'
]);

// api version1 RESTFul
$router->add('/api/v1', [
	'module' => 'api_v1',
	'controller' => 'index',
	'action' => 'index'
]);
$router->add('/api/v1/', [
	'module' => 'api_v1',
	'controller' => 'index',
	'action' => 'index'
]);

$router->add('/api/v1/:controller/:params', [
	'module' => 'api_v1',
	'controller' => 1,
	'params' => 2,
	'action' => $action
]);
// api version1 RESTFul
/*
// admin
$router->add('/admin', [
	'module' => 'admin',
	'controller' => 'index',
	'action' => 'index'
]);
$router->add('/admin/', [
	'module' => 'admin',
	'controller' => 'index',
	'action' => 'index'
]);

$router->add('/admin/:controller/:params', [
	'module' => 'admin',
	'controller' => 1,
	'params' => 2,
	'action' => $action
]);
// admin
*/

return $router;


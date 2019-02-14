<?php
namespace Multiple\Api\V1;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Events\Manager;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\ModuleDefinitionInterface;
class Module implements ModuleDefinitionInterface
{
    /**
     * Registers the module auto-loader
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces(
            [
                'Multiple\Api\V1\Controllers' => '../apps/api/v1/controllers/',
                'Multiple\Api\V1\Models' => '../apps/api/v1/models/',
            ]
        );
        $loader->register();
    }
    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        // Registering a dispatcher
        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $eventManager = new Manager();
            // Attach a event listener to the dispatcher (if any)
            // For example:
            // $eventManager->attach('dispatch', new \My\Awesome\Acl('frontend'));
            $dispatcher->setEventsManager($eventManager);
            $dispatcher->setDefaultNamespace('Multiple\Api\V1\Controllers\\');
            return $dispatcher;
        });
        // Registering the view component
        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir('../apps/api/v1/views/');
            return $view;
        });
        $di->set('db', function () {
            return new Mysql(
                [
					"host"     => "some-mariadb",
					"username" => "kuma",
					"password" => "1234qwer",
					"dbname"   => "kuma",
					'charset' => 'utf8mb4',
                ]
            );
        });
    }
}
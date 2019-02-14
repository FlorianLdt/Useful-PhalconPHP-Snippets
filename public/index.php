<?php
error_reporting(E_ALL & ~E_DEPRECATED);
use Phalcon\Loader;
use Phalcon\Mvc\Router;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application as BaseApplication;
class Application extends BaseApplication
{
    protected function registerServices()
    {
        $di = new FactoryDefault();
        $loader = new Loader();
 
		$loader
            ->registerDirs([__DIR__ . '/../apps/library/'])
			->registerNamespaces(
				array(
					'Library\V1\Utils'  => [__DIR__ . '/../apps/library/v1/utils/'],
					'Library\V1\Data'  => [__DIR__ . '/../apps/library/v1/data/'],
					'Library\V1\Api'  => [__DIR__ . '/../apps/library/v1/api/']
				)
			)
            ->register();

        // Registering a router
        $di->set('router', function () {

			include_once("../config/routers.php");
			return $router;

        });
        $this->setDI($di);
    }
    public function main()
    {
        $this->registerServices();
        // Register the installed modules
        $this->registerModules([
            'api_v1' => [
                'className' => 'Multiple\Api\V1\Module',
                'path'      => '../apps/api/v1/Module.php'
            ]
        ]);
        echo $this->handle()->getContent();
    }
}
$application = new Application();
$application->main();

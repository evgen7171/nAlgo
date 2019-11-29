<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 24.11.2019
 * Time: 21:52
 */

class App
{
    use TSingleton;

    private $config;
    private $components = [];

    static public function call(): App
    {
        return static::getInstance();
    }

    public function auth()
    {
        return (new \App\services\Authorization())->check();

    }

    public function run($config)
    {
        $this->config = $config;
        $this->componentsData = $config['components'];
        $this->runController();
    }

    private function runController()
    {
        $request = new \App\services\Request();

        $defaultControllerName = $this->config['defaultControllerName'];
        $controllerName = $request->getControllerName() ?: $defaultControllerName;
        $actionName = $request->getActionName();

        $controllerClass = 'App\\controllers\\' .
            ucfirst($controllerName) . 'Controller';
        if (class_exists($controllerClass)) {
            /**@var \App\controllers\Controller $controller */
            $controller = new $controllerClass(
                new \App\services\renders\TwigRenderServices(),
                $request
            );
            $controller->run($actionName);
        }
    }
    /*
    public function __get(string $name)
    {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }

        if (array_key_exists($name, $this->componentsData)) {
            $class = $this->componentsData[$name]['class'];
            if (!class_exists($class)) {
                return null;
            }

            if (array_key_exists('config', $this->componentsData[$name])) {
                $config = $this->componentsData[$name]['config'];
                $component = new $class($config);
            } else {
                $component = new $class();
            }
            $this->components[$name] = $component;
            return $component;
        }
        return null;
    }
    */
}
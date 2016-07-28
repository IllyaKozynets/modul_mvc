<?php

Class Router
{

    private $routes;

    public function __construct()
    {

        $routes_all = ROOT . "/config/routes.php";
        $this->routes = include($routes_all);

    }

    private function getURI()
    {

        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        $uri = $this->getURI();
        function returnArray($controllerObject,$actionName){
            return array($controllerObject,$actionName);
        }
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters=$segments;
                
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';


               
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                @$result = call_user_func_array(returnArray($controllerObject,$actionName),$parameters);
                if ($result != null) {
                    break;
                }
            }
        }

    }

}
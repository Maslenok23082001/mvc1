<?php
class Router {
    private $routes;
    private function getUrl () {
        if ($_SERVER['REQUEST_URI']) {
            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }
    private function get_routes(){
        return include_once (ROOT."/config/routes.php");
    }
    public function run () {
       $routes = $this->get_routes();
       $uri = $this->getUrl();
       foreach ($routes as $UriPattern => $path) {
           if (preg_match("~$UriPattern~", $uri)) {
               $internal_path = preg_replace("~$UriPattern~", $path, $uri);
               $segments = explode('/', $internal_path);
               $controllerName = ucfirst(array_shift($segments))."Controller";
               $actionName = "action".ucfirst(array_shift($segments));

               if (file_exists(ROOT."/controllers/".$controllerName.".php")) {
                   include_once(ROOT."/controllers/".$controllerName.".php");

                   $controllerObject = new $controllerName();

                   $result =  $controllerObject->$actionName($segments);
                   if ($result != null) {
                       break;
                   }
               }
           }
       }

    }
};
<?php

/**
 * User: Abdessamad
 * Date: 7/7/2020
 * Time: 10:01 AM
 */

namespace app\core;

use app\core\exception\NotFoundException;

/**
 * Class Router
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\mvc
 */
class Router
{
    private Request $request;
    private Response $response;
    private array $routeMap = [];

    public function __construct(Request $request, Response $response)
    {
        // echo '<pre>';
        // print_r($request);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // exit ;
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $url, $callback)
    {
       
        $this->routeMap['get'][$url] = $callback;
        // echo '<pre>';
        // print_r($this->routeMap);
        // echo '</pre>';
        // exit ;
    }

    public function post(string $url, $callback)
    {

        $this->routeMap['post'][$url] = $callback;
        // echo '<pre>';
        // print_r($this->routeMap);
        // echo '</pre>';
        // exit ;
    }

    /**
     * @return array
     */
    public function getRouteMap($method): array
    {
        // echo $method ;
        // echo '<pre>';
        // print_r($this->routeMap[$method])   ;
        // echo '</pre>';
        // exit ;
        return $this->routeMap[$method] ?? []; //* if post or get not found return empty array
        // ?  if url exit return empty array
    }

    public function getCallback() //£ FOR SCURITEE
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        // Trim slashes
        $url = trim($url, '/'); // supprimer les slashs en debut et fin de url et les mettre dans $url

        // echo $url ;
        // Get all routes for current request method
        // echo $method ;
        // exit ;
        $routes = $this->getRouteMap($method);


        // echo '<pre>';
        // var_dump($routes);
        // echo '</pre>';
        // exit ;
        $routeParams = false;

        // Start iterating registed routes
        foreach ($routes as $route => $callback) {
            // echo $route ;
            // echo '<br>';
            // var_dump($callback);
            // echo '<br>';
            // var_dump($route);
            // Trim slashes

            $route = trim($route, '/');
            $routeNames = [] ;

            if (!$route) {
                continue;
            }
// echo "<pre>";
// print_r($routeNames);
// echo "</pre>";
            // Find all route names from route and save in $routeNames
            if (preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches)) {
                $routeNames = $matches[1];
            }
//             echo "<pre>";
// print_r($routeNames);
// echo "</pre>";

            // Convert route name into regex pattern
            $routeRegex = "@^" . preg_replace_callback('/\{\w+(:([^}]+))?}/', fn ($m) => isset($m[2]) ? "({$m[2]})" : '(\w+)', $route) . "$@";

            // Test and match current route against $routeRegex
            if (preg_match_all($routeRegex, $url, $valueMatches)) {
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                $routeParams = array_combine($routeNames, $values);

                $this->request->setRouteParams($routeParams);
                return $callback;
            }
        }

        return false;
    }

    public function resolve()
    {
        $method = $this->request->getMethod(); //* get, post, put, delete
        $url = $this->request->getUrl(); //* get url sans ??
        $callback = $this->routeMap[$method][$url] ?? false; //* if url exist in routeMap return callback else return false
    //    echo '<pre>'; 
    //     print_r($this->routeMap);
    //     echo '</pre>';
    //     exit ;
        /* 
        if($this->routeMap[$method][$url]){
            $callback=$this->routeMap[$method][$url]
        }
        else {
            return $callback = false
        }
        */
        // echo '<pre>';
        // print_r($callback);
        // echo '</pre>';
        if (!$callback) {   // if exist url in route map

            // echo "flase" ;
            // exit ;
            $callback = $this->getCallback(); // for sucurite

            if ($callback === false) {
                throw new NotFoundException(); //* if url not exist in route map throw exception 404
            }
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            /**
             * @var $controller \app\core\Controller
             */
            $controller = new $callback[0]; //* new Controller()
            $controller->action = $callback[1]; //* action = index function qui excite dans Controller
            Application::$app->controller = $controller;
            $middlewares = $controller->getMiddlewares();
            foreach ($middlewares as $middleware) {
                $middleware->execute();
            }
            $callback[0] = $controller; //* callback[0] = Controller class and acton function
        }
        //  $test = call_user_func($callback, $this->request, $this->response);
        // echo '<pre>';
        // var_dump($callback);
        // echo '</pre>';
        // exit;

        return call_user_func($callback, $this->request, $this->response); //* excite function index in Controller
    }

    public function renderView($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function renderViewOnly($view, $params = [])
    {
        return Application::$app->view->renderViewOnly($view, $params);
    }
}

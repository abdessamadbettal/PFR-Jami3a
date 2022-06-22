<?php

/**
 * User: Abdessamad
 * Date: 7/7/2020
 * Time: 10:23 AM
 */

namespace app\core;

/**
 * Class Request
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\mvc
 */
class Request
{
    private array $routeParams = [];

    public function getMethod()
    {
        // ! pour devenir minusqule
        // echo '<pre>';
        // print_r($_SERVER);
        // echo '</pre>';
        // exit ;
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getUrl() //* get the url sans ??
    {
        $path = $_SERVER['REQUEST_URI']; // /thecodeholic/mvc/public/home cad url 
        $position = strpos($path, '?'); // position de la question mark
        if ($position !== false) { // si la position de la question mark existe
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    public function isGet()
    {
        return $this->getMethod() === 'get';
    }

    public function isPost()
    {
        return $this->getMethod() === 'post';
    }
    // ! pour get data de post et se transforme en array associative
    public function getBody()
    {
        $data = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {

            if (isset($_FILES['file'])) {
                foreach ($_FILES['file'] as $key => $value) {
                    $data[$key] = $value; //* pour avoir le nom du fichier
                }
            }
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $data;
    }

    /**
     * @param $params
     * @return self
     */
    public function setRouteParams($params)
    {
        $this->routeParams = $params;
        return $this;
    }

    public function getRouteParams()
    {
        return $this->routeParams;
    }

    public function getRouteParam($param, $default = null)
    {
        return $this->routeParams[$param] ?? $default;
    }
}

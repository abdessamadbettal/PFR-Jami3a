<?php

/**
 * User: Abdessamad
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace app\core\middlewares;


use app\core\Application;
use app\core\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\core
 */
class AuthMiddleware extends BaseMiddleware
{
    protected array $actions = []; // ['home', 'profile'];

    public function __construct($actions = [])
    {
        // var_dump($this->actions);
        $this->actions = $actions; 
        // var_dump($this->actions);
    }

    public function execute()
    {
        if (Application::isGuest()) {
            // var_dump($this->actions);
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) { // if empty, then all actions are allowed
                throw new ForbiddenException(); // throw exception if user is not logged in
            }
        }
    }
}

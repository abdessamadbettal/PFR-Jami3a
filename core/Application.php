<?php

/**
 * User: Abdessamad
 * Date: 7/7/2020
 * Time: 9:57 AM
 */

namespace app\core;

use app\core\db\Database;

/**
 * Class Application
 *
 * @return
 * @package app
 */
class Application
{
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];
    public static Application $app;
    public static string $ROOT_DIR;
    public string $userClass;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public View $view;
    public ?UserModel $user;

    public function __construct($rootDir, $config)
    {
        // echo $rootDir ;
       
        //* $rootDir becomes the root directory of the application
        //* $config becomes the config array 
        $this->user = null; //* null because we don't know if the user is logged in yet
        // var_dump($this->user)  ;
        // echo $config['userClass'];
        $this->userClass = $config['userClass']; //* app\models\User or whatever you named your user class
        self::$ROOT_DIR = $rootDir;  //* $rootDir becomes the root directory of the application
        
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->view = new View();
        
        $userId = Application::$app->session->get('user'); //* get the user id from the session  (int(1))
        if ($userId) { //* if the user id exists
            $key = $this->userClass::primaryKey(); //* get the primary key of the user class "id"
            $this->user = $this->userClass::findOne([$key => $userId]); //* get the user from the database using the user class and the user id
        }
    }

    public static function isGuest() //* check if the user is logged in or not
    {

        // echo '<pre>';
        // var_dump(self::$app->user) ;
        // echo '</pre>';
        // exit ;
        return !self::$app->user; // * if the user is null, then the user is guest
    }

    public function login(UserModel $user) //* login the user 
    {
        $this->user = $user; //* set the user to the user model 
        $className = get_class($user); //* get the class name of the user model app\models\User
        $primaryKey = $className::primaryKey(); //* get the primary key of the user model "id"
        $value = $user->{$primaryKey}; //* get the value of the primary key of the user model 1
        Application::$app->session->set('user', $value); //* set the user id to the session

        return true;
    }

    public function logout()
    {
        $this->user = null;
        self::$app->session->remove('user');
    }

    public function run()
    {
        $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    public function triggerEvent($eventName)
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }

    public function on($eventName, $callback)
    {
        $this->eventListeners[$eventName][] = $callback;
    }
}

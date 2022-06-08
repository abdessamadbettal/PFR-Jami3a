<?php

/**
 * User: Abdessamad
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\PublierForm;
use app\models\User;

/**
 * Class SiteController
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home()
    {
        return $this->render('home', [
            'name' => 'TheCodeholic'
        ]);
    }
    public  function publier(Request $request)
    {
        $publierForm = new PublierForm();
        if ($request->getMethod() === 'post') {
            $publierForm->loadData($request->getBody());
            $publierForm->save() ;
            Application::$app->response->redirect('/');
            Application::$app->session->setFlash('success', 'Thanks for sharing your document');
        //     echo '<pre>';
        // print_r($publierForm);
        // echo '</pre>';
        // exit ;
            // if ($loginForm->validate() && $loginForm->login()) {
            //     Application::$app->response->redirect('/');
            //     return;
            // }
        }
        $this->setLayout('auth');
        return $this->render('publier' , [
            'model' => $publierForm
        ]);
    }
    public function login(Request $request)
    {
        // echo '<pre>';
        // var_dump($request->getBody(), $request->getRouteParam('id'));
        // echo '</pre>';
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function profile()
    {
        return $this->render('profile');
    }

    public function profileWithId(Request $request)
    {
        echo '<pre>';
        var_dump($request->getBody());
        echo '</pre>';
    }
    public function document(){
        return $this->render('document');
    }
}

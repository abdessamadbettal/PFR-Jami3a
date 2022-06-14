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
use app\models\DocumentModel;
use app\models\LoginForm;
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

    public function home(Request $request)
    {
    
        if ($request->getMethod() === 'post') {
          $document = new DocumentModel();
          var_dump($request->getBody());
          $search = $request->getBody()['search'];
        //   echo $search;
          $document->selectSearch($search , $search , $search);
          $document->selectModules("biologie");
            $document->selcetSpecialites();
            $documentsdata = $document->DocumentList ;
            $modulesdata = $document->ModulesList ;
            $specialitesdata = $document->SpecialitesList ;
            return $this->render('libirary', [
                'documents' => $documentsdata ,
                'modules' => $modulesdata ,
                'specialites' => $specialitesdata
            ]);
        //   exit ;
        }    
        return $this->render('home');
        // return $this->render('home', [
        //     'name' => 'TheCodeholic'
        // ]);
    }
    
    public function login(Request $request)
    {
        // echo '<pre>';
        // var_dump($request)  ;
        // echo '</pre>';
        // echo $request[1]['id'] ;
        // foreach ($request as $key => $value) {
        //     print_r($value) ;
        //     // echo "<br>" ;
        //     // echo 'value :' . $value ;
        // };
        // exit ;
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

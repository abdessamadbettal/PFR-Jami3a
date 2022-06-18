<?php
/**
 * User: Abdessamad
 * Date: 7/8/2020
 * Time: 8:56 AM
 */

namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;

/**
 * Class AboutController
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\controllers
 */
class AboutController extends Controller
{
    public function index()
    {
        // if (isset($_GET[id])) {
        //     echo 'yes is very good' ;
        //     exit ;
        // }
        return $this->render('about');
    }
    public function anas(){
        $anas = ['anas' , 'anas1' , 'anas2'];
        return $this->render('anas' , ['name' => $anas ]);
    }
    public function test()
    {
        $selected_colors = filter_input(
            INPUT_POST,
            'colors',
            FILTER_SANITIZE_STRING,
            FILTER_REQUIRE_ARRAY
        );
    }
    
   
}
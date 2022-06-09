<?php
/**
 * User: Abdessamad
 * Date: 7/8/2020
 * Time: 8:56 AM
 */

namespace app\controllers;


use app\core\Controller;
use app\models\DocumentModel;
use app\core\Request;
use app\core\Application;
use app\core\Response;
use app\core\middlewares\AuthMiddleware;

/**
 * Class LibiraryController
 *
 * @
 * @package app\controllers
 */
class LibiraryController extends Controller
{


    

    public function index()
    {
        // echo "test" ;
        // exit ;
        if (isset($_GET['specialite'])) {
            $document = new DocumentModel ();
            $document->selcetSpecialites();
            $specialitesdata = $document->SpecialitesList ;
            foreach ($specialitesdata as $specialite) {
                
                // echo "<pre>" ;
                // print_r($specialitedata);
                // // echo $specialitedata ;
                // echo "</pre>" ;
                // exit ;
                if ($_GET['specialite'] == $specialite['specialite']) {
                    $document->selectAll($_GET['specialite']);
                $document->selectModules($specialite['specialite']);
                $documentsdata = $document->DocumentList ;
                $modulesdata = $document->ModulesList ;
                return $this->render('libirary', [
                    'documents' => $documentsdata ,
                    'modules' => $modulesdata ,
                    'specialites' => $specialitesdata
                ]);
                
            }
          }
        }
       
        else {
            $document = new DocumentModel ();
            $document->selectAll("biologie");
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
            
            
        }
            
    }
    public function updateDocument(){
        $document = new DocumentModel ();
        $document->selectDocument($_GET['id']);
        $document->DocumentList ;
        // echo '<pre>';
        // print_r($document->DocumentList[0]);
        // echo '</pre>';
        $document->loadData($document->DocumentList[0]);
        echo '<pre>';
        print_r($document);
        echo '</pre>';
        // exit ;
        
        return $this->render('updatedocument' , [
            'model' => $document
        ]);
    }
    public  function publier(Request $request)
    {
        $document = new DocumentModel();
        if ($request->getMethod() === 'post') {
            echo '<pre>';
        print_r($request->getBody());
        echo '</pre>';
            $document->loadData($request->getBody());
            $document->save() ;
        //     echo '<pre>';
        // print_r($document);
        // echo '</pre>';
        exit ;
            Application::$app->response->redirect('/libirary');
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
            'model' => $document
        ]);
    }

    public function document(){
        $document = new DocumentModel ();
        $document->selectDocument($_GET['id']);
        $document->selcetSpecialites();
        $documentsdata = $document->DocumentList ;
        $specialitesdata = $document->SpecialitesList ;
        foreach ($documentsdata as $data) {
            $document->selectModules($data['specialite']);
        }
        $modulesdata = $document->ModulesList ;
        // echo "<pre>" ;
        //         print_r($documentsdata);
        //         echo "</pre>" ;
        //         exit ;
        return $this->render('document', [
            'documents' => $documentsdata ,
            'modules' => $modulesdata ,
            'specialites' => $specialitesdata
        ]);
    }
    public function deletDocument (){
        if (!Application::isGuest()) {
            $document = new DocumentModel ();
            // print_r($document) ;
            $document->delete($_GET['id']) ;
            Application::$app->response->redirect('/libirary');
            Application::$app->session->setFlash('success', 'le document est suppermer avec succes');
        }
    }
   
}
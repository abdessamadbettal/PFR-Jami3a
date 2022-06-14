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


    public function ajaxModules()
    {
        $document = new DocumentModel();
        $document->selectModules($_GET["specialite_id"]);
        $this->setLayout('ajax');
        // var_dump($document->ModulesList);
        return $this->render('modulesajax' , ['modules' => $document->ModulesList]);
    }

    public function index()
    {
        if (isset($_GET['specialite'])) {
            $document = new DocumentModel();
            $document->selcetSpecialites();
            foreach ($document->SpecialitesList as $specialite) {
                if ($_GET['specialite'] == $specialite['specialite']) {
                    if (isset($_GET['modules'])) {
                        if(isset($_GET['category'])){
                            $document->selectAll($_GET['specialite'] , $_GET['modules'] , $_GET['category']);
                            return $this->render('libirary', [
                                'documents' => $document->DocumentList,
                                'modules' => $document->ModulesList,
                                'specialites' => $document->SpecialitesList
                            ]);
                        }
                        $document->selectAll($_GET['specialite'] , $_GET['modules'] );
                        return $this->render('libirary', [
                            'documents' => $document->DocumentList,
                            'modules' => $document->ModulesList,
                            'specialites' => $document->SpecialitesList
                        ]);
                    }
                    if (Application::isGuest()) {
                        $document->selectAll($_GET['specialite']);
                    }
                    if (!Application::isGuest()) {
                        $document->selectAllDash($_GET['specialite']);
                    }
                    $document->selectModules($specialite['specialite']);
                    return $this->render('libirary', [
                        'documents' => $document->DocumentList,
                        'modules' => $document->ModulesList,
                        'specialites' => $document->SpecialitesList
                    ]);
                }
            }
        } else {
            $document = new DocumentModel();
            if (Application::isGuest()) {
                $document->selectAll("biologie");
            }
            if (!Application::isGuest()) {
                $document->selectAllDash("biologie");
            }
            $document->selectModules("biologie");
            $document->selcetSpecialites();
            $documentsdata = $document->DocumentList;
            $modulesdata = $document->ModulesList;
            $specialitesdata = $document->SpecialitesList;
            return $this->render('libirary', [
                'documents' => $documentsdata,
                'modules' => $modulesdata,
                'specialites' => $specialitesdata
            ]);
        }
    }

    public function updateDocument(Request $request)
    {
        if (!Application::isGuest()) {
        $document = new DocumentModel();
        $document->selectDocument($_GET['id']);
        $document->selectYear();
        if ($request->getMethod() === 'post') {
            $document->loadData($request->getBody());
            $document->type = pathinfo($document->name, PATHINFO_EXTENSION);
            $tempname = $document->tmp_name;
            $folder = "files/" . $document->name;
            move_uploaded_file($tempname, $folder);
            $document->update($_GET['id']);
            Application::$app->response->redirect('/libirary');
            Application::$app->session->setFlash('success', ' the document is updaet succefuly');
        }
        $document->loadData($document->DocumentList[0]);
        return $this->render('updatedocument', [
            'model' => $document,
            'years' => $document->YearsList
        ]);
    }
    }
    public  function publier(Request $request)
    {
        $document = new DocumentModel();
        if ($request->getMethod() === 'post') {
            $document->loadData($request->getBody());
           
            $document->type = pathinfo($document->name, PATHINFO_EXTENSION);  
            $tempname = $document->tmp_name;
            $folder = "files/" . $document->name;
            move_uploaded_file($tempname, $folder);
            $document->save();
            Application::$app->response->redirect('/libirary');
            Application::$app->session->setFlash('success', 'Thanks for sharing your document');
        }
        $this->setLayout('auth');
        return $this->render('publier', [
            'model' => $document
        ]);
    }

    public function document()
    {
        $document = new DocumentModel();
        $document->selectDocument($_GET['id']);
        $document->selcetSpecialites();
        $document->loadData($document->DocumentList[0]);
        $document->DocumentList[0]['size'] = number_format(($document->DocumentList[0]['size']) / 1024 / 1024) . " MB";
        $documentsdata = $document->DocumentList;
        $specialitesdata = $document->SpecialitesList;
        foreach ($documentsdata as $data) {
            $document->selectModules($data['specialite']);
        }
        $modulesdata = $document->ModulesList;
        return $this->render('document', [
            'documents' => $documentsdata,
            'modules' => $modulesdata,
            'specialites' => $specialitesdata
        ]);
    }
    public function deletDocument()
    {
        if (!Application::isGuest()) {
            $document = new DocumentModel();
            // print_r($document) ;
            $document->delete($_GET['id']);
            Application::$app->response->redirect('/libirary');
            Application::$app->session->setFlash('success', 'le document est suppermer avec succes');
        }
    }
    public function acceptDocument()
    {
        if (!Application::isGuest()) {
            $document = new DocumentModel();
            // print_r($document) ;
            $document->accept($_GET['id']);
            Application::$app->response->redirect('/libirary');
            Application::$app->session->setFlash('success', 'le document est accepte avec succes');
        }
    }
    public function masquerDocument()
    {
        if (!Application::isGuest()) {
            $document = new DocumentModel();
            // print_r($document) ;
            $document->masquer($_GET['id']);
            Application::$app->response->redirect('/libirary');
            Application::$app->session->setFlash('success', 'le document est accepte avec succes');
        }
    }
}

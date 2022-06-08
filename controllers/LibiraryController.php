<?php
/**
 * User: Abdessamad
 * Date: 7/8/2020
 * Time: 8:56 AM
 */

namespace app\controllers;


use app\core\Controller;
use app\models\DocumentModel;

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
   
}
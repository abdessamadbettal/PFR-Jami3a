<?php

/**
 * User: Abdessamad
 * Date: 7/25/2020
 * Time: 9:36 AM
 */

namespace app\models;


use app\core\Application;
use app\core\db\DbModel;
use app\core\Model;

/**
 * Class LoginForm
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\models
 */
class DocumentModel extends DbModel
{
    public int $id;
    public string $name = '';
    public string $tmp_name = '';
    public string $type = '';
    public int $size = 0;
    public string $title = '';
    public string $prof = '';
    public string $ville = '';
    public  $status = false ;
    public string $fk_specialite = '';
    public string $fk_modele = '';
    public string $semestre = '';
    public string $etablissement = '';
    public string $category = '';
    public string $annees = '';
    public string $page = '1';

    public $DocumentList = [];
    public $ModulesList = [];
    public $SpecialitesList = [];
    public $YearsList = [];

    

    public static function tableName(): string 
    {
        return 'document' ;
    }

    public function rules()
    {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }
    public function attributes(): array
    {
        return [ 'title' ,'type' , 'prof' , 'ville' , 'etablissement' , 'semestre' , 'annees' , 'fk_modele' , 'fk_specialite' , 'name' , 'size' , 'category' , 'tmp_name' , 'page' , 'status' ] ;
    }
    public function save()
    {
        return parent::save();
    }
    public function selectYear()
    {
        return parent::selectYear();
    }
    public function selectSearch($title , $prof , $module)
    {
        return parent::selectSearch($title , $prof , $module);
    }
    public function update($id)
    {
        return parent::update($id);
    }
    public function delete ($id){
        return parent::delete ($id) ;
    }
    public function accept($id)
    {
        return parent::accept($id);
    }
    public function masquer($id)
    {
        return parent::masquer($id);
    }
    public function selectAll(...$get)
    {
        // echo "<pre>" ;
        // var_dump($get) ;
        // echo "</pre>" ;
        // echo count($get) ;
        // exit ;
        return parent::selectAll(...$get);
    }
    public function selectAllDash($specialite)
    {
        return parent::selectAllDash($specialite);
    }
    public function selectModules($specialite)
    {
        return parent::selectModules($specialite);
    }
    public function selcetSpecialites(){
        return parent::selcetSpecialites();
    }
    public function selectDocument($id){
        return parent::selectDocument($id) ;
    }

    public function labels()
    {
        return [
            'email' => 'Your Email address',
            'password' => 'Password'
        ];
    }
}

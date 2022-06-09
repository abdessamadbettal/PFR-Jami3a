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
    public string $title = '';
    public string $prof = '';
    public string $ville = '';
    public string $fk_specialite = '';
    public string $fk_modele = '';
    public string $semestre = '';
    public string $etablissement = '';
    public string $type = '';
    public string $annees = '';

    

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
        return [ 'title' ,'type' , 'prof' , 'ville' , 'etablissement' , 'semestre' , 'annees' , 'fk_modele' , 'fk_specialite' ];
    }
    public function save()
    {
        return parent::save();
    }
    public function delete ($id){
        return parent::delete ($id) ;
    }
    public function selectAll($specialite)
    {
        return parent::selectAll($specialite);
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

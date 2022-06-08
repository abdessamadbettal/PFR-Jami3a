<?php

/**
 * User: Abdessamad
 * Date: 7/25/2020
 * Time: 9:36 AM
 */

namespace app\models;

// use app\core\db\DbModel as DbDbModel;
use app\core\db\DbModel;
// use app\core\Application;
use app\core\Model;

/**
 * Class LoginForm
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\models
 */
class PublierForm extends DbModel 
{
    public string $title = '';
    public string $prof = '';
    public string $ville = '';
    public string $fk_specialite = '';
    public string $fk_modele = '';
    public string $semestre = '';
    public string $etablissement = '';
    public string $type = '';
    public string $annees = '';

    // public function rules()
    // {
    //     return [
    //         'name' => [self::RULE_REQUIRED],
    //         'password' => [self::RULE_REQUIRED],
    //     ];
    // }

    public static function tableName(): string 
    {
        return 'document' ;
    }

    public function attributes(): array
    {
        return [ 'title' ,'type' , 'prof' , 'ville' , 'etablissement' , 'semestre' , 'annees' , 'fk_modele' , 'fk_specialite' ];
    }
    public function save()
    {
        // $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }
    // public function labels()
    // {
    //     return [
    //         'name' => 'nom de document',
    //         'prof' => 'Proffeseur' ,
    //         'specialite' => 'categorie' ,
    //         'ville' => 'nom de document',
    //         'etablissment' => 'votre ecole' ,
    //         'type' => 'categorie' ,
    //         'niveau' => 'votre niveau' ,
    //         'annees' => 'annees'
    //     ];
    // }

    // public function login()
    // {
    //     $user = User::findOne(['email' => $this->email]);
    //     if (!$user) {
    //         $this->addError('email', 'User does not exist with this email address');
    //         return false;
    //     }
    //     if (!password_verify($this->password, $user->password)) {
    //         $this->addError('password', 'Password is incorrect');
    //         return false;
    //     }

    //     return Application::$app->login($user);
    // }
}

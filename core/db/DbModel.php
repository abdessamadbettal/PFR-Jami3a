<?php

/**
 * User: Abdessamad
 * Date: 7/10/2020
 * Time: 9:19 AM
 */

namespace app\core\db;

use app\core\Application;
use app\core\Model;

/**
 * Class DbModel
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\core
 */
abstract class DbModel extends Model
{
    public $DocumentList = [];
    public $ModulesList = [];
    public $SpecialitesList = [];

    abstract public static function tableName(): string;

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }
    public function selectAll($specialite)
    {
// echo $specialite ;
// exit ;
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName 
        INNER JOIN modele
        ON document.fk_modele=modele.modele_id 
        INNER JOIN specialite
        ON modele.fk_specialite=specialite.specialite_id where specialite = '$specialite' ;");
        $statement->execute();
        $this->DocumentList =  $statement->fetchAll();
        // echo "<pre>" ;
        // var_dump($this->dataList) ;
        // echo "</pre>" ;
        // exit ;
        return true;
    }
    public function delete ($id){
        $tableName = $this->tableName();
        $statement = self::prepare("DELETE FROM $tableName WHERE document_id = $id ;" ) ;
        $statement->execute();
        return true;
    }
    public function selectDocument($id)
    {

        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName 
        INNER JOIN modele
        ON document.fk_modele=modele.modele_id 
        INNER JOIN specialite
        ON modele.fk_specialite=specialite.specialite_id where document_id = $id;");
        $statement->execute();
        $this->DocumentList =  $statement->fetchAll();
        // echo "<pre>" ;
        // var_dump($this->dataList) ;
        // echo "</pre>" ;
        // exit ;
        return true;
    }
    public function selectModules($specialite)
    {
        $tableName = "modele";
        $statement = self::prepare("SELECT * FROM $tableName
        INNER JOIN specialite
        ON modele.fk_specialite = specialite.specialite_id where specialite = '$specialite' ;");
        $statement->execute();
        $this->ModulesList =  $statement->fetchAll();
        // echo "<pre>" ;
        // var_dump($this->SidebarList) ;
        // echo "</pre>" ;
        // exit ;
        return true;
    }
    public function selcetSpecialites(){
        $tableName = "specialite";
        $statement = self::prepare("SELECT * FROM $tableName ;");
        $statement->execute();
        $this->SpecialitesList =  $statement->fetchAll();
    }


    public static function findOne($where) // Array ( [email] => amin@gmail.com )
    {
        $tableName = static::tableName();
        $attributes = array_keys($where); // Array ( [0] => email )
        $sql = implode("AND", array_map(fn ($attr) => "$attr = :$attr", $attributes)); // email = :email
        
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}

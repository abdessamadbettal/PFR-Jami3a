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
   

    abstract public static function tableName(): string;

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes); // [':id', ':name', ':email', ':password']
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")"); // INSERT INTO users (id, name, email, password) VALUES (:id, :name, :email, :password)
        foreach ($attributes as $attribute) { // [':id' => 1, ':name' => 'John', ':email' => '
            $statement->bindValue(":$attribute", $this->{$attribute}); // bindValue(':id', 1) 
        }
        $statement->execute();
        return true;
    }
    public function update($id)
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        // $params = array_map(fn ($attr) => ":$attr", $attributes);
        $params = array_map(fn($attr) => "$attr=:$attr", $attributes );
        // echo "<pre>";
        // print_r($attributes);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($params);
        // echo "</pre>";
        // echo $this->{$attribute} ;


        // exit ;
        $statement = self::prepare("UPDATE $tableName SET " . implode(",", $params) . " WHERE document_id = $id");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public function accept($id)
    {
        $tableName = $this->tableName();
        
        $statement = self::prepare("UPDATE $tableName SET status = 1 WHERE document_id = $id");
        
        $statement->execute(); 
        return true;
        
    }
    public function masquer($id)
    {
        $tableName = $this->tableName();
        
        $statement = self::prepare("UPDATE $tableName SET status = 0 WHERE document_id = $id");
        
        $statement->execute();
        return true;
        
    }
    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }
    public function selectYear()
    {
        $tableName = "years";
        $statement = self::prepare("SELECT * FROM $tableName ;");
        $statement->execute();
        $this->YearsList =  $statement->fetchAll();
        // echo "<pre>" ;
        // var_dump($this->dataList) ;
        // echo "</pre>" ;
        // exit ;
        return true;
    }
    public function selectAll(...$get)
    {
        $tableName = $this->tableName();
        // echo count($get) ;
        // echo $get[0] ;
        // echo $get[1] ;
        // echo $get[2] ;
        // exit ;
        if (count($get) == 1 || $get[1] == '') {
            $statement = self::prepare("SELECT * FROM $tableName 
            INNER JOIN modele
            ON document.fk_modele=modele.modele_id 
            INNER JOIN specialite
            ON modele.fk_specialite=specialite.specialite_id where specialite = '$get[0]' AND status = 1 ;");
            $statement->execute();
            $this->DocumentList =  $statement->fetchAll();
            return true;
        }
        if (count($get) == 2) {
            $statement = self::prepare("SELECT * FROM $tableName 
            INNER JOIN modele
            ON document.fk_modele=modele.modele_id 
            INNER JOIN specialite
            ON modele.fk_specialite=specialite.specialite_id where specialite = '$get[0]' AND modele_id = '$get[1]' AND status = 1 ;");
            $statement->execute();
            $this->DocumentList =  $statement->fetchAll();
            return true;
        }
        if (count($get) == 3) {
            $statement = self::prepare("SELECT * FROM $tableName 
            INNER JOIN modele
            ON document.fk_modele=modele.modele_id 
            INNER JOIN specialite
            ON modele.fk_specialite=specialite.specialite_id where specialite = '$get[0]' AND modele_id = '$get[1]' AND category = '$get[2]' AND status = 1 ;");
            $statement->execute();
            $this->DocumentList =  $statement->fetchAll();
            return true;
        }
// echo $specialite ;
// exit ;
        // $tableName = $this->tableName();
        // $statement = self::prepare("SELECT * FROM $tableName 
        // INNER JOIN modele
        // ON document.fk_modele=modele.modele_id 
        // INNER JOIN specialite
        // ON modele.fk_specialite=specialite.specialite_id where specialite = '$specialite' AND status = 1 ;");
        // $statement->execute();
        // $this->DocumentList =  $statement->fetchAll();
        // // echo "<pre>" ;
        // // var_dump($this->dataList) ;
        // // echo "</pre>" ;
        // // exit ;
        // return true;
    }
    public function selectSearch($title , $prof , $module)
    {
        // echo $title ;
        // echo $prof ;
        // echo $module ;
        // OR prof like '%$prof%' OR modele like '%$module%'
        // exit ;
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName 
        INNER JOIN modele
        ON document.fk_modele=modele.modele_id 
        INNER JOIN specialite
        ON modele.fk_specialite=specialite.specialite_id 
        where ( title like '%$title%' OR prof like '%$prof%' OR modele like '%$module%' ) AND `status` = 1 ;");
        $statement->execute();
        $this->DocumentList =  $statement->fetchAll();
        return true;
    }
    public function selectAllDash($specialite)
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
        $attributes = array_keys($where); // Array ( [0] => email ) // pour récupérer les clés du tableau
        $sql = implode("AND", array_map(fn ($attr) => "$attr = :$attr", $attributes)); // email = :email
        
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) { // $key = email , $item =
            $statement->bindValue(":$key", $item);  // $statement->bindValue(":email", "
        }
        $statement->execute();
        return $statement->fetchObject(static::class); // return un objet de la classe courante
    }
}

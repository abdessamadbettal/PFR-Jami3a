<?php

/**
 * User: Abdessamad
 * Date: 7/8/2020
 * Time: 9:16 AM
 */

namespace app\core;

use Attribute;

/**
 * Class Model
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\core
 */
class Model
{
    const RULE_REQUIRED = 'required';
    const RULE_EMAIL = 'email';
    const RULE_MIN = 'min';
    const RULE_MAX = 'max';
    const RULE_MATCH = 'match';
    const RULE_UNIQUE = 'unique';

    public array $errors = [];

    public function loadData($data) // $data = $_POST or $_GET
    {
        foreach ($data as $key => $value) {
        // ! tcheck is the propriete existe in publierform 
        // ! 1 arg class qui se trouve les proprietes and 2 arg is the propriete for tcheck 
        if (property_exists($this, $key)) { // if the property existe in the class
            $this->{$key} = $value; // set the value of the property
            } 
        }
    }

    public function attributes() // ila ya des  propriete 'name' pour chaque input
    {
        return [];
    }

    public function labels() //* il ya des des labels a chaque input
    {
        return [];
    }

    public function getLabel($attribute)  //* donne le label de la propriete
    {
        return $this->labels()[$attribute] ?? $attribute; //* si le label existe on le renvoie sinon on renvoie la propriete
    }

    public function rules()
    {
        return [];
    }

    public function validate() // * verifie si les donnees sont valides
    {
        foreach ($this->rules() as $attribute => $rules) { //* pour chaque propriete de la class on va verifier les regles 
            $value = $this->{$attribute}; //* value = name 
            foreach ($rules as $rule) { //* rules = required, email, min, max, match, unique
                $ruleName = $rule; //* ruleName = required
                if (!is_string($rule)) { //*  si rule est un tableau 
                    $ruleName = $rule[0]; //*  ruleName = required
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) { //* si ruleName = required et value est vide
                    $this->addErrorByRule($attribute, self::RULE_REQUIRED); //* on ajoute une erreur
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) { //* si ruleName = email et value n'est pas un email
                    $this->addErrorByRule($attribute, self::RULE_EMAIL); //* on ajoute une erreur
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) { //* si ruleName = min et value est inferieur a min
                    $this->addErrorByRule($attribute, self::RULE_MIN, ['min' => $rule['min']]); //* on ajoute une erreur
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) { //* si ruleName = max et value est superieur a max
                    $this->addErrorByRule($attribute, self::RULE_MAX); //* on ajoute une erreur
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) { //* si ruleName = match et value n'est pas egale a match
                    $this->addErrorByRule($attribute, self::RULE_MATCH, ['match' => $rule['match']]); //* on ajoute une erreur
                }
                if ($ruleName === self::RULE_UNIQUE) { //* si ruleName = unique
                    $className = $rule['class']; //* className = User
                    $uniqueAttr = $rule['attribute'] ?? $attribute; //* uniqueAttr = name
                    $tableName = $className::tableName(); //* tableName = users
                    $db = Application::$app->db;
                    $statement = $db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :$uniqueAttr"); //* statement = SELECT * FROM users WHERE name = :name
                    $statement->bindValue(":$uniqueAttr", $value); //* statement = SELECT * FROM users WHERE name = name
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        $this->addErrorByRule($attribute, self::RULE_UNIQUE); //* on ajoute une erreur
                    }
                }
            }
        }
        return empty($this->errors);
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'Record with with this {field} already exists',
        ];
    }

    public function errorMessage($rule)
    {
        return $this->errorMessages()[$rule];
    }

    protected function addErrorByRule(string $attribute, string $rule, $params = []) 
    {
        $params['field'] ??= $attribute; //* si params['field'] n'existe pas on le cree avec attribute -> if( !isset($params['field'])) { $params['field'] = $attribute; }
        $errorMessage = $this->errorMessage($rule); //* errorMessage = This field is required
        foreach ($params as $key => $value) { //* foreach ($params as $key => $value) { $key = 'min'; $value = '5'; }
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage); //* errorMessage = This field must be valid email address
        }
        $this->errors[$attribute][] = $errorMessage; //* errors[name][] = This field is required
    }

    public function addError(string $attribute, string $message) //* ajoute une erreur
    {
        $this->errors[$attribute][] = $message; //* errors[name][] = This field is required
    }

    public function hasError($attribute)
    {
        // echo '<pre>';
        // print_r($this->errors) ;
        // echo '</pre>';
        // exit ;
        return $this->errors[$attribute] ?? false; //* si errors[name] existe on le renvoie sinon on renvoie false
    }

    public function getFirstError($attribute)
    {
        $errors = $this->errors[$attribute] ?? []; //* si errors[name] existe on le renvoie sinon on renvoie false
        return $errors[0] ?? ''; //* si errors[name][0] existe on le renvoie sinon on renvoie false
    }
}

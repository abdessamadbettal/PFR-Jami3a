<?php

/**
 * User: Abdessamad
 * Date: 7/9/2020
 * Time: 7:05 AM
 */

namespace app\core\form;


use app\core\Model;

/**
 * Class Form
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package core\form
 */
class Form
{
    public static function begin($action, $method, $options = []) 
    {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "$key=\"$value\"";
        }
        // echo '<pre>';
        // var_dump($attributes);
        // echo '</pre>';
        // exit ;
        echo sprintf('<form action="%s" method="%s" %s enctype="multipart/form-data">', $action, $method, implode(" ", $attributes));
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute , $options) //* $form->field($model, 'firstname' , ['input' => 'votre prenom'])
    {
        // echo "<pre>";
        // print_r($options);
        // echo "</pre>";
        return new Field($model, $attribute , $options);
    }
}

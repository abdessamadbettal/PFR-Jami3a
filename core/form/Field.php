<?php

/**
 * User: Abdessamad
 * Date: 7/9/2020
 * Time: 7:05 AM
 */

namespace app\core\form;


use app\core\Model;

/**
 * Class Field
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package core\form
 */
class Field extends BaseField
{
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_FILE = 'file';

    /**
     * Field constructor.
     *
     * @param \app\core\Model $model
     * @param string          $attribute
     */
    public function __construct(Model $model, string $attribute ,$options)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute , $options );
    }

    public function renderInput($option , $value ='')
    {
        // echo '<pre>';
        // print_r($this->model->{$this->attribute});
        // echo '</pre>';
        if ($option == 'input' ) {
            return sprintf(
                '<input type="%s" class="form-control%s" name="%s" placeholder="%s" value="%s">',
                $this->type,
                $this->model->hasError($this->attribute) ? ' is-invalid' : '', //* if has error, add class is-invalid
                $this->attribute,
                $value ,
                $this->model->{$this->attribute},
            );
        }
        if ($option == 'select' ) {
            echo '<pre>';
            print_r($this->model->{$this->attribute});
            echo '</pre>';
            // echo  $this->model->{$this->attribute} ;
            return sprintf(
                '<option %s value="%s">%s</option>' ,
                $this->model->{$this->attribute}? 'selected' : '' ,
                $this->model->{$this->attribute} ,
                $this->model->{$this->attribute}
            ) ;
            
        }
         
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        // echo "<pre>";
        // var_dump($this) ;
        // echo "</pre>";
        // exit ;
        return $this; //* return this object 'model , user  , field ,
    }

    public function fileField()
    {
        $this->type = self::TYPE_FILE;
        return $this;
    }
}

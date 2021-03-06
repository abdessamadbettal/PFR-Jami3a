<?php

/**
 * User: Abdessamad
 * Date: 7/26/2020
 * Time: 3:49 PM
 */

namespace app\core\form;


use app\core\Model;

/**
 * Class BaseField
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\core\form
 */
abstract class BaseField
{

    public Model $model;
    public string $attribute;
    public string $type;
    public $options = [];
    /**
     * Field constructor.
     *
     * @param \app\core\Model $model
     * @param string          $attribute
     */
    public function __construct(Model $model, string $attribute, $options)
    {
        // echo '<pre>';
        // print_r($options);
        // echo '</pre>';
    // echo $model->{$attribute};
    // exit    ;
// echo $attribute;

        $this->options = $options;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        // echo $this->attribute ;
        // echo '<pre>';
        // print_r($this->options);
        // echo '</pre>';
        foreach ($this->options as $option => $value) {
            // echo '<pre>';
            // print_r($option);
            // echo '</pre>';
            // exit ;
            // echo "$option <br>";
            // echo "$value <br>";
            // exit ;
            if ($option == 'input' ) {
                return sprintf(
                    '<div class="form-group">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div>',
                    $this->model->getLabel($this->attribute), //* first name , last name , email , password of the label
                    $this->renderInput($option , $value), //* input
                    $this->model->getFirstError($this->attribute)
                ) ;
            } 
            if ($option == 'select') {
                echo '<pre>';
            // var_dump($value);
            echo '</pre>';
            // exit ;
                return sprintf(
                    '<div class="form-group">
                        <select name="%s" class="form-select" aria-label="Default select example">
                            %s
                        </select>
                <div class="invalid-feedback">
                    %s
                </div>
            </div>',
                    $this->attribute,
                    $this->renderInput($option , $value),
                    $this->model->getFirstError($this->attribute)
                ) ;
            }
        }
    } 

    abstract public function renderInput($option , $value);
}

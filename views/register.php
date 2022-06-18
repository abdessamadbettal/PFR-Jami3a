<?php

/** @var $model \app\core\Model */

use app\core\form\Form;

$form = new Form();
?>

<h1>Register</h1>

<?php $form = Form::begin('', 'post') ?>
<div class="row">
    <div class="col">
        <?php /* var_dump($model) */ ?>
        <?php echo $form->field($model, 'firstname' , ['input' => 'votre prenom']) ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastname' , ['input' => 'votre nom']) ?>
    </div>
</div>
<?php echo $form->field($model, 'email' , ['input' => 'votre email']) ?>
<?php echo $form->field($model, 'password' , ['input' => 'password'])->passwordField() ?>
<?php echo $form->field($model, 'passwordConfirm' , ['input' => 'confirmer password'])->passwordField() ?>
<button class="btn btn-success">Submit</button>
<?php Form::end() ?>
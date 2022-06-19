<?php

/** @var $model \app\core\Model */

use app\core\form\Form;

$form = new Form();
?>
    <section class="container mt-5">
    <div class="row mt-4 bg-light bg-gradient">

    <div class="col-12 col-md-6 order-md-last order-first">
        <img src="img/fill-out-animate.svg" alt="">
    </div>
    <div class="col-12 col-md-6 p-3">
        <h1>Register</h1>

        <?php $form = Form::begin('', 'post') ?>
        <div class="row">
            <div class="col">
                <?php /* var_dump($model) */ ?>
                <?php echo $form->field($model, 'firstname', ['input' => 'votre prenom']) ?>
            </div>
            <div class="col">
                <?php echo $form->field($model, 'lastname', ['input' => 'votre nom']) ?>
            </div>
        </div>
        <?php echo $form->field($model, 'email', ['input' => 'votre email']) ?>
        <?php echo $form->field($model, 'password', ['input' => 'password'])->passwordField() ?>
        <?php echo $form->field($model, 'passwordConfirm', ['input' => 'confirmer password'])->passwordField() ?>
        <div class="d-flex justify-content-center py-3 "><button class="btn btn-success ">ajouter un admin</button></div>
        <?php Form::end() ?>
    </div>

</div>

</section>
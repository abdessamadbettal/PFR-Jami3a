<?php

/** @var $model \app\models\LoginForm */

use app\core\form\Form;

?>

        <section class="container pt-3">
            <div class="row">
                <div class="col-12 col-md-6  d-flex align-items-center justify-content-center bg-light pb-3">
                    <div  class="w-75">
                        <p class="h1 fw-bold mb-md-4">se connecter</p>
                        <?php $form = Form::begin('', 'post') ?>
                            <div class="mb-3">
                                <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                                <?php echo $form->field($model, 'email') ?>
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="email ..."> -->
                            </div>
                            <div class="mb-3">
                                <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                                <?php echo $form->field($model, 'password')->passwordField() ?>
                                <!-- <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="password ..."> -->
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-50 mt-2 " id="button-login">connecter</button>

                            </div>
                            <?php Form::end() ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-last order-first">
                    <img src="img/secure-login-animate.svg" alt="" srcset="">
                </div>
            </div>

        </section>

   
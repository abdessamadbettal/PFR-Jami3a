<?php

/** @var $model \app\models\PublierForm */

use app\core\form\Form;

?>
 
   
   <!-- ? puplication -->
    <section class="container mt-5">
      <div class="row mt-4 bg-light bg-gradient">
        <div class="col-12 col-md-6 order-md-last order-first">
          <img src="img/pizza-sharing-animate.svg" alt="" srcset="">
      </div>
      <div class="col-12 col-md-6 ">
        <div class="text-center text-capitalize h2 fw-bold">Publiez vos documents</div>
        <p class="text-center h6 p-2">📖 Vous pouvez maintenant publier vos propre documents
          cours , TD , TP , exemns , councours etc …
          pour aider les autres étudiants a d'autres facultés</p>
          
          <?php $Form = Form::begin('', 'post' ) ?>
            <!-- <p>Please login to your account</p> -->
            <div class="form-outline ">
              <!-- <label class="form-label" for="form2Example11"></label> -->
              <input type="file" id="form2Example11" class="form-control" placeholder="télécharger fichier" />
              <?php echo $Form->field($model, 'title' , ['input' => 'titre de document']) ;
              // echo '<pre>' ;
              // var_dump($model);
              // echo '</pre>' ;
               ?>
              <!-- <input type="text" id="form2Example11" class="form-control mt-2" placeholder="nom de document" /> -->
            </div>
            <div class="d-flex flex-row justify-content-between mt-2">



              <div class="form-outline w-50 ">
                <select name="fk_specialite" class="form-select" aria-label="Default select example">

                  <option value="1">biologie</option>
                  <option value="2">économie</option>
                  <!-- <option selected>spécialité ...</option> -->
                  <option value="droit">droit</option>
                  <option value="chimie">chimie</option>
                  <option value="physique">physique</option>
                  <option value="informatique">informatique</option>
                </select>
              </div>
              <div class="form-outline w-50 ">
                <select name="fk_modele" class="form-select" aria-label="Default select example">                
                  <option selected>modele ...</option>
                  <option value="1">genetique</option>
                  <option value="2">comtabilite</option>
                  <option value="3">immunologie</option>
                  <option value="4">microbiologie</option>           
                </select>
              </div>
              <div class="form-outline w-50 ">
              <?php echo $Form->field($model, 'annees' , ['select' => '']) ; ?>
                
                <!-- <select name="annees" class="form-select" aria-label="Default select example">

                  <option selected>annéé ...</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                </select> -->
              </div>
              <div class="form-outline w-50 ">
                <select name="type" class="form-select" aria-label="Default select example">

                  <option selected>catégorie ...</option>
                  <option value="cour">COUR</option>
                  <option value="td">TD</option>
                  <option value="tp">TP</option>
                  <option value="exemns">EXMENS</option>
                </select>
              </div>

            </div>
            <div class="d-flex justify-content-between align-items-end  mt-2">
              <div class="form-outline w-100">
                <select name="etablissement" class="form-select" aria-label="Default select example">

                  <option selected>école ...</option>
                  <option value="caddy">caddy ayyad</option>
                  <option value="ibnzohr">ibn zohr</option>
                  <option value="ibntofayl">ibn tofayl</option>
                  <option value="benmsiq">ibn msique</option>
                </select>
              </div>
              <div class="form-outline w-100 ">
                <select name="ville" class="form-select" aria-label="Default select example">

                  <option selected>vile ...</option>
                  <option value="casablanca">casablanca</option>
                  <option value="adadir">agadir</option>
                  <option value="knitra">knitra</option>
                  <option value="safi">safi</option>
                </select>
              </div>
              <div class="form-outline w-100">
                <select name="semestre" class="form-select" aria-label="Default select example">

                  <option selected>niveau ...</option>
                  <option value="S1">S1</option>
                  <option value="S2">s2</option>
                  <option value="S3">s3</option>
                  <option value="S4">s4</option>
                  <option value="S5">s5</option>
                  <option value="S6">s6</option>
                </select>
              </div>
            </div>
            <div class="form-outline  mt-2">
              <!-- <label class="form-label" for="form2Example11">Nom de proffesseur</label> -->
              <?php echo $Form->field($model, 'prof' , ['input' => 'votre prof']) ; ?>
              <!-- <input type="text" name="prof" id="form2Example11" class="form-control" placeholder="Nom de proffesseur" /> -->
            </div>

            <!-- <div class="text-center pt-1  pb-1">
              <button class="btn btn-primary btn-block fa-lg  mb-3 w-100" type="submit"
                id="gradient-custom-2">Publier</button>
               <a class="text-muted" href="#!">Forgot password?</a>
            </div> -->



            <div class="d-flex justify-content-center py-3 ">
              
              <button type="submit" class="btn btn-danger ">Puplier
                maintenant</button>
            </div>
            <?php Form::end() ?>

          
          
        </div>
      </div>

    </section>
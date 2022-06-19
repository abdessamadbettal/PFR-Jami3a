<!-- !sidebar ********************* -->
<?php

use app\core\Application; ?>


<div class="container d-md-flex justify-content-between">
  <!-- Page Content  -->
  <div class="d-flex flex-column w-100">
    <h2 class="pt-2">Les cours de biologie</h2>
    <div class="container-fluid bg-light  " id="bg-filter">
      <form action="" method="GET" name="frm">
        <div class="row justify-content-evenly px-3 ">

          <div class="col-12 col-md-4 pt-1 py-md-2">
            <select class="form-select border-0  " name="specialite" id="specialite" aria-label="Default select example">
              <option selected>spécialité</option>
              <?php foreach ($specialites as $specialite) : ?>
                <option value="<?= $specialite['specialite'] ?>"><?= $specialite['specialite'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-12 col-md-4 pt-1 py-md-2">
            <select class="form-select  " name="modules" id="modules" aria-label="Default select example">
              <option value="" selected>all modul</option>
              <?php /* foreach($modules as $module) : */ ?>
              <!-- <option value="<?php /*echo $module['modele_id']?>"><?= $module['modele']; */ ?></option> -->
              <?php /* endforeach ; */ ?>
            </select>
          </div>
          <div id="searchButton" class="col-12 col-md-4 pt-1 pb-1 py-md-2">

            <!-- <select class="form-select" name="category" id="category" aria-label="Default select example">
      <option selected>all category</option>
      <option value="1">cours</option>
      <option value="2">tp/td</option>
      <option value="3">exmens</option>
    </select> -->
          </div>
        </div>
      </form>





    </div>

    <div class="d-flex flex-row justify-content-between flex-wrap">
      <div>
        <h1 class="text-star h3 pt-3"> biologie : cours génétique S4 </h1>
      </div>

      <?php if (!Application::isGuest()) : ?>
        <div><a href="/publier"><button type="submit" class="btn btn-primary w-50 mt-2 w-100 " id="button-login">add document</button></a></div>
      <?php endif; ?>

    </div>


    <!-- //! pdf card -->
    <?php foreach ($documents as $document) : ?>
      <div class="bg-light bg-gradient mt-2 me-1 " id="card-pdf">
        <div class="row">
          <div class="col-4 col-md-3" style="width: 100px;">
            <a href="">
              <img src="files/<?= $document['name'] ?>" class="w-100" alt="">
            </a>

          </div>
          <div class="col-8 col-md-9 ">
            <a href="/document?id=<?= $document['document_id'] ?>" class="text-decoration-none">

              <h2 class="fw-bold h6 mt-1 " id="title-document"><?php echo $document['title'] ?></h2>

            </a>
            <div class="d-flex flex-row justify-content-between justify-content-md-around">

              <div class="">
                <!-- <div class="d-flex flex-row  align-items-center"> -->
                <!-- <i class="fa-solid fa-person-dots-from-line fa-xs m-0"></i> -->
                <!-- <p class="h6 mt-2 m-0 bg-danger p-1 rounded-2 text-white" style="font-size:10px;">biologie cellulaire</p> -->
                <!-- </div> -->
                <div class="d-flex flex-row  align-items-center">
                  <i class="fa-solid fa-person-dots-from-line fa-xs  mt-1 pe-2"></i>
                  <p class="h6 mt-2  m-0" style="font-size:10px;"><?php echo $document['prof'] ?></p>
                </div>
                <div class="d-flex flex-row  align-items-center">
                  <i class="fa-solid fa-lines-leaning fa-xs  mt-1 pe-2"></i>
                  <p class="h6 mt-2  m-0" style="font-size:10px;"><?php echo $document['modele'] ?></p>
                </div>

                <div class="d-flex flex-row  align-items-center">
                  <i class="fa-solid fa-building-columns fa-xs mt-1 pe-2"></i>
                  <p class="h6 mt-2 m-0" style="font-size:10px;"><?php echo $document['etablissement'] ?></p>
                </div>



              </div>

              <div class="">

                <div class="d-flex flex-row  align-items-center">
                  <i class="fa-solid fa-file fa-xs mt-1 pe-2"></i>
                  <p class="h6 mt-2 m-0" style="font-size:10px;"><?php echo $document['category'] ?></p>
                </div>
                <div class="d-flex flex-row  align-items-center">
                  <i class="fa-solid fa-location-dot fa-xs mt-1 pe-2"></i>
                  <p class="h6 mt-2 m-0" style="font-size:10px;"><?php echo $document['ville'] ?></p>
                </div>

                <div class="d-flex flex-row  align-items-center">
                  <i class="fa-solid fa-calendar fa-xs mt-1 pe-2"></i>
                  <p class="h6 mt-2 m-0" style="font-size:10px;"><?php echo $document['annees'] ?></p>
                </div>
              </div>


            </div>
            <!-- button -->
            <?php if (!Application::isGuest()) : ?>
              <div class="row mt-3 justify-content-center mb-2">
                <div class="d-flex flex-row justify-content-evenly w-75">
                  <a href="/deletdocument?id=<?php echo $document['document_id'] ?>"><button class="btn btn-dark btn-sm rounded-3 border-2 fw-bolder py-0 ">delete</button></a>
                  <a href="/updatedocument?id=<?php echo $document['document_id'] ?>"><button class="btn btn-primary btn-sm rounded-3 border-2 fw-bolder py-0 ">update</button></a>
                  <?php if ($document['status'] == 0) : ?>
                    <a href="/acceptdocument?id=<?php echo $document['document_id'] ?>"><button class="btn btn-success btn-sm rounded-3 border-2 fw-bolder py-0 ">accept</button></a>
                  <?php endif; ?>
                  <?php if ($document['status'] == 1) : ?>
                    <a href="/masquerdocument?id=<?php echo $document['document_id'] ?>"><button class="btn btn-danger btn-sm rounded-3 border-2 fw-bolder py-0 ">masquer</button></a>
                  <?php endif; ?>
                  <a href=""><button class="btn btn-info btn-sm rounded-3 border-2 fw-bolder py-0 ">load</button></a>
                </div>

              </div>
            <?php endif; ?>
            <!--  -->

          </div>
        </div>


      </div>
    <?php endforeach; ?>

    <!--  -->
  </div>

  <!-- //! side bar -->
  <nav id="sidebar" class="">
    <div class="p-4 pt-5 ">
      <h5 id="sadebar-title">autres modules</h5>
      <ul class="list-unstyled components mb-5">
        <?php foreach ($modules as $module) : ?>
          <li>
            <a href="#pageSubmenu<?= $module['modele_id']; ?>" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-decoration-none"><?= $module['modele']; ?></a>
            <ul class="collapse list-unstyled" id="pageSubmenu<?= $module['modele_id']; ?>">
              <li><a href="/libirary?specialite=<?= $module['specialite']; ?>&modules=<?= $module['modele_id']; ?>&category=cour" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
              </li>
              <li><a href="/libirary?specialite=<?= $module['specialite']; ?>&modules=<?= $module['modele_id']; ?>&category=td" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                  dirigés</a></li>
              <li><a href="/libirary?specialite=<?= $module['specialite']; ?>&modules=<?= $module['modele_id']; ?>&category=tp" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                  pratiques</a></li>
              <li><a href="/libirary?specialite=<?= $module['specialite']; ?>&modules=<?= $module['modele_id']; ?>&category=examen" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
              </li>
            </ul>
          </li>
        <?php endforeach; ?>

      </ul>
      <div class="mb-5">
        <h5 id="sadebar-title">d'autres spécialité</h5>
        <div class="tagcloud">
          <?php foreach ($specialites as $specialite) : ?>
            <a href="/libirary?specialite=<?= $specialite['specialite'] ?>" class="tag-cloud-link text-decoration-none"><?= $specialite['specialite'] ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="container mt-5">
        <div class="row mt-4 bg-light bg-gradient">
          <div class="text-center text-capitalize text-dark h6 fw-bold">Publiez vos documents</div>
          <p class="text-center text-dark h6 p-2">📖 Vous pouvez maintenant publier vos propre documents
            cours , TD , TP , exemns , councours etc …
            pour aider les autres étudiants a d'autres facultés</p>
          <div class="d-flex justify-content-center pb-4 ">
            <a href="/publier"><button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#publier">Puplier
                maintenant</button></a>
          </div>


        </div>

      </div>
<?php foreach ($documents as $document): ?>

    <!-- !sidebar ********************* -->
    <div class="container d-md-flex justify-content-between">
      <!-- Page Content  -->
      <div class="d-flex flex-column w-100">
        <h2 class="pt-2">Les cours de biologie</h2>
        <div class="container-fluid bg-light  d-flex flex-row align-items-center " style="height: 50px;" id="bg-filter">
          <a href="/" class="fw-normal text-decoration-none">acceuil</a>><a href="/libirary?specialite=<?= $document['specialite'] ?>" class="fw-normal text-decoration-none"><?= $document['specialite'] ?></a>><a href="/libirary?specialite=<?= $document['specialite'] ?>" class="fw-normal text-decoration-none"><?= $document['modele'] ?></a>><a href="#" class="fw-normal text-decoration-none"><?= $document['title'] ?></a>
          <!-- <div class="row justify-content-evenly px-3 "> -->

            <!-- <div class="col-12 col-md-4 pt-1 py-md-2">
              <select class="form-select border-0  " id="select-filter" aria-label="Default select example">
                <option selected>spécialité</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-12 col-md-4 pt-1 py-md-2">
              <select class="form-select  " id="select-filter" aria-label="Default select example">
                <option selected>all modul</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-12 col-md-4 pt-1 pb-1 py-md-2">
              <select class="form-select  " id="select-filter" aria-label="Default select example">
                <option selected>all category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div> -->




          <!-- </div> -->

        </div>
        <div>
          <h1 class="text-star h3 pt-3"> <?= $document['specialite'] ?> : <?= $document['category'] ?> de <?= $document['modele'] ?> <?= $document['semestre'] ?> </h1>
        </div>

        <div class="bg-light container p-4" id="bg-filter">
          <div class="row">
          <h1 id="title-border" class="text-center fw-bold"><?= $document['title'] ?></h1>
          </div>
          <div class="row">
            <div class="col-12 col-md-4">
              <img src="files/<?= $document['name'] ?>" class="w-100" alt="">

            </div>
            

              <div class="col-12 col-md-8 mt-md-0 mt-2  ">
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/category.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">specialite :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['specialite'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/man-talking-by-mic-on-a-presentation.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">prof :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['prof'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/location.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">ville :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['ville'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/university-building.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">établissement :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['etablissement'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/recycle.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">semestre :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['semestre'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/document.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">pages :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['page'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/document.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">type :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['type'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/semester.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">modele :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['modele'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/calendar.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">année :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['annees'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/pie-chart.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">taille :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['size'] ?></h6>
                </div>
                <div class="d-flex flex-row  align-items-center  px-2 pt-1 ">
                  <div>
  
                    <img src="img/extension.png" style="width: 20px;" class="mb-2" alt="">
                  </div>
                  <h6 class="px-3 fw-bold">extension :</h6>
                  <h6 class="mx-auto fw-bold"><?= $document['type'] ?></h6>
                </div>
                
              </div>
              
            
              
          </div>
          <div class="row mt-3 justify-content-center ">
            <div class="d-flex flex-row justify-content-evenly w-75">
              <a href=""><button class="btn btn-outline-danger rounded-3 border-2 fw-bolder py-0 ">partager</button></a>
              <a href=""><button class="btn btn-outline-danger rounded-3 border-2 fw-bolder py-0 ">lire</button></a>
              <a href=""><button class="btn btn-outline-danger rounded-3 border-2 fw-bolder py-0 ">download</button></a>
            </div>
            
          </div>

        </div>
        
        
        
        
        
        
      </div>
      
      <?php endforeach ; ?>

      <!-- //! side bar -->
      <nav id="sidebar" class="">
        <div class="p-4 pt-5 ">
          <h5 id="sadebar-title">autres modules</h5>
          <ul class="list-unstyled components mb-5">
            <?php foreach($modules as $module) : ?>
            <li>
              <a href="#pageSubmenu<?= $module['modele_id']; ?>" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none"><?= $module['modele']; ?></a>
              <ul class="collapse list-unstyled" id="pageSubmenu<?= $module['modele_id']; ?>">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <?php endforeach ; ?>
            
          </ul>
          <div class="mb-5">
            <h5 id="sadebar-title">d'autres spécialité</h5>
            <div class="tagcloud">
            <?php foreach($specialites as $specialite) : ?>
              <a href="/libirary?specialite=<?= $specialite['specialite'] ?>" class="tag-cloud-link text-decoration-none"><?= $specialite['specialite'] ?></a>
              <?php endforeach ; ?>
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
          <!-- <div class="mb-5">
            <h5 id="sadebar-title">Newsletter</h5>
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <div class="icon"><span class="icon-paper-plane"></span></div>
                <input type="text" class="form-control" placeholder="Enter Email Address">
              </div>
            </form>
          </div> -->
        </div>
      </nav>
      <!-- <nav id="sidebar" class="">
        <div class="p-4 pt-5 ">
          <h5 id="sadebar-title">autres modules</h5>
          <ul class="list-unstyled components mb-5">
            <li>
              <a href="#pageSubmenu1" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">biologie cellulaire</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu2" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">biologie animales</a>
              <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu3" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">immunologie</a>
              <ul class="collapse list-unstyled" id="pageSubmenu3">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"> <span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"> <span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"> <span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">biologie végitale</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">génitique</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">biochimie</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">geologie externe</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">geologie interne</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">geologie génerale</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">ecotixocolgie</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#pageSubmenu4" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-decoration-none">envirennement</a>
              <ul class="collapse list-unstyled " id="pageSubmenu4">
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> cours </a>
                </li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> travaux
                    pratique</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> Travaux
                    dirigés</a></li>
                <li><a href="#" class="text-decoration-none"><span class="fa fa-chevron-right mr-2"></span> exmens</a>
                </li>
              </ul>
            </li>
          </ul>
          <div class="mb-5">
            <h5 id="sadebar-title">d'autres spécialité</h5>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link text-decoration-none">économie</a>
              <a href="#" class="tag-cloud-link text-decoration-none">droit arab</a>
              <a href="#" class="tag-cloud-link text-decoration-none">geographie</a>
              <a href="#" class="tag-cloud-link text-decoration-none">biologie</a>
              <a href="#" class="tag-cloud-link text-decoration-none">mathematique</a>
              <a href="#" class="tag-cloud-link text-decoration-none">informatique</a>
              <a href="#" class="tag-cloud-link text-decoration-none">phisique</a>
              <a href="#" class="tag-cloud-link text-decoration-none">chimie</a>
            </div>
          </div>
          <div class="container mt-5">
            <div class="row mt-4 bg-light bg-gradient">
              <div class="text-center text-capitalize text-dark h6 fw-bold">Publiez vos documents</div>
              <p class="text-center text-dark h6 p-2">📖 Vous pouvez maintenant publier vos propre documents
                cours , TD , TP , exemns , councours etc …
                pour aider les autres étudiants a d'autres facultés</p>
              <div class="d-flex justify-content-center pb-4 ">
                <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#publier">Puplier
                  maintenant</button>
              </div>


            </div>

          </div>
          
        </div>
      </nav> -->
    </div>


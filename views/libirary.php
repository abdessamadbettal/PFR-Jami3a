


    <!-- !sidebar ********************* -->
    <div class="container d-md-flex justify-content-between">
      <!-- Page Content  -->
      <div class="d-flex flex-column w-100">
        <h2 class="pt-2">Les cours de biologie</h2>
        <div class="container-fluid bg-light  " id="bg-filter">
          <form action="" method="POST" name="frm">
  <div class="row justify-content-evenly px-3 ">

  <div class="col-12 col-md-4 pt-1 py-md-2">
    <select class="form-select border-0  " name="specialite" id="specialite" aria-label="Default select example">
      <option selected>spécialité</option>
      <?php foreach($specialites as $specialite) : ?>
      <option value="<?= $specialite['specialite_id'] ?>"><?= $specialite['specialite'] ?></option>
      <?php endforeach ; ?>
    </select>
  </div>
  <div class="col-12 col-md-4 pt-1 py-md-2">
    <select class="form-select  " name="modules" id="modules" aria-label="Default select example">
      <!-- <option selected>all modul</option> -->
      <?php /* foreach($modules as $module) : */ ?>
      <!-- <option value="<?php /*echo $module['modele_id']?>"><?= $module['modele']; */ ?></option> -->
      <?php /* endforeach ; */ ?>
    </select>
  </div>
  <div id="category"  class="col-12 col-md-4 pt-1 pb-1 py-md-2">
  
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
        <?php use app\core\Application; ?>

        <div class="d-flex flex-row justify-content-between flex-wrap">
            <div>
              <h1 class="text-star h3 pt-3"> biologie : cours génétique S4 </h1>
            </div>
            
            <?php if (!Application::isGuest()): ?>
            <div><a href="/publier"><button type="submit" class="btn btn-primary w-50 mt-2 w-100 " id="button-login">add document</button></a></div>
            <?php endif ; ?>

        </div>
        
        
        <!-- //! pdf card -->
        <?php foreach($documents as $document) : ?>
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
          <?php if (!Application::isGuest()): ?>
          <div class="row mt-3 justify-content-center mb-2">
            <div class="d-flex flex-row justify-content-evenly w-75">
              <a href="/deletdocument?id=<?php echo $document['document_id'] ?>"><button class="btn btn-outline-danger btn-sm rounded-3 border-2 fw-bolder py-0 ">delete</button></a>
              <a href="/updatedocument?id=<?php echo $document['document_id'] ?>"><button class="btn btn-outline-danger btn-sm rounded-3 border-2 fw-bolder py-0 ">update</button></a>
              <a href="/acceptdocument?id=<?php echo $document['document_id'] ?>"><button class="btn btn-outline-danger btn-sm rounded-3 border-2 fw-bolder py-0 ">accept</button></a>
              <a href=""><button class="btn btn-outline-danger btn-sm rounded-3 border-2 fw-bolder py-0 ">load</button></a>
            </div>
            
          </div>
          <?php endif ; ?>
          <!--  -->

            </div>
          </div>

          
        </div>
        <?php endforeach ; ?>

        <!--  -->
      </div>

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
    </div>
    <!-- **********************introduction *********** -->
    <!-- <div class="" id="introduction">
      <h1 class="fs-2  text-warning text-center" id="intro1">Bienvenue dans le meilleur plaforme </h1>
      <h1 class="fs-2 fw-bold  text-warning text-center" id="intro2">pour les étudiants ....</h1>
    </div> -->
    <!-- ******************* search bar************* -->
    <!-- <section class="" id="search-bar">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <form action="">

              <div class="input-group">
                <input type="search" placeholder="councours , cours , formation ..." class="form-control"> -->

    <!-- * single danger button  -->
    <!-- <div class="btn-group d-flex flex-row ">
                  <div>
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Catégorie
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#"><i class="fa-solid fa-book-open me-2"></i>Cours</a></li>
                      <li><a class="dropdown-item" href="#"><i class="fa-solid fa-bullhorn me-2"></i>Councours</a>
                      </li>
                      <li><a class="dropdown-item" href="#"><i class="fa-solid fa-school-flag me-2"></i>écoles</a>
                      </li>
                    </ul>
                  </div>
                  <div class="input-group">
                    <button type="submit" class="btn btn-link"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
                </div>


              </div>

            </form>
          </div>
        </div>
      </div>
    </section> -->
    <!-- <div class="container d-md-flex align-items-stretch">
       Page Content  
      <div class="d-flex flex-column">
        <div id="content" class="p-4 p-md-5 pt-5">
          <h2 class="mb-4">Sidebar #08</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
        </div>
        
        
      </div> -->



      
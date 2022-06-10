<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="bootstrap/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <title><?php echo $this->title ?></title>
</head>

<body>
  <header class="sticky-top ">


    <nav class="navbar navbar-expand-md bg-dark navbar-dark container-fluid">
      <div class="container-fluid d-flex flex-row">
        <!-- ********* logo ******** -->
        <div>
          <a class="navbar-brand fs-3 fw-bold" href="/">
            <!-- <img src="design/icon-jami3a.png" height="40" alt=""> -->
            <img src="img/title-jami3a.png" height="45" alt="">
          </a>
        </div>


        <?php

        use app\core\Application;

        if (Application::isGuest()) : ?>
          <div class="justify-content-end">
            <a href="login"><button type="button" class="btn btn-danger ">connecter</button></a>
          </div>
        <?php else : ?>
          <li class="nav-item active">
            <p class="nav-link">
              <!-- Welcome <?php  /* echo Application::$app->user->getDisplayName() */ ?>  -->
            </p>
          </li>
          <div class="justify-content-end">
            <a href="/logout"><button type="button" class="btn btn-danger ">deconnecter</button></a>
          </div>
        <?php endif; ?>
    </nav>
  </header>
  <main>





    <div class="container">
      <?php if (Application::$app->session->getFlash('success')) : ?>
        <div class="alert alert-success">
          <p><?php echo Application::$app->session->getFlash('success') ?></p>
        </div>
      <?php endif; ?>
      {{content}}
    </div>

  </main>

  <footer class="bg-dark text-center text-white mt-5">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- telegram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-telegram"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>


      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="text-white" href="#">jami3a.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/main.js"></script>

  <!-- <script type="text/javascript">
 
  </script> -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
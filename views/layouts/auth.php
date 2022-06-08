<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        <!-- ************* modal boton ************ -->
        <?php use app\core\Application;

        if (Application::isGuest()): ?>
        <div class="justify-content-end">
          <!-- <a href="login"><button type="button" class="btn btn-danger ">connecter</button></a> -->
        </div>
        <?php else : ?>
            <li class="nav-item active">
                    <p class="nav-link" >
                        Welcome <?php echo Application::$app->user->getDisplayName() ?> 
                    </p>
                </li>
            <div class="justify-content-end">
            <!-- <a href="/logout"><button type="button" class="btn btn-danger ">deconnecter</button></a> -->
        </div>
        <?php endif; ?>
    </nav>
  </header>
  <main>

          {{content}}
<!-- <div class="container">
</div> -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
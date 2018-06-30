<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $tpl->basePath; ?>/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <title>
    <?php if (isset($tpl->PageTitle)) {
    echo $tpl->PageTitle;
} ?>
  </title>
</head>

<body>
  <div class="container-fluid d-flex flex-column justify-content-between">
    <header class="blog-header row navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-around align-items-center mb-5">
      <h1 class="blog-author navbar-brand">Jean Forteroche</h1>
      <nav class="blog-header-nav d-flex justify-content-between align-items-center">
        <nav class="blog-nav">
          <ul class="nav navbar-nav d-flex justify-content-between align-items-center">
            <li>
              <a href="<?= $tpl->basePath; ?>/" class="home btn btn-light mr-3">
                <i class="fas fa-home"></i> Accueil
              </a>
            </li>
            <?php if ($tpl->isConnected === false) : ?>
            <li>
              <a href="<?= $tpl->basePath; ?>/login" class="connection btn btn-light mr-3">
                <i class="fas fa-sign-in-alt"></i> Connexion
              </a>
            </li>
            <li>
              <a href="<?= $tpl->basePath; ?>/signup" class="registration btn btn-light">
                <i class="fas fa-edit"></i> Inscription
              </a>
            </li>
            <?php endif; ?>
            <?php if ($tpl->isConnected === true && $tpl->isAdmin === true) : ?>
            <li>
              <a href="<?= $tpl->basePath; ?>/admin/post/create" class="creation btn btn-dark mr-3">
                <i class="fas fa-pencil-alt"></i> Création
              </a>
            </li>
            <?php endif; ?>
            <?php if ($tpl->isConnected === true) : ?>
            <li>
              <a href="<?= $tpl->basePath; ?>/disconnection" class="disconnection-admin btn btn-dark">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </nav>
    </header>
    <?php 
      if (isset($tpl->ContentBody)) {
          include $tpl->ContentBody;
      }
    ?>
    <footer class="page-footer row d-flex flex-column bg-dark text-light pt-4 mt-4">
      <div class="container text-center text-md-left">
        <div class="row d-flex justify-content-between">
          <div class="book-summary col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
            <h5 class="font-weight-bold text-uppercase mb-4">Book summary</h5>
            <p>Here you can use rows and columns here to organize your book summary.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident voluptate esse quasi,
              veritatis totam voluptas nostrum.</p>
          </div>
          <hr class="clearfix w-100 d-md-none">
          <div class="contact-infos col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
            <h5 class="font-weight-bold text-uppercase mb-4">Contact Information</h5>
            <ul class="list-unstyled">
              <li>
                <p>
                  <i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
              </li>
              <li>
                <p>
                  <i class="fa fa-envelope mr-3"></i> info@example.com</p>
              </li>
              <li>
                <p>
                  <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
              </li>
              <li>
                <p>
                  <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
              </li>
            </ul>
          </div>
          <hr class="clearfix w-100 d-md-none">
          <div class="row d-flex flex-column justify-content-between col-md-3 col-lg-3 text-center ml-auto my-md-4 my-0 mt-4 mb-1 pb-4">
            <div class="social-networks">
              <h5 class="font-weight-bold text-uppercase mb-4">Follow Me</h5>
              <a type="button" class="btn-floating btn-fb rounded-circle mr-3">
                <i class="fab fa-facebook fa-2x"></i>
              </a>
              <a type="button" class="btn-floating btn-tw rounded-circle mr-3">
                <i class="fab fa-twitter fa-2x"></i>
              </a>
              <a type="button" class="btn-floating btn-youtube rounded-circle">
                <i class="fab fa-youtube fa-2x "></i>
              </a>
            </div>
            <div class="legal-notices">
              <a href="#">Mentions légales</a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright text-center py-3">&COPY; 2018 Copyright</div>
    </footer>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=hmscwtpg68ho7mn32oduih8w3n468kjklku6hu56wd8t69lz"></script>
  <script src="<?= $tpl->basePath; ?>/js/app.js"></script>
</body>

</html>
<?php
require("../app/Utils/util.php");
require_once("../app/Utils/Database.php");
require("../app/Controllers/CommentController.php");
require("../app/Controllers/MainController.php");
require("../app/Controllers/UserController.php");

// Test de connexion à la Database
$db = new Database();
$db->dbConnect();

// -- Routage simple --
// On récupère l'URL
// $_GET['_url'] contient l'URL relative au répertoire de notre projet (merci apache et le fichier .htaccess)
$currentURL = isset($_GET['_url']) ? $_GET['_url'] : '';

switch ($currentURL) {
  case '':
  $controller = new MainController();
  $controller->showHomeGuest();
    break;

  //routes dynamiques avec get
  case '/post/get':
  if (isset($_GET['id'])) {
      $controller = new MainController();
      $controller->showPost($_GET['id']);
  } else {
      echo 'Erreur 404';
  }
    break;

  case '/login':
  $controller = new UserController();
  $controller->login();
    break;

  case '/signin':
  $controller = new UserController();
  $controller->signin();
    break;

  case '/admin':
  $controller = new UserController();
  $controller->showHomeAdmin();
    break;

  case '/user':
  $controller = new UserController();
  $controller->showHomeUser();
    break;

  //routes dynamiques avec get
  case '/admin/post/get':
  if (isset($_GET['id'])) {
      $controller = new UserController();
      $controller->showPostAdmin($_GET['id']);
  } else {
      echo 'Erreur 404';
  }
    break;
    
  //routes dynamiques avec get
  case '/user/post/get':
  if (isset($_GET['id'])) {
      $controller = new UserController();
      $controller->showPostUser($_GET['id']);
  } else {
      echo 'Erreur 404';
  }
    break;
  default:
    echo 'Erreur 404';
    break;

  case '/admin/post/create':
  $controller = new UserController();
  $controller->createPost();
    break;

  case '/admin/post/edit':
  $controller = new UserController();
  $controller->editPost();
    break;

  case '/post/comment':
  $controller = new CommentController();
  $controller->addComment();
    break;

  case '/post/comment/report':
  $controller = new CommentController();
  $controller->reportComment();
    break;

  
}

<?php

// Composer Autoload for the project namespace
require __DIR__.'/../vendor/autoload.php';

// use P4blog\Utils\util;
use P4blog\Utils\Database;
use P4blog\Controllers\CommentController;
use P4blog\Controllers\MainController;
use P4blog\Controllers\UserController;

session_start();

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
  $controller->showHome();
    break;

  //routes dynamiques avec get
  case '/post':/******************************************************* */
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

  case '/login/submit':
  $controller = new UserController();
  $controller->loginSubmit();
    break;

  case '/signup':
  $controller = new UserController();
  $controller->signup();
    break;

  case '/signup/submit':
  $controller = new UserController();
  $controller->signupSubmit();
    break;

  case '/admin/validate':
  $controller = new UserController();
  $controller->validateCommentReported();
    break;

  case '/admin/reject':
  $controller = new UserController();
  $controller->rejectCommentReported();
    break;

  case '/admin/post/comment/delete':
  $controller = new UserController();
  $controller->deleteComment();
    break;

  case '/create-post':/************************ ****************************/
  $controller = new UserController();
  $controller->createPost();
    break;

  case '/admin/post/create/publish':
  $controller = new UserController();
  $controller->publishPost();
    break;

  //routes dynamiques avec get
  case '/edit-post':/*************************************************** */
  if (isset($_GET['id'])) {
      $controller = new UserController();
      $controller->editPost($_GET['id']);
  } else {
      echo 'Erreur 404';
  }
    break;

  case '/admin/post/edit/update':
  $controller = new UserController();
  $controller->updatePost();
    break;

  case '/post/comment/add':
  $controller = new CommentController();
  $controller->addComment();
    break;

  case '/post/comment/report':
  $controller = new CommentController();
  $controller->reportComment();
    break;

  case '/disconnection':
  $controller = new UserController();
  $controller->disconnect();
    break;
}

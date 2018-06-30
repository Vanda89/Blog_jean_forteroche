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
  $controller->validateComment();
    break;

  case '/admin/delete':
  $controller = new UserController();
  $controller->deleteComment();
    break;

/* FAIRE LIENS BOUTON EDITER PAGE POSTADMIN ET BOUTONS SIGNALER SUR POSTADMIN ET POSTUSER*/

  case '/admin/post/create':
  $controller = new UserController();
  $controller->createPost();
    break;

  case '/admin/post/create/save':
  $controller = new UserController();
  $controller->savePost();
    break;

  case '/admin/post/create/publish':
  $controller = new UserController();
  $controller->publishPost();
    break;

  case '/admin/post/edit':
  $controller = new UserController();
  $controller->editPost();
    break;

  case '/admin/post/edit/archieve':
  $controller = new UserController();
  $controller->archievePost();
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

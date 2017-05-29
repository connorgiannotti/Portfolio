<?php

namespace App\Controllers;

	$page = isset($_GET['page']) ? $_GET['page'] : "login";

	switch ($page) {

	case 'login':

		$controller = new LoginController();
		$controller->show();
		break;

	case 'logout':
		echo "---";
		session_destroy();
		echo "===";
		header('Location: ./?page=home');
		break;

	case 'home':

		$controller = new HomeController();
		$controller->show();
		break;

	case 'music':
		
		$controller = new MusicController();
		$controller->showAll();		
		break;

	case 'add':
		
		$controller = new AddController();
		$controller->show();		
		break;

	case 'song.store':

      $controller = new AddController();
      $controller->store();
      break;

	case 'genres':
		
		$controller = new GenresController();
		$controller->show();		
		break;

	case 'register':

      	$controller = new RegisterController();
      	$controller->show();
      	break;

    case 'register.store':

      	$controller = new RegisterController();
      	$controller->store();
      	break;

    case 'register.update':

      	$controller = new RegisterController();
      	$controller->update();
      	break;

    case 'password.update':

      	$controller = new RegisterController();
      	$controller->passwordUpdate();
      	break;

    case 'account.delete':

    	$controller = new RegisterController();
      	$controller->delete();
      	break;

    case 'login.try':

      	$controller = new AccountController();
      	$controller->processLoginForm();
      	break;

    case 'featuredmusic':

      	$controller = new FeaturedController();
      	$controller->show();
      	break;

    case 'comment.create':

      $controller = new FeaturedController();
      $controller->storeComments();
      break;

    case 'search':

      $controller = new SearchController();
      $controller->search();
      break;

   	case 'account':
   		
   		$controller = new AccountController();
      	$controller->show();
   		break;

   	case 'genreselect':
   		
   		$controller = new MusicController();
      	$controller->genreSelector();
   		break;

   	default:

   		echo "Error 404";
   		break;

	}



	

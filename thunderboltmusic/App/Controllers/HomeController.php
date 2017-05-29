<?php

namespace App\Controllers;

use App\Views\HomeView;
use App\Models\AddModel;
use App\Models\UsersModel;

Class HomeController
{
	public function show(){

		$song = new AddModel();
		$songs = $song->showFeatured();

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);

      	$view = new HomeView(compact('songs','user'));
      	$view->render();
	}
}
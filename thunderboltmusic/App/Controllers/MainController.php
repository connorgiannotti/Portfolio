<?php

namespace App\Controllers;

use App\Views\MainView;
use App\Models\UsersModel;

Class MainController
{
	public function show(){

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);

      	$view = new MainView(compact('user'));
      	$view->render();
	}
}

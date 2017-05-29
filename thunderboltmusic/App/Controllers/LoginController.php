<?php

namespace App\Controllers;

use App\Views\LoginView;
use App\Models\UsersModel;

Class LoginController
{
	public function show(){

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);

      	$view = new LoginView(compact('user'));
      	$view->render();
	}
}

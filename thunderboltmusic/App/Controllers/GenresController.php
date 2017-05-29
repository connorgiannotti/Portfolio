<?php

namespace App\Controllers;

use App\Views\GenresView;
use App\Models\UsersModel;

Class GenresController
{
	public function show(){

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);

      	$view = new GenresView(compact('user'));
      	$view->render();
	}
}
<?php

namespace App\Controllers;

use App\Views\AddView;
use App\Models\AddModel;
use App\Models\UsersModel;

Class AddController
{
	public function show(){

		$song = $this->getFormData();

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);

      	$view = new AddView(compact('song','user'));
      	$view->render();
	}

	public function store(){

		$song = new AddModel($_POST);		

		if (! $song->isValid()) {	
			$_SESSION['error.validation'] = $song;
			header("Location:./?page=add");
			exit();
		}
		if ($_FILES['album_cover']['error'] === UPLOAD_ERR_OK) {

			$song->savePoster($_FILES['album_cover']['tmp_name']);
		}

		$song->save();	
		header("Location:./?page=featuredmusic&id=". $song->id);

	}
	public function getFormData($id = null){

		if(isset($_SESSION['error.validation'])){
			$song = $_SESSION['error.validation'];
			unset($_SESSION['error.validation']);
		} else {
			$song = new AddModel($id);
		}
		return $song;
	}


}
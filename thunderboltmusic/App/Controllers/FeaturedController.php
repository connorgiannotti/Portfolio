<?php

namespace App\Controllers;

use App\Views\FeaturedView;
use App\Models\AddModel;
use App\Models\UsersModel;
use App\Models\CommentsModel;

Class FeaturedController
{
	public function show(){

		$featuredmusic = new AddModel($_GET['id']);
		
		
		$errorcomment = $this->getErrorComment();
		
		$comment = new CommentsModel();
		$allComments = $comment->getAllComments($_GET['id']);

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);


      	$view = new FeaturedView(compact('featuredmusic','user', 'errorcomment', 'allComments'));
      	$view->render();
	}

	public function storeComments(){

		$input = $_POST;

		$input['user_id'] = $_SESSION['user_id'];

		$comment = new CommentsModel($input);
		
		if(! $comment->isValid()){
			$_SESSION['error.comment'] = $comment;
			header("Location:./?page=featuredmusic&id=" . $comment->songs_id);
			exit();
		}

		$comment->save();
		header("Location:./?page=featuredmusic&id=". $comment->songs_id);
	}

	public function getErrorComment(){

		if(isset($_SESSION['error.comment'])){
			$comment = $_SESSION['error.comment'];
			unset($_SESSION['error.comment']);
		} else {
			$comment = new CommentsModel();
		}
		return $comment;
	}
}
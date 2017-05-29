<?php

namespace App\Controllers;

use App\Views\MusicView;
use App\Models\AddModel;
use App\Models\UsersModel;

Class MusicController
{
	public function showAll(){

		$song = new AddModel();
		$songs = $song->showAll();

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
		$user = new UsersModel($userID);

      	$view = new MusicView(compact('songs','user'));
      	$view->render();
	}

	// public function showFeaturedMovie(){

	// 	$featuredmovie = new MoviesModel($_GET['id']);

	// 	$newcomment = $this->getErrorComment();

	// 	$comments = new CommentsModel();
	// 	$allComments = $comments->getAllComments($_GET['id']);

	// 	$view = new FeaturedMovieView(compact('featuredmovie', 'allComments', 'newcomment'));
	// 	$view->render();
	// }

	public function genreSelector(){
		
		$songs = new AddModel();
		$genreSongs = $songs->getGenreList($_GET['genre']);

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
		$user = new UsersModel($userID);

		$view = new MusicView(compact('genreSongs','user'));
      	$view->render();


	}
}

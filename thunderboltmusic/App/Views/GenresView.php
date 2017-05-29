<?php

namespace App\Views;

Class GenresView extends View 
{
	public function render(){
		$page="genres";
		$title = " Genres";
		extract($this->data);
		// include "templates/master.inc.php";
		include "templates/main.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/genres.inc.php";
	}
}
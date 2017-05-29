<?php

namespace App\Views;

Class FeaturedView extends View 
{
	public function render(){
		$page="featured";
		$title = " Featured";
		extract($this->data);
		include "templates/main.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/featuredmusic.inc.php";
	}
}
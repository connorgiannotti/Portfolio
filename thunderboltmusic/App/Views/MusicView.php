<?php

namespace App\Views;

Class MusicView extends View 
{
	public function render(){
		$page="music";
		$title = " Music";
		extract($this->data);
		include "templates/main.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/music.inc.php";
	}
}

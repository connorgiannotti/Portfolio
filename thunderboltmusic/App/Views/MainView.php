<?php

namespace App\Views;

Class MainView extends View 
{
	public function render(){
		$page="main";
		$title = " Main";
		extract($this->data);
		include "templates/main.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/main.inc.php";
	}
}
<?php

namespace App\Views;

Class AddView extends View 
{
	public function render(){
		$page="add";
		$title = " Add Song";
		extract($this->data);
		// include "templates/master.inc.php";
		include "templates/main.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/add.inc.php";
	}
}
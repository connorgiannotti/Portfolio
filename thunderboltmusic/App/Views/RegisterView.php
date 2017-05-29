<?php
namespace App\Views;

Class RegisterView extends View 
{
	public function render(){
		$page="register";
		$title = " Register";
		extract($this->data);
		include "templates/main.inc.php";
	}

	public function content(){
		extract($this->data);    
    
	}
}
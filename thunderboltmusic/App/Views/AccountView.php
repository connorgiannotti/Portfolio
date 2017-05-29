<?php

namespace App\Views;

Class AccountView extends View 
{
	public function render(){
		$page="account";
		$title = " Your Account";
		extract($this->data);
		include "templates/main.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/account.inc.php";
	}
}

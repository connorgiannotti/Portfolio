<?php
namespace App\Controllers;

use App\Views\AccountView;
use App\Views\LoginView;
use App\Models\UsersModel;

Class AccountController
{
	public function show(){

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);
		
		$view = new AccountView(compact('user'));
     	$view->render();
	}

	public function showLoginForm(){
		$view = new LoginView();
     	$view->render();
	}

	public function processLoginForm(){

		// Make sure the email has been provided
		// Make sure the password has been provided
		// It should also be at least 8 characters, no point bugging the database with a passoword that is obviously wrong

		// Use the Users model
		$user = new UsersModel();
		$result = $user->attemptLogin();

		// If bad then generate error messages
		$errors['login-error'] = 'Invalid credentials';

		// Show the view
		$view = new LoginView($errors);
		$view->render();

	}

}
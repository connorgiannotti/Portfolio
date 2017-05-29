<?php
namespace App\Controllers;

use App\Views\RegisterView;
use App\Models\UsersModel;

Class RegisterController
{
	public function show(){

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

		$user = new UsersModel($userID);
		
		$view = new RegisterView(compact('user'));
     	$view->render();
	}

	public function store() {

		$errors = $this->validateUser();
		
		// If validation failed
		if (count($errors) > 0 ) {
			$_SESSION['account.errors'] = $errors;
			
			// Oh dear, errors
			header("Location:./?page=register&errors=true");
     		return;
		}
		
		// If everything is good to go
		// echo '<pre>';
		// print_r($_POST);

		// Hash the password (dont save it plain text)
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

		// Insert new user into database
		$newUser = new UsersModel();
		$newUser->saveNewUser();


		// Log them in automatically

		// Redirect to account page

	}

	public function update() {

		$errors = $this->validateUser();

		// If validation failed
		if (count($errors) > 0 ) {
			$_SESSION['accountedit.errors'] = $errors;
			
			// Oh dear, errors
			header("Location:./?page=account&editerrors=true");
     		return;
		}
		

		$user = new UsersModel();
		$user->update();


	}

	public function passwordUpdate() {

		$errors = $this->validateUser();

		// If validation failed
		if (count($errors) > 0 ) {
			$_SESSION['accountedit.errors'] = $errors;
			
			// Oh dear, errors
			header("Location:./?page=account&editerrors=true");
     		return;
		}
		

		$user = new UsersModel();
		$user->update();


	}


	public function delete(){

		$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
		UsersModel::destroy($userID);
		header("Location:./");

	}
	public function validateUser(){
		// Prepare a container to hold all the error messagers
		$errors = [];

		// Validate the form
		// Each field has been filled out

		// Email pattern
		$emailPattern = '/^[a-zA-Z0-9_\-.]{1,100}@[a-zA-Z0-9_\-.]{1,100}\.[a-zA-Z.]{1,100}$/';

		if(isset($_POST['email'])){
			if ( preg_match($emailPattern, $_POST['email']) ) {
				// Generate error message
				// die('Email good, check database');

				// Look the email in database
				$user = new UsersModel();

				if( ! isset($_POST['id'])){

					$result = $user->doesThisEmailExist( $_POST['email'] );

				
					if ( $result == true) {
						// Oops, this email exists
						$errors['email'] = 'Email in use';
					}
				}

			} else {
				// Check database
				$errors['email'] = 'Please enter a valid E-Mail address';
			}
		}

		if(isset($_POST['password'])){
			// Passwords match and are at least 8 characters long
			if ( strlen($_POST['password']) == 0 ) {
				// Password has not been provided
				$errors['password'] = 'Required';
			} elseif( strlen($_POST['password']) < 8 ) {
				$errors['password'] = 'Must be at least 8 characters';
			} elseif( $_POST['password'] != $_POST['password2'] ){
				$errors['password2'] = 'Password do not match';
			}
		}

		if(isset($_POST['username'])){	
			if ( strlen($_POST['username']) == 0 ) {
				// Password has not been provided
				$errors['username'] = 'Required';
			} elseif( strlen($_POST['username']) < 2 ) {
				$errors['username'] = 'Must be at least 2 characters';
			} 
		}
		return $errors;
	}
}
<?php

namespace App\Models;

use PDO;

Class UsersModel extends DatabaseModel
{
	protected static $tablename = 'users';
	protected static $columns = [
		'id',
		'email',
		'username',
		'password',
		'date_created',
		'privilege'
	];

	// Return true if email exists
	// Return false if email not found
	public function doesThisEmailExist( $email ) {

		$db = $this->getDatabaseConnection();

		$sql = "SELECT email FROM users WHERE email=:email";

		$statement = $db->prepare($sql);

		$statement->bindValue(':email', $email);

		$statement->execute();

		if ($statement->rowCount() == 1) {
			return true;
		} else{
			return false;
		}

	}

	public function saveNewUser() {

		// Get the database connection
		$db = $this->getDatabaseConnection();

		// Prepare the sql
		$sql = "INSERT INTO users (email, username, password)
				VALUES (:email, :username, :password)";

		$statement = $db->prepare($sql);

		// Bind the form data to the sql query
		$statement->bindValue(':email', $_POST['email']);
		$statement->bindValue(':username', $_POST['username']);
		$statement->bindValue(':password', $_POST['password']);

		// Run the query
		$result = $statement->execute();

		// Confirm that it worked
		if ( $result == true ) {
			// Yay

			$_SESSION['user_id'] = $db->lastInsertId();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['privilege'] = 'user';

			header('Location: index.php?page=home');	
		} else {
			// Uh oh

		}

		// If it did, log the user in and redirect to their new account page!
	}

	// Login functionally
	public function attemptLogin() {

		$db = $this->getDatabaseConnection();

		// Find the password of the user with a macthing email
		$sql = "SELECT id, username, password, privilege, email FROM users";

		if($_GET['page'] !== "login.try"){
			$sql .= " WHERE email = :email ";
		} else {
			$sql .= " WHERE username = :username ";
		}
				
		$statement = $db->prepare($sql);

		if($_GET['page'] !== "login.try"){
			$statement->bindValue(':email', $_POST['email']);
		} else {
			$statement->bindValue(':username', $_POST['username']);
		}	

		$statement->execute();

		$record = $statement->fetch(PDO::FETCH_ASSOC);

		// Did we get an array? (EMAIL FOUND)
		if ( is_array($record) ) {
			// Email found
			$result = password_verify( $_POST['password'] ,$record['password']);

			// If the result id good
			if ($result == true ) {
				// Log the user in and redrirect to account page
				$_SESSION['user_id'] = $record['id'];
				$_SESSION['privilege'] = $record['privilege'];
				$_SESSION['user_email'] = $record['email'];
				$_SESSION['username'] = $record['username'];

				header('Location: index.php?page=home');				
			} else {
				// bad password, return false so user sees error message
				return false;
			}

		} else {
			// Email not found
			// Tell user bad credentials
			return false;

		}

	}

	public function update() {
		
		$db = $this->getDatabaseConnection();

		if(! isset($_POST['password'])) {
			$sql = "UPDATE users SET email = :email, username = :username  WHERE id = :id";
		} else {
			$sql = "UPDATE users SET password = :password  WHERE id = :id";
		}
		$statement = $db->prepare($sql);

		if(! isset($_POST['password'])) {
			$statement->bindValue(':email', $_POST['email']);
			$statement->bindValue(':username', $_POST['username']);
		} else {
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$statement->bindValue(':password', $_POST['password']);
		}
		$statement->bindValue(':id', $_POST['id']);

		$statement->execute();

		unset($_SESSION['accountedit.errors']);

		header('Location: index.php?page=account');

		

	}

}
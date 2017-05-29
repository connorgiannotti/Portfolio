<?php

namespace App\Models;

use PDO;
use App\Controllers\Exceptions\PageNotFoundException;

abstract Class DatabaseModel
{
	public $data = [];

	public $errors = [];

	private $dbc;

	public function __construct($input = null){

		if(static::$columns){
			foreach (static::$columns as $column) {
				$this->$column = null;
				$this->errors[$column] = null;
			}
		}
		
		if (is_numeric($input)) {
			$this->data = $this->find($input);
		}

		if(is_array($input)){
			$this->processArray($input);
		}
	}

	public function processArray($input){
		foreach (static::$columns as $column) {
			if(isset($input[$column])){
				$this->$column = $input[$column];
			}
		}

	}

	protected static function getDatabaseConnection(){

		$dsn = 'mysql:host=localhost;dbname=connorgi_thunderbolt;charset=utf8';
		$dbc = new PDO($dsn, 'connorgi_thuser', '89okmju7');

		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		return $dbc;

	}

	public function find($newID = null){

		$id = isset($newID) ? $newID : $_GET['id'];

		$db = $this->getDatabaseConnection();

		$sql = "SELECT ". implode(',', static::$columns). " FROM ". static::$tablename ." WHERE id=:id";

		$statement = $db->prepare($sql);

		$statement->bindValue(':id', $id);

		$result = $statement->execute();

		$record = $statement->fetch(PDO::FETCH_ASSOC);

		// if (! $record) {
		// 	throw new PageNotFoundException;
			
		// }

		return $record;

	}

	public function save(){

		$db = $this->getDatabaseConnection();

		$columns = static::$columns;

		unset($columns[array_search('id', $columns)]);

		$sql = "INSERT INTO " . static::$tablename ." (" 
				. implode(',', $columns) . ") VALUES (";

		$insertcols = [];

		foreach ($columns as $column) {
			array_push($insertcols, ":".$column);
		}
		
		$sql .= implode(',', $insertcols) .	")";

		$statement = $db->prepare($sql);

		foreach ($columns as $column) {
			$statement->bindValue(":". $column, $this->$column);
		}
		
		$statement->execute();

		$this->id = $db->lastInsertId();

	}

	public function showAll(){

		$db = $this->getDatabaseConnection();

		$sql = "SELECT " . implode(',', static::$columns). " FROM " . static::$tablename;

		$statement = $db->prepare($sql);

		$result = $statement->execute();

		$songArray = [];

		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
			array_push($songArray, $record);
		}
		return $songArray;

	}

	public function showFeatured(){

		$db = $this->getDatabaseConnection();

		$sql = "SELECT " . implode(',', static::$columns). " FROM " . static::$tablename. " LIMIT " . 8;

		$statement = $db->prepare($sql);

		$result = $statement->execute();

		$songArray = [];

		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
			array_push($songArray, $record);
		}
		return $songArray;

	}

	public static function destroy($id){

		$db = self::getDatabaseConnection();
		$sql = "DELETE FROM " . static::$tablename . " WHERE id= :id";
		$statement = $db->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();

	}

	public function isValid(){

		$valid = true;
		foreach (static::$validationRules as $column => $rules) {
			$rules = explode(',', $rules);
			foreach ($rules as $rule) {
				if(strstr($rule, ':')){
					$rule = explode(':', $rule);
					$value = $rule[1];
					$rule = $rule[0];
				}
				switch ($rule) {
					case 'minlength':
						if(strlen($this->$column) < $value){
							$valid = false;
							$this->errors[$column]="* Must be atleast $value characters long";
						}
						break;

					case 'maxlength':
						if(strlen($this->$column) > $value){
							$valid = false;
							$this->errors[$column]="* Must be no more than $value characters";
						}
						break;

					case 'inputValidate':
						$characters = htmlentities($this->$column);
						$pattern = '/[#$%^&*()+=\-\[\]\';\/{}|":<>~\\\\]/';
						if (preg_match($pattern, $characters)) {
							$valid = false;
							$this->errors[$column]="* Must be a valid comment";
						}

						// $this->$column = filter_var($this->column, FILTER_SANITIZE_ENCODED);
						break;

					case 'numeric':
						if (! is_numeric($this->$column)) {
							$valid = false;
							$this->errors[$column] = "* Must be a number";
						}
						break;

					case 'required':
						if ( empty($this->$column)) {
							$valid = false;
							$this->errors[$column] = "* Required";
						}
						break;

					// case 'urlValidate':
						
					// 	break;
				}
			}
		}
		
		return $valid;
	}
	public function __get($name){
		if (in_array($name, static::$columns)) {
			return $this->data[$name];
		} else {
			echo "Property $name is not found in the data variable.";
		}

	}

	public function __set($name, $value){
		if (in_array($name, static::$columns)) {
			return $this->data[$name] = $value;
		} else {
			echo "Property $name is not found in the data variable.";
		}
	}
}
<?php

namespace App\Models;

use PDO;

Class CommentsModel extends DatabaseModel
{
	protected static $tablename = 'comments';
	protected static $columns = ['id','comment','user_id','songs_id'];

	protected static $validationRules = [
				'comment' => 'minlength:10,maxlength:100,inputValidate'

	];

	public function getAllComments($id){

		// Get database connection
		$db = $this->getDatabaseConnection();

		$sql = "SELECT comments.comment, comments.id, songs.title, users.username
				FROM comments
				JOIN songs ON comments.songs_id = songs.id 
				JOIN users ON comments.user_id = users.id 
				WHERE comments.songs_id = :id";

		$statement = $db->prepare($sql);

		$statement->bindValue(':id', $id);

		$statement->execute();

		$commentsArray = [];

		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
			array_push($commentsArray, $record);
		}
	
		return $commentsArray;


	}

}
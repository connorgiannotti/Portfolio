<?php

namespace App\Models;

use PDO;
use finfo;
use Intervention\Image\ImageManagerStatic as Image;

Class AddModel extends DatabaseModel
{
	protected static $tablename = 'songs';
	protected static $columns = [
		'id',
		'title',
		'artist',
		'album',
		'album_cover',
		'genres',
		'comments',
		'url',
		'date_added'
	];
	protected static $validationRules = [
							'title' => 	'required,inputValidate',
							'artist' => 'required,inputValidate',
							'album' => 	'required,inputValidate',
							'genres' => 'required',
							'comments' => 'required,inputValidate,minlength:10,maxlength:100',
							'url' => 'required'
	];

	public function savePoster($filename){

		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mimetype = $finfo->file($filename);
		
		// create all possible extensions
		$extension = [
			'image/jpg' => '.jpg',
			'image/jpeg' => '.jpeg',
			'image/png' => '.png',
			'image/gif' => '.gif'
		];

		// if mime type is present, then select appropriate extension for the file
		if (isset($extension['mimetype'])) {
			$extension = $extension['mime'];
		} else {
			$extension = '.jpg';
		}

		// create filename
		$newFilename = uniqid() . $extension;
		//die(var_dump($this));
		// to store the image file in database, give it to the object
		$this->album_cover = $newFilename;

		// creating new folder to store newFilename
		$folder = "images/poster/";

		if (! is_dir($folder)) {
			mkdir($folder, 0777, true);
		}

		$destination = $folder. $newFilename;

		move_uploaded_file($filename, $destination);

		$img = Image::make($destination);
		$img->fit(300,300);
		$img->save($folder . $newFilename);

		

		// create thumbnails folder

		if (! is_dir("images/poster/thumbnails")) {
			mkdir("images/poster/thumbnails", 0777, true);
		}

		$img = Image::make($destination);
		$img->fit(50,50);
		$img->save($folder ."thumbnails/". $newFilename);
	}

	public function getGenreList($genre){

		$db = $this->getDatabaseConnection();

		$sql = "SELECT ". implode(',', static::$columns). " FROM ". static::$tablename ." WHERE genres =:genre";

		$statement = $db->prepare($sql);

		$statement->bindValue(':genre', $genre);

		$result = $statement->execute();

		$genreArray = [];

		while($record = $statement->fetch(PDO::FETCH_ASSOC)){
			array_push($genreArray, $record);
		}
		return $genreArray;
		
	}

}
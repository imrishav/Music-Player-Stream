<?php

class Songs
{

	private $con;
	private $id;
	private $mysqiData;
	private $title;
	private $artistId;
	private $albumId;
	private $genre;
	private $duration;
	private $path;



	public function __construct($con, $id)
	{
		$this->con = $con;
		$this->id = $id;

		$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
		$this->mysqliData = mysqli_fetch_array($query);

		$this->title = $this->mysqliData['title'];
		$this->artistId = $this->mysqliData['artist'];
		$this->albumId = $this->mysqliData['album'];
		$this->genre = $this->mysqliData['genre'];
		$this->duration = $this->mysqliData['duration'];
		$this->path = $this->mysqliData['path'];
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getId()
	{
		return $this->id;
	}

	

	public function getArtist()
	{
		return new Artist($this->con, $this->artistId);
	}

	public function getAlbum()
	{
		return new Album($this->con, $this->albumId);
	}

	public function getPath()
	{
		return $this->path;
	}

	public function getGenre()
	{
		return $this->genre;
	}


	public function getMySqlData()
	{
		return $this->mysqliData;
	}

	public function getDuration()
	{
		return $this->duration;
	}


	// public static function addSongToDb($arr,$path) {
	// 	$songTitle = $arr['songTitle'];
	// 	$artistId = (int)$arr['artist'];
	// 	$albumId = (int)$arr['album'];
	// 	$songDuration = (int)$arr['songDuration'];
	// 	$path = $path;
	
	// 	$con = $this->con;
	
	// 	$query = mysqli_query($con, "INSERT INTO songs VALUES('', '$songTitle', '$artistId', '$albumId',1, $songDuration, $path,0,0)");
	// 	var_dump($query);
	// 	die();

	// 	// var_dump($arr['songTitle']);
	// 	// die
	// }

	public static function getArtsitDropdown($con, $username)
	{
		$dropdown = '<select class="item">
							<option value="">Add To Playlist</option>';
		$query = mysqli_query($con, "SELECT id,name FROM artist");

		while ($row = mysqli_fetch_array($query)) {
			$id = $row['id'];
			$name = $row['name'];

			$dropdown = $dropdown . "<option value='$id'>$name</option>";
		}


		return $dropdown . "</select>";
	}
}

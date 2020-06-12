<?php 


class Admin {
    

        private $con;
   
    
    
    
        public function __construct($con)
        {
            $this->con = $con;
            // $this->id = $id;
    
            $query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='1'");
            $this->mysqliData = mysqli_fetch_array($query);
    
            $this->title = $this->mysqliData['title'];
            // $this->artistId = $this->mysqliData['artist'];
            // $this->albumId = $this->mysqliData['album'];
            // $this->genre = $this->mysqliData['genre'];
            // $this->duration = $this->mysqliData['duration'];
            // $this->path = $this->mysqliData['path'];
        }
    


        public static function getResult() {
            var_dump('called');
            die();
        }
        // public function getTitle()
        // {
        //     return $this->title;
        // }
    
        // public function getId()
        // {
        //     return $this->id;
        // }
    
        // public static function addSongToDb($arr,$path, $con) {
        //     $songTitle = $arr['songTitle'];
        //     $artistId = (int)$arr['artist'];
        //     $albumId = (int)$arr['album'];
        //     $songDuration = (int)$arr['songDuration'];
        //     $path = $path;


         
        //     $query = mysqli_query($this->con, "INSERT INTO songs VALUES('', '$songTitle', '$artistId', '$albumId',1, $songDuration, $path,0,0)");

        //     // var_dump($arr['songTitle']);
        //     // die
        // }
    
        // public function getArtist()
        // {
        //     return new Artist($this->con, $this->artistId);
        // }
    
        // public function getAlbum()
        // {
        //     return new Album($this->con, $this->albumId);
        // }
    
        // public function getPath()
        // {
        //     return $this->path;
        // }
    
        // public function getGenre()
        // {
        //     return $this->genre;
        // }
    
    
        // public function getMySqlData()
        // {
        //     return $this->mysqliData;
        // }
    
        // public function getDuration()
        // {
        //     return $this->duration;
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

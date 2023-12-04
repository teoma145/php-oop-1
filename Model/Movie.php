<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__.'/genre.php';
class Movie{
    private int $id;
    private string $title;
    private string $overview;
    private string $vote_average;
    private string $poster_path;    

    public Genre $genre;

    function __construct($id,$title,$overview,$vote_average,$poster_path, Genre $genre){
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote_average;
        $this->poster_path = $poster_path;
        $this->genre = $genre; 
    }
    public function getVote(){
        $vote=ceil($this->vote_average/2);
        $template = '<p>';
        for($n = 1 ;$n <= 5; $n++){
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa regular fa-star"></i>';

        }
        $template .= "</p>";
        var_dump($template);
        return $template;
        
    }
    public function printcard(){
        $image = $this->poster_path;
        $title = $this->title;
        $content = $this->overview;
        $custom = $this->vote_average;
        $genre = $this->genre->name;
        $template = $this->getVote();;
        include __DIR__.'/../Views/card.php';
    }
}


//$Babylon = New Movie('1',"Babylon A.D.","A veteran-turned-mercenary is hired to take a young woman with a secret from post-apocalyptic Eastern Europe to New York City.",5.601,"https://image.tmdb.org/t/p/w342/kt9nqD0uOar8IVE9191HXhWOXKI.jpg",);
//var_dump($Babylon);

$movieString = file_get_contents(__DIR__.'/movie_db.json');
$movieList = json_decode($movieString,true);

$movies = [];
$action = New Genre('action');
$comedy = New Genre('comedy');
foreach ($movieList as $item){
    $movies[]= new Movie($item['id'],$item['title'],$item['overview'],$item['vote_average'],$item['poster_path'],$action);
}


?>

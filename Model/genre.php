<?php 
class Genre{
    public $name;

    public function __construct($name){
        $this->name = $name;
    }
}
$action = New Genre('action');
$action = New Genre('comedy');
?>
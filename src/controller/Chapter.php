<?php
class Chapter {

    private $title;
    private $model;
    

    public function __construct() {
        $this->title = "Chapter";
        $this->model = new Model();
    }

    public function manage() {
        
        include (__DIR__ . './../view/view_chapter.php');
    }
    
}
?>
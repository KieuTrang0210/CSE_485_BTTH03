<?php
class Category {
    private $id;
    private $name;
    private $description;
    private $navigation;
    
    // hàm tạo
    public function __construct(){

    }

    // getter
    public function getID(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getNavigation(){
        return $this->navigation;
    }

    //setter
    public function setID($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setNavigation($navigation){
        $this->navigation = $navigation;
    }
}
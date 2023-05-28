<?php
class Member {
    private $id;
    private $forename;
    private $surname;
    private $email;
    private $password;
    private $joined;
    private $picture;
    
    // hàm tạo
    public function __construct(){

    }

    // getter
    public function getID(){
        return $this->id;
    }

    public function getForename(){
        return $this->forename;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getJoined(){
        return $this->joined;
    }

    public function getPicture(){
        return $this->picture;
    }

    //setter
    public function setID($id){
        $this->id = $id;
    }

    public function setForename($forename){
        $this->forename = $forename;
    }

    public function setSurname($surname){
        $this->surname = $surname;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setJoined($joined){
        $this->joined = $joined;
    }

    public function setPicture($picture){
        $this->picture = $picture;
    }   
}
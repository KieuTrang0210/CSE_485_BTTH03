<?php
require_once APP_ROOT.'/app/models/Member.php';

class MemberService{
    public function getAllMember(){
        try{
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
            $sql = "SELECT * FROM member";
            $stmt = $conn->query($sql);

            $members = [];
            while($row = $stmt->fetch()){
                $member = new Member();

                $member->setID($row['id']);
                $member->setForename($row['forename']);
                $member->setSurname($row['surname']);
                $member->setEmail($row['email']);
                $member->setPassword($row['password']);
                $member->setJoined($row['joined']);
                $member->setPicture($row['picture']);

                 $members[] = $member;
             }
            return $members;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }
}
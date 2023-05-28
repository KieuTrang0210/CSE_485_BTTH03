<?php
require_once APP_ROOT.'/app/models/Category.php';

class CategoryService{
    public function getAllCategory(){
        try{
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
            $sql = "SELECT * FROM category";
            $stmt = $conn->query($sql);

            $categories = [];
            while($row = $stmt->fetch()){
                $category = new Category();

                $category->setID($row['id']);
                $category->setName($row['name']);
                $category->setDescription($row['description']);
                $category->setNavigation($row['navigation']);

                 $categories[] = $category;
             }
            return $categories;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }
}
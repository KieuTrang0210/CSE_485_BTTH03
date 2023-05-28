<?php
require_once APP_ROOT.'/app/models/Article.php';
class ArticleService {

    //lấy all article
    public function getAllArticle(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        $sql = "SELECT a.id, a.title, a.summary, a.created, 
                a.member_id, CONCAT(m.forename, ' ', m.surname) AS author,
                a.image_id, i.file as image_file, 
                a.category_id, c.name AS category
                FROM article AS a
                JOIN member AS m ON a.member_id = m.id
                JOIN category AS c ON c.id = a.category_id
                LEFT JOIN image AS i ON a.image_id = i.id
                WHERE a.published = 1 ORDER BY created DESC";

        $stmt = $conn->query($sql);
        $articles = $stmt->fetchAll();
        
        // $articles = [];
        // while($row = $stmt->fetch()){
        //     $article = new Article();
        //     $article->setID($row['id']);
        //     $article->setTitle($row['title']);
        //     $article->setSummary($row['summary']);
        //     $article->setContent($row['content']);
        //     $article->setCreated($row['created']);
        //     $article->setCategory_id($row['category_id']);
        //     $article->setMember_id($row['member_id']);
        //     $article->setImage_id($row['image_id']);
        //     $article->setPublished($row['published']);

        //     $articles[] = $article;
        // }

        return $articles;
    }


    // thêm article
    public function addArticle(Article $article){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        $sql = "INSERT INTO article (title, summary, content, created, category_id, member_id, image_id, published) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $article->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(2, $article->getSummary(), PDO::PARAM_STR);
        $stmt->bindValue(3, $article->getContent(), PDO::PARAM_STR);
        $stmt->bindValue(4, $article->getCreated(), PDO::PARAM_STR);
        $stmt->bindValue(5, $article->getCategory_id(), PDO::PARAM_STR);
        $stmt->bindValue(6, $article->getMember_id(), PDO::PARAM_INT);
        $stmt->bindValue(7, $article->getImage_id(), PDO::PARAM_INT);
        $stmt->bindValue(8, $article->getPublished(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    // tìm article theo id
    public function searchArticleById($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        $sql = "SELECT a.id, a.title, a.summary, a.content, a.created, 
                a.member_id, CONCAT(m.forename, ' ', m.surname) AS author,
                a.image_id, i.file as image_file, 
                a.category_id, c.name AS category, c.description
                FROM article AS a
                LEFT JOIN member AS m ON a.member_id = m.id
                JOIN category AS c ON c.id = a.category_id
                LEFT JOIN image AS i ON a.image_id = i.id
                WHERE a.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch();

        return $article;

    }
}
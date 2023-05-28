<?php
require_once APP_ROOT.'/app/services/ArticleService.php';
require_once APP_ROOT.'/app/services/CategoryService.php';
require_once APP_ROOT.'/app/services/MemberService.php';
class ArticleController{

    // lấy all article hiện lên trang index.php
    public function index(){
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticle();

        include APP_ROOT.'/app/views/article/index.php';
    }

    // tạo article trong form tạo của create.php
    public function createArticle(){
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategory();

        $memberService = new MemberService();
        $members = $memberService->getAllMember();

        include APP_ROOT.'/app/views/article/create.php';
    }

    // lưu trữ thông tin vừa tạo vào CSDL và hiện thị lên trang index.php
    public function store(){
        $articleService = new ArticleService();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $created = date('Y-m-d H:i:s');
            $category_id = $_POST['category_id'];
            $member_id = $_POST['member_id'];
            $image_id = isset($_FILES['image_id']) ? $_FILES['image_id'] : null;
            $published = isset($_POST['published']) ? $_POST['published'] : 0;
       
          
            $article = new Article();
            $article->setTitle($title);
            $article->setSummary($summary);
            $article->setContent($content);
            $article->setCreated($created);
            $article->setCategory_id($category_id);
            $article->setMember_id($member_id);
            $article->setImage_id($image_id);
            $article->setPublished($published);

            $articleService->addArticle($article);

        }
        
        $articles = $articleService->getAllArticle();
        include APP_ROOT.'/app/views/article/index.php';
        
    }

    // tìm kiếm article theo id và hiện thị lên trng show.php
    public function search(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['id'];
                $articleService = new ArticleService();
                $article = $articleService->searchArticleById($id);
        } else if(isset($_GET['id'])){
            $id = $_GET['id'];
            $articleService = new ArticleService();
            $article = $articleService->searchArticleById($id);
        }
        include APP_ROOT.'/app/views/article/show.php';
        }
        
     
        
    
}
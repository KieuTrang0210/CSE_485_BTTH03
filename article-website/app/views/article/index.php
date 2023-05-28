<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article HomePage</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .card-img-top:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex my-4">
            <h2 class="text-success text-uppercase">Article</h2>
            <div class="w-50 ms-auto">
            <form class="form-inline my-2 my-lg-0 d-flex" method="POST" action="?controller=article&action=search">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="id">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
            
        </div>

        <div class="d-flex ms-auto mb-2">
            <a href="<?= DOMAIN.'public/index.php?controller=article&action=createArticle'?>" class="btn btn-success ms-auto">Create Article</a>
        </div>
        
        
      
        <div class="row">
            <?php foreach ($articles as $article) {?>
                <div class="col-md-4 mb-4">
                    <a href="?controller=article&action=search&id=<?= $article['id'] ?>" class="text-decoration-none text-dark">
                        <div class="card-group">
                            <div class="card">
                                <?php 
                                    if($article['image_file'] == null){
                                        $article['image_file'] = 'blank.png';
                                    }?>
                                <img class="card-img-top" src= "images/<?= $article['image_file']?>" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $article['title'] ?></h4>
                                    <p class="card-text"><?= $article['summary'] ?></p>
                                    <p class="card-text text-uppercase">posted in <b><?= $article['category']?></b> by <b><?= $article['author'] ?></b></p>
                                </div>
                            </div>
                        </div>
                    </a> 
                </div>   
            <?php } ?>
        </div>
    </div>
</body>
</html>
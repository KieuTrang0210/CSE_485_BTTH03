<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="css/bootstrap.css">
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
            <a href="<?= DOMAIN.'public/index.php?controller=article'?>" class="btn btn-success ms-auto">Back</a>
        </div>

        <p class="border-start border-warning border-5">Category: <b><?= $article['category'] ?></b> (<?= $article['description'] ?>)</p>
       
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-group">
                        <div class="card">
                            <?php 
                                if($article['image_id'] == null){
                                    $article['image_file'] = 'blank.png';
                                }?>
                            <img class="card-img-top" src= "images/<?= $article['image_file']?>" alt="Card image cap">
                            <div class="card-body">
                            <h4 class="card-title text-center"><?= $article['title'] ?></h4>
                            <p class="card-text text-center"><?= $article['summary'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <p><?= $article['content'] ?></p>
                <p class="card-text text-end">By: <b><?= $article['author'] ?></b></p>
                <p class="card-text text-end">Created: <?= $article['created'] ?></p>
            </div>
        </div>
    </div>
</body>
</html>
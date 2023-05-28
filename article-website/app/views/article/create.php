<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center my-3 text-uppercase text-success">Create Article</h3>
        
        <form action="?controller=article&action=store" method="post" class="border px-4 bg-light">
            <div class="form-group my-3">
                <label for="">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="" >
            </div>

            <div class="form-group my-3">
                <label for="">Summary</label>
                <textarea class="form-control" name="summary" id="summary" rows="3"></textarea>
            </div>

            <div class="form-group my-3">
                <label for="">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>

            <div class="form-group my-3">
                <label for="">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option selected>--Select Category--</option>
                    <?php foreach ($categories as $category) {?>
                        <option value="<?= $category->getID(); ?>"><?= $category->getName(); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group my-3">
                <label for="">Author</label>
                <select class="form-control" name="member_id" id="member_id">
                    <option selected>--Select Author--</option>
                    <?php foreach ($members as $member) {?>
                        <option value="<?= $member->getID(); ?>"><?= $member->getForename(); ?> <?= $member->getSurname(); ?> </option>
                    <?php } ?>
                </select>
            </div>

           <div class="form-group my-3">
             <label for="">Image: </label>
             <input type="file" class="form-control-file" name="image_id" id="image_id" placeholder="" aria-describedby="fileHelpId">
           </div>

           <div class="form-check">
            <label class="form-check-label">
               <input type="radio" class="form-check-input" name="published" id="published" value="1" checked>
               Published
             </label>
           </div>

            <button type="submit" class="btn btn-primary ms-auto d-flex mb-3">Create</button>
        </form>
    </div>
  
   <?php echo $article?>
</body>
</html>
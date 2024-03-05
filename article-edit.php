<?php

include 'db.php';
$id = $_GET['id'];
$query = "SELECT * FROM articles WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$article = mysqli_fetch_assoc($result);

$qu = "SELECT * FROM categories";
$categories = mysqli_query($conn, $qu);

if(isset($_POST['article-update'])) {
    $title = addslashes($_POST['title']);
    $body = addslashes($_POST['body']);
    $photos = $_FILES['photos'];
    $category_id = $_POST['category_id'];
    $error = [];

    empty($title) ? $error[] = "Title is required" : '';
    empty($body) ? $error[] = "Body is required" : '';
    empty($category_id) ? $error[] = "Category must be selected" : '';

    if(!$error) {
        
        if(is_uploaded_file($photos['tmp_name'][0])) {
            $photo_path = [];
            for($i = 0; $i < count($photos['tmp_name']); $i++) {
                move_uploaded_file($photos['tmp_name'][$i], 'img/'.$photos['name'][$i]);
                $photo_path[] = 'img/'.$photos['name'][$i];
            }
            $photo_path = json_encode($photo_path);
            $query = "UPDATE articles SET title='$title', body='$body', photos='$photo_path', category_id='$category_id' WHERE id='$id'";
        } else {
            $query = "UPDATE articles SET title='$title', body='$body', category_id='$category_id' WHERE id='$id'";
        }

        $result = mysqli_query($conn, $query);
        if($result) {
            header("location: index.php");
        }
    }
}

?>

<?php include 'layout/header.php'; ?>
<?php print_r($query) ?>

<h1>Update Article</h1>

<form action="" method="post" enctype="multipart/form-data">
    <?php include('layout/error.php') ?>
    <input type="text" name="title" placeholder="Your Title Here ..." class="form-control mb-3" value="<?= $article['title'] ?>">
    <textarea name="body" id="body" cols="30" rows="5" class="form-control mb-3" placeholder="Your Text Here ..."><?= $article['body'] ?></textarea>
    <input type="file" name="photos[]" class="form-control mb-3" multiple>
    <?php foreach(json_decode($article['photos']) as $photo): ?>
        <img src="<?= $photo ?>" alt="" width="100px">
    <?php endforeach; ?>
    <div class="mb-3"></div>
    <select name="category_id" class="form-control mb-3">
        <option value="">select category</option>
        <?php while($row  = mysqli_fetch_assoc($categories)): ?>
            <option 
                value="<?= $row['id'] ?>" 
                <?= $row['id'] == $article['category_id'] ? "selected" : '' ?>
            >
                <?= $row['name'] ?>
            </option>
        <?php endwhile; ?>
    </select>
    <button type="submit" class="tm-search-button" name="article-update">Update</button>
</form>

<?php include 'layout/footer.php'; ?>
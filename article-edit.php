<?php

include 'db.php';
$id = $_GET['id'];
$query = "SELECT * FROM articles WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$article = mysqli_fetch_assoc($result);

$qu = "SELECT * FROM categories";
$categories = mysqli_query($conn, $qu);

?>

<?php include 'layout/header.php'; ?>

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
    <button type="submit" class="tm-search-button" name="article-store">Add</button>
</form>

<?php include 'layout/footer.php'; ?>
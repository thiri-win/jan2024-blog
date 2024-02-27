<?php

include 'db.php';
$id = $_GET['id'];
$query = "SELECT * FROM articles LEFT JOIN categories 
    ON articles.category_id=categories.id 
    WHERE categories.id = '$id'";
$result = mysqli_query($conn, $query);
$article = mysqli_fetch_assoc($result);

?>


<?php include 'layout/header.php'; ?>

<a href="article-edit.php?id=<?= $article['id'] ?>" class="tm-external-link mb-3">
    <i class="fa-solid fa-pen"></i>Edit
</a>
<div class="row tm-row">
    <div class="col-12">
        <hr class="tm-hr-primary tm-mb-55">
        <?php foreach(json_decode($article['photos']) as $photo): ?>
            <!-- Video player 1422x800 -->
            <img src="<?= $photo ?>" alt="" height="200px" style="object-fit: cover;">
        <?php endforeach; ?>
        <hr class="tm-hr-primary tm-mb-55">
    </div>
</div>
<div class="row tm-row">
    <div class="col-lg-8 tm-post-col">
        <div class="tm-post-full">
            <div class="mb-4">
                <h2 class="pt-2 tm-color-primary tm-post-title">
                    <?= $article['title'] ?>
                </h2>
                <p class="tm-mb-40"><?= $article['posted_at'] ?></p>
                <p>
                    <?= $article['body'] ?>
                </p>
                <span class="d-block text-right tm-color-primary"><?= $article['name'] ?></span>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>

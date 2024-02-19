<?php

include 'db.php';
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

?>



<?php include 'layout/header.php' ?>

<h1>New Article</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Your Title Here ..." class="form-control mb-3">
    <textarea name="body" id="body" cols="30" rows="5" class="form-control mb-3" placeholder="Your Text Here ..."></textarea>
    <input type="file" name="photos[]" class="form-control mb-3">
    <select name="category_id" class="form-control mb-3">
        <option value="">select category</option>
        <?php while($row  = mysqli_fetch_assoc($result)): ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php endwhile; ?>
    </select>
    <button type="submit" class="tm-search-button">Add</button>

</form>

<?php include 'layout/footer.php' ?>
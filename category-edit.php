<?php include 'layout/header.php' ?>

<?php
include 'db.php';

$category_id = $_GET['id'];
$query = "SELECT * FROM categories WHERE id='$category_id'";
$result = mysqli_query($conn, $query);
$category = mysqli_fetch_assoc($result);

if(isset($_POST['category-update'])) {
    $name = $_POST['name'];
    $error = [];

    empty($name) ? $error[] = "Name is required" : '';

    if(!$error) {
        $query = "UPDATE categories SET name='$name' WHERE id='$category_id'";
        $result = mysqli_query($conn, $query);
        if($result) {
            header('location: category-index.php');
        } else {
            echo mysqli_connect_error();
        }
    }
}

?>

<h1>Update Category</h1>

<form method="post" action="">

    <?php include 'layout/error.php' ?>

    <input class="form-control mb-3" name="name" type="text" placeholder="Your New Update Category Here ..." aria-label="Search" value="<?= $category['name'] ?>">

    <button class="btn btn-outline-warning" type="submit" name="category-update">Update</button>

</form>

<?php include 'layout/footer.php' ?>
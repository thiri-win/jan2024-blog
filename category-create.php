<?php include 'layout/header.php'; ?>

<?php

include 'db.php';

if (isset($_POST['category-create'])) {
    $name = $_POST['name'];
    $error = [];

    empty($name) ?  $error[] = 'Name is required' : '' ;

    if(!$error) {
        $query = "INSERT INTO categories (name) VALUES ('$name')";
        $result = mysqli_query($conn, $query);
        
        if($result) {
            header("location: category-index.php");
        } else {
            echo mysqli_connect_error();
        }
    }

}

?>

<h1>Create New Category</h1>

<?php include 'layout/error.php' ?>

<form method="post" action="">

    <input class="form-control mb-3" name="name" type="text" placeholder="New Category" aria-label="Search">

    <button class="tm-search-button" type="submit" name="category-create">Add</button>

</form>

<?php include 'layout/footer.php'; ?>

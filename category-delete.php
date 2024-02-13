<?php

include 'db.php';

$category_id = $_GET['id'];

$query = "DELETE FROM categories WHERE id='$category_id'";

$result = mysqli_query($conn, $query);

if($result) {
    header('location: category-index.php');
} else {
    echo mysqli_connect_error();
}
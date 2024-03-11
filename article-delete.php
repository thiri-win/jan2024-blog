<?php
     
include "db.php";
$id = $_GET['id'];

$query = "DELETE FROM articles WHERE id='$id'";
$result = mysqli_query($conn, $query);
if($result) {
    header('location: index.php');
} else {
    echo mysqli_connect_error();
}
<?php

include('db.php');

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $error = [];

    empty(trim($name)) ? $error[] = "Name is required" : '';
    empty(trim($email)) ? $error[] = "Email is required" : '';
    empty(trim($password)) ? $error [] = "Password is required" : '';
    empty(trim($c_password)) ? $error [] = "Confirm Password is required" : '';
    trim($password) != trim($password) ? $error[] = "Passwords do not match" : '';

    if(!$error) {

        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        if($result) {
            if(mysqli_num_rows($result)) {
                $error[] = "Email need to unique";
            } else {
                $password = md5($password);
                $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($conn, $query);
                if($result) {
                    header('location: index.php');
                } else {
                    echo mysqli_connect_error();
                }
            }
            
        }

    }

}

?>

<?php include 'layout/header.php' ?>

<h1>Register</h1>

<form action="" method="post">
    <?php include 'layout/error.php'  ?>
    <input type="text" name="name" placeholder="Your Name" class="form-control mb-3">
    <input type="email" name="email" placeholder="Your Email" class="form-control mb-3">
    <input type="password" name="password" placeholder="Your Password" class="form-control mb-3">
    <input type="password" name="c_password" placeholder="Your Confirm Password" class="form-control mb-3">
    <input type="submit" name="register" value="Register" class="btn btn-primary">
</form>

<?php include 'layout/footer.php' ?>
<?php
if(!isset($_SESSION['user'])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
    <style>
        .tm-post-link-inner img {
            height: 18rem !important;
            object-fit: cover !important;
            object-position: top !important;
        }
    </style>
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>

<body>
    <header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
                <h1 class="text-center">Xtra Blog</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">
                <ul>
                    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']): ?>
                    <li class="tm-nav-item"><a href="index.php" class="tm-nav-link">
                            <i class="fas fa-user"></i>
                            <?php print_r($_SESSION['user']['name']); ?>
                        </a></li>
                    <?php endif; ?>
                    <li class="tm-nav-item"><a href="index.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Home
                        </a></li>
                    <li class="tm-nav-item"><a href="category-index.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Category
                        </a></li>
                    <li class="tm-nav-item"><a href="about.php" class="tm-nav-link">
                            <i class="fas fa-users"></i>
                            About Xtra
                        </a></li>
                    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']): ?>
                    <li class="tm-nav-item"><a href="logout.php" class="tm-nav-link">
                            <i class="fas fa-sign-in-alt"></i>
                            Logout
                        </a></li>

                    <?php else: ?>
                    <li class="tm-nav-item"><a href="register.php" class="tm-nav-link">
                            <i class="fas fa-registered"></i>
                            Register
                        </a></li>
                    <li class="tm-nav-item"><a href="login.php" class="tm-nav-link">
                            <i class="far fa-user"></i>
                            Login
                        </a></li>
                    <?php endif; ?>
                    <li class="tm-nav-item"><a href="contact.php" class="tm-nav-link">
                            <i class="far fa-comments"></i>
                            Contact Us
                        </a></li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            <p class="tm-mb-80 pr-5 text-white">
                Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar.
                Right side content will scroll up and down.
            </p>
        </div>
    </header>

    <div class="container-fluid">
        <main class="tm-main">

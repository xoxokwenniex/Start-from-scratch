<?php
session_start();
ob_start();

require './database/db.php';
require './vendor/autoload.php';

function encryption($password) {
    try {
        return md5($password);
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CASGO</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="./css/una.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">

    <style>
        body {
            background-image: url('assets/img/stats-bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero {
            background-color: transparent;
            background-image: none;
            background-position: float;
            height: auto;
            background-size: cover;  
        }

        .hero img {
            display: block;
            width: 100%;
            height: auto;
        }
        .index-page {
            position: relative;
            z-index: 2;
        }

        header {
            z-index: 4;
        }
        .login-container {
            position: relative;
            z-index: 3;
        }
    </style>
</head>
<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-l-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename"> Welcome! CAS-Guidance Office</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html#hero" class="active">Home</a></li>
          <li><a href="index.html#about">About</a></li>
          <li><a href="index.html#services">Services</a></li>
          <li class="dropdown"><a href="#"><span>Accounts</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Register/Login</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="login.php">Login Here!</a></li>
                  <li><a href="register.php">Register Here!</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="index.html#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
<section id="hero" class="hero section dark-background">

<img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

        <div class="login-container mt-6">
            <div class="login-form p-4">
                <h2 class="text-center">Sign In</h2>
                <form id="loginForm" method="post">
                    <div class="form-group mb-2">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" name="loginbtn" class="btn btn-primary w-100">Login</button>
                    <p>Don't have an account?<br> Register Here <a href="register.php" id="signUp">Signup</a></p>

                </form>
                <div id="error-message" class="mt-3"></div>
            </div>
        </div>
        </section>
        <?php

        if (isset($_POST["loginbtn"])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $sqlrun = "SELECT * FROM users WHERE email = ? AND password = ?";
            $login = $pdo->prepare($sqlrun);
            $login->execute([$username, encryption($password)]);
            $data = $login->fetchAll();

            if (count($data)) {
                $_SESSION["userlog"] = $data;
                header("Location: ./index.php");
                ob_end_flush();
                exit();
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Invalid Information',
                    })
                </script>";
            }
        }

        ?>
       

    </main>

    <script src="./js/script.js"></script>
    </section>
</body>

</html>

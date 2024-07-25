<?php
session_start();
ob_start();


require './database/db.php';
require './vendor/autoload.php';


use Simpluity\Simpluity\BaseController;
$userrun = new BaseController("users", $pdo);
$userdatarun = new BaseController("userdata", $pdo);
$studentrun = new BaseController("student", $pdo);




if (isset($_POST["Submit"])) {
  // Collect and sanitize form data  

  $firstName = htmlspecialchars($_POST["firstName"]);
  $middleName = htmlspecialchars($_POST["middleName"]);
  $lastName = htmlspecialchars($_POST["lastName"]);
  $birthdayDate = htmlspecialchars($_POST["birthdayDate"]);
  $birthdayPlace = htmlspecialchars($_POST["birthdayPlace"]);
  // $inlineRadioOptions = htmlspecialchars($_POST["inlineRadioOptions"]);
  // $age= htmlspecialchars($_POST["age"]);
  $gender= htmlspecialchars($_POST["gender"]);
  $emailAddress = htmlspecialchars($_POST["emailAddress"]);
  $phoneNumber = htmlspecialchars($_POST["phoneNumber"]);
  $password = htmlspecialchars($_POST["password"]);
  $course = htmlspecialchars($_POST["course"]);

  $userrun->POST(
    [
      "email"=>$emailAddress, "password"=>$password,
      "role"=>"STUDENT"
    ],
    "password"
  );

  $data = $userrun->AUTH(["email"=>$emailAddress, "password"=>$password],"password");

  $userdatarun->POST(
    [
      "email"=>$emailAddress,
      "user_id"=>$data[0]["id"],
      "firstName"=>$firstName,
      "lastName"=>$lastName,
      "middleName"=>$middleName,
      "image"=>$emailAddress,
      "birthdate"=>$birthdayDate,
      // "birthPlace"=>$birthdayPlace,
      "sex"=>$gender,
      // "Age"=>$age,
    ],
  );

  $data = $userrun->AUTH(["email"=>$emailAddress, "password"=>$password],"password");

  $studentrun->POST(
    [
      "course"=>$course,
      "user_id"=>$data[0]["id"],
    ],
  );

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
        .card-registration {
            position: relative;
            z-index: 3;

        }

        .index-page {
            position: relative;
            z-index: 2;
        }

        header {
            z-index: 4;
        }

    </style> 
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

  <div class="col-md-7">
        <div class="row justify-content-center align-items-center ">
          <div class="col-6 col-lg-8 col-xl-11 ">
            <div class="card shadow-2-strong card-registration bg-transparent  p-3 align-center" style="border-radius: 25px;">
              <div class="card-body p-2 p-1  h-100 align-center">
                <h4 class=" text-center">Sign Up Here!</h4>
                <form method="post">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <input type="text" name="firstName" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="firstName">First Name</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <input type="text" name="middleName" class="form-control" id="middleName" placeholder="name@example.com">
                        <label for="middleName">Middle Name</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="name@example.com">
                        <label for="lastName">Last Name</label>
                      </div>
                      
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <!-- <div class="col-md-3 mb-3">
                      <input type="number" class="form-control form-control-md" name="idnum" placeholder="Enter Id Number" />
                      <label for="idnum" class="form-label">ID Number</label>
                    </div> -->
                   
                    <div class="col-md-3">
                      <div class="form-floating mb-3">
                        <input type="text" name="idnum" class="form-control" id="idnum" placeholder="name@example.com">
                        <label for="idnum">ID Number</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-floating mb-3">
                        <input type="date" name="birthdayDate" class="form-control" id="birthdayDate" placeholder="name@example.com">
                        <label for="birthdayDate">Birthday</label>
                      </div>
                    </div>
                    <div class="col-md-3 mb-2">
                    <div class="form-floating">
                        <select class="form-select" name="gender" id="gender" aria-label="Floating label select example">
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>
                        </select>
                        <label for="gender">Sex</label>
                      </div>
                      </div>
                    <div class="col-3">
                      <div class="form-floating">
                        <select class="form-select" name="course" id="course" aria-label="Floating label select example">
                          <option value="BSIT">BSIT</option>
                          <option value="BSCS">BSCS</option>
                          <option value="BSMath">BSIS</option>
                          <option value="BSMath">BSMath</option>
                          <option value="BSMath">BSBio</option>
                        </select>
                        <label for="course">Course</label>
                      </div>
                    </div>
                    </div>
                    <!-- <div class="col-md-2 mb-3">
                      <input type="number" class="form-control form-control-md" name="age" placeholder="age"/>
                      <label for="Age" class="form-label">Age</label>
                    </div> -->
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <input type="text" name="birthdayPlace" class="form-control" id="birthdayPlace" placeholder="name@example.com">
                        <label for="birthdayPlace">Birthplace</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <input type="text" name="Address" class="form-control" id="Address" placeholder="name@example.com">
                        <label for="Address">Address</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-floating mb-3">
                        <input type="email" name="emailAddress" class="form-control" id="emailAddress" placeholder="name@example.com">
                        <label for="emailAddress">Email</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 mb-2">
                      <div class="form-floating mb-3">
                        <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="name@example.com">
                        <label for="phoneNumber">Phone Number</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="name@example.com">
                        <label for="password">Password</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  </div>
                  <div class="mb-3">
                  <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                <label for="terms" class="form-check-label">I have read and  agreed to the <a href="#">Terms of service</a></label>
                <p>Already have an account? <a href="login.php" id="signIn">SignIn</a></p>
                <div class="mt-2 pt-1">
                    <input data-mdb-ripple-init class="btn btn-primary btn-md" type="submit" value="Submit" name="Submit" />
                </form>
                </div>
              </div>
              </div>
            </div>
        </div>
      </div>
      </section>
  </div>
  <script src="./js/regscript.js"></script>
</body>

</html>

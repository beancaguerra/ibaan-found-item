<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">    
    </script>
    <link rel="stylesheet" href="page.css">
<!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <link href="assets/css/page.css" rel="stylesheet">

</head>
<body>
  
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Lost Item Finder<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <div class="offer_section">
        <div class="offer_container" style="padding: 0px;">
            <div style="padding-top: 5%; width: 100%; height: 88vh;">
                <div class="col-md justify-content-center">
                    <div class="">
                        <div class="detail-box">
                            <div class="vh-100">
                                <div class="py-12 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                            <div class="text-white" style="background-color: rgba(0, 0, 0, 0.592);">
                                                <div class="card-body p-4">
                                                    <div class="mb-md-4 mt-md-4 pb-4">
                                                    <h2>OTP Verification Code</h2>
                                                    <hr class="mb-2">
                                                    <div id="line"></div>
                                                    <form action="otp.php" method="POST" autocomplete="off">
                                                        <?php
                                                        if(isset($_SESSION['message'])){
                                                            ?>
                                                            <div id="alert" style="height: auto;
                                                                            width: 100%;
                                                                            background: #ec9006;
                                                                            padding: 0 15px;
                                                                            font-size: 19px;
                                                                            line-height: 40px;
                                                                            margin: 10px 0;
                                                                            color: #000;
                                                                            border-radius: 4px;"><?php echo $_SESSION['message']; ?></div>
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if($errors > 0){
                                                            foreach($errors AS $displayErrors){
                                                            ?>
                                                            <div id="alert"><?php echo $displayErrors; ?></div>
                                                            <?php
                                                            }
                                                        }
                                                        ?>      
                                                        <input class="form-control form-control-lg" type="number" name="otp" placeholder="Verification Code" required><br>
                                                        <button class="sign-btn" type="submit" name="verify"> Verify </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>
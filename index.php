<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Lost-Item Finder System in Ibaan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link rel="icon" href="./images/logo.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

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
          <li><a href="#hero">Home</a></li>
          <li><a href="#guidelines">Guidelines</a></li>
          <li><a href="#founditem">Found Item</a></li>
          <li><a href="#announcement">Announcement</a></li>
          <li><a href="#signin">Sign in</a></li>
          <li><a href="#signup">Sign up</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero" style="height: 880px;">
    <img src="./images/kultura.jpg" style="width: 100%;
                                             position: absolute;
                                             top: 0px;
                                             height: auto;">
  </section>
  <!-- End Hero Section -->

  <!-- Sign in Section -->
  <section id="signin">
      <div class="container position-relative">
      <div class="row gy-5">
        <div class="col-lg-4 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start" 
                style="margin-right: 15%;
                        margin-top: 0px;
                        border-radius: 5px;">
            <div class="text-white" style="background-color: rgba(0, 0, 0, 0.592); padding-left: 10px; height: 100%; padding-top: 15px;">
                <div class="card-body p-12">
                    <div class="mb-md-12 mt-md-12 pb-12">
                        <h4 style="text-align: center;">Please log in to your account!</h4>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <form action="index.php" method="POST">

                                <?php
                                
                                if($errors > 0){
                                    foreach($errors AS $displayErrors){
                                    ?>
                                    <div id="alert" style="height: auto;
                                                width: 100%;
                                                background: #ec9006;
                                                padding: 0 15px;
                                                font-size: 19px;
                                                line-height: 40px;
                                                margin: 10px 0;
                                                color: #000;
                                                border-radius: 4px;"><?php echo $displayErrors; ?></div>
                                    <?php
                                    }
                                }
                                ?>

                                <div class="form-outline form-white" style="width: 328px;">
                                    <label for="email">Email</label>
                                    <input type="email" id="typeEmailX" class="form-control form-control-sm" id="email" name="email" placeholder="Enter your email..." required />
                                    
                                </div>

                                <div class="form-outline form-white" style="width: 328px;">
                                    <label for="password">Password</label>
                                    <input type="password" id="pass" class="form-control form-control-sm" name="password" placeholder="Enter your password..." required/>
                                    
                                </div>

                                <input style="margin-top: 3px; margin-bottom:25px; margin-right: 12px;" type="checkbox" onclick="myFunction()">Show Password

                                <p class="small mb-4 pb-lg-2 text-center" ><a class="text-white-500" style="color: white;" href="forgot.php">Forgot password?</a></p>

                                <button class="sign-btn" type="submit" name="login">Login</button>

                                <div style="margin-top: 20px;">
                                    <p class="mb-8 text-center" style="margin-top: -10%;">Don't have an account? <a href="user_register.php" class="text-orange-500 fw-bold" style="color: orange;">Sign Up</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="./images/found.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100" style="width: 80%; height: 80%; margin-top: 8%;">
        </div>
      </div>
    </div>
  </section>
  <!-- End of sign in section -->

  <!-- ==== Found Item List === -->
  <section id="founditem" class="services sections-bg">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="section-header">
              <h2>Found Item List</h2>
            </div>
            <div class="box">
                <div class="detail-box" style = "margin: 10px 20px;">
                    <div class="found-class">
                        <div class="item-list">
                            <?php
                                include 'connect_db.php';
                            
                                //showing data from tb_iteminfo to the system
                                $query = "SELECT * FROM tb_itemrecord Order By itemNo DESC" or die("Error");
                                $result = mysqli_query($conn, $query);
                                
                                if ($result)
                                {
                                    // it return number of rows in the table.
                                    $row = mysqli_num_rows($result);
                                        
                                    if ($row)
                                    {
                                        echo "<p class='total-item'>Number of Found Item: $row </p>";
                                    }
                                    // close the result.

                                    //if table has no data
                                    if (mysqli_num_rows($result) == 0) {
                                    echo "<div class='nodata' style='text-align: center'>
                                            <img src='./images/nodata.png' width='120px' height='120px'>
                                            <p>No Found Item Record</p>
                                        </div>";
                                        exit;
                                    }   
                                }
                                
                                while($row=mysqli_fetch_assoc($result))         
                                {
                                ?>
                                <div class="item-container">
                                    <p class="main-title">
                                        <span class="title-one"> CATEGORY: </span><?php echo $row['itemCategory']; ?><br> 
                                        <span class="title"> DATE&TIME FOUND: </span><?php echo $row['timedate']; ?><br>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div id="announcement" class="section-header">
              <h2>Announcement</h2>
            </div>
            <!-- announcement -->
            <div class="box ">
                <div class="detail-box" style = "margin: 10px 20px;">
                    <div class="announce-class">
                    
                        <div class="items">
                            <?php

                                include 'connect_db.php';

                                //showing data from tb_iteminfo to the system
                                $result=$conn->query("SELECT * FROM tb_announcement Order By timedate DESC") or die("Error");
                                //if table has no data
                                if ($result->num_rows == 0) {
                                    echo "<div class='nodata' style='text-align:center'>
                                            <img src='./images/announce.png' width='120px' height='120px'>
                                            <p>No Announcement</p>
                                          </div>";
                                }
                                while($row=$result->fetch_assoc())         
                                {
                                ?>
                                <div class='post-result'>
                                    <div class="post-result-child">
                                        <p class="post-one"><span style='color:#ec9006; font-size: 20px; font-weight:700; margin-right: 20px;'><?php echo $row['subject']; ?></span> </p>
                                        <p><span style='color:#000000; font-size: 13px; font-weight:500; margin-right: 20px;'><?php echo $row['timedate']; ?></span></p>
                                        <p class="post-two"><span style='text-align: justify; color:#000000; font-size: 16px; font-weight:500; margin-right: 20px;'><?php echo $row['caption']; ?></span></p>
                                    </div>
                                </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end announcement -->
          </div>
          </div>
        </div>

      </div>
    </section><!-- End of Found Item Section -->

  <main id="main">
    <!-- ======= Guidelines Section ======= -->
    <section id="guidelines" class="about">
      <div class="container">

        <div class="section-header">
          <h2>Guidelines</h2>
        </div>
        <div class="guide-images" style="width: 100%;">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div style="margin-bottom:12px;">
                        <img src="./images/F-A.png" style="width:100%; height: 80%;" style="position:fixed;">
                        <div class="text" style="color: #0A0909;">List of Found Item in Index Page</div>
                    </div>
                    
                </div>
                <div class="mySlides fade">
                    <img src="./images/proof.png" style="width:100%; height: 80%;">
                    <div class="text" style="color: #0A0909;">Send Proof of Ownership</div>
                </div>
                <div class="mySlides fade">
                    <img src="./images/msg.png" style="width:100%; height: 80%;">
                    <div class="text" style="color: #0A0909;">Residents receive message if the proof of ownership is matched or not matched.</div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
        </div>
        <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span>
        </div>
    </section><!-- End Guideliness Section -->

    <!-- Sign up Section -->
    <section id="signup">
      <div class="container position-relative">
        <div class="order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start" 
                style="margin-right: 15%;
                        margin-top: 0px;
                        border-radius: 5px;
                        width:100%;
                        ">
            <div class="text-white" style="background-color: rgba(0, 0, 0, 0.592); padding-left: 50px; height: 100%; padding-top: 15px;">
                <div class="card-body p-8">
                    <div class="mb-md-8 mt-md-8 pb-8">
                        <h4 style="text-align: center;">Register</h4>
                        <div class="d-flex justify-content-center justify-content-lg-start" style="padding-right:30px;">
                            <form action="index.php" method="POST">

                                <?php
                                
                                if($errors > 0){
                                    foreach($errors AS $displayErrors){
                                    ?>
                                    <div id="alert" style="height: auto;
                                                width: 100%;
                                                background: #ec9006;
                                                padding: 0 15px;
                                                font-size: 19px;
                                                line-height: 40px;
                                                margin: 10px 0;
                                                color: #000;
                                                border-radius: 4px;"><?php echo $displayErrors; ?></div>
                                    <?php
                                    }
                                }
                                ?>

                                <!-- first and last name -->
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="firstname">First name</label>
                                                <input type="text" class="form-control" id= "fname" name="fname" placeholder="Enter first name" required/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="lastname">Last name</label>
                                                <input type="text" id="lname" class="form-control" name="lname" placeholder="Enter last name" required />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="contact">Contact number</label>
                                                <input class="form-control" type="text" id= "contact" name="contact" placeholder="Enter contact number" required >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- contact and address -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="address">House no./Street/Barangay/City/Municality</label>
                                                <input type="text" id="address" class="form-control" name="address" placeholder="Enter address" required />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="gender">Gender</label>
                                                <select  class="form-control" name="gender" id="gender"  required>
                                                    <option value="<?php echo $gender ?>">Select Gender</option>
                                                    <option value="Male"> Male </option>
                                                    <option value="Female"> Female </option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="email">Email address</label>
                                                <input class="form-control" type="email" id= "email" name="email" placeholder="Enter email" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="password">Password</label>
                                                <input class="form-control" type="password" id= "cpass" name="password" placeholder="Enter password" required>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="cpassword">Confirm Password</label>
                                                <input class="form-control" type="password" id= "cpass" name="confirmPassword" placeholder="Confirm your password" required>
                                                
                                            </div>

                                            <input style="margin-top: 22px; margin-bottom:25px;" type="checkbox" onclick="myFunction()">Show Password
                                        </div>
                                    </div>
                                    <!-- Submit button -->
                                    <button class="sign-btn btn-primary btn-block mb-8" type="submit" name="signup"> Sign up </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- end of sign up -->

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

  <style>
        /*found item*/
        .found-class {
            width: 100%;
            margin-bottom: 10px;
            background-color: wheat;
            box-shadow:  1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
            border-radius: 12px;
        }
        .found-title,
        .announce-title {
            color: #ec9006; 
            margin-top: 0px; 
            text-align: center; 
            padding-top: 10px;
            font-size: 20px;
        }
        .item-list {
            align-content: center;
            padding: 10px 25px;
            height: 425px;
            overflow-y: scroll;
        }
        .item-list::-webkit-scrollbar {
            display: none;
          }
        .item-container {
            background: #ddd;
            width: 100%;
            border-radius: 8px;
            position: relative;
            padding: 10px;
            margin-bottom: 10px;
        }
        .main-title {
            padding: 5px;
            line-height: 1.4rem;
        }
        .title-one {
            padding-right: 21px;
        }
        .title {
            padding-right: 5px;
        }
        /* end of css for item list */

        /*Announcement*/
        .announce-class {
            top: -20%;
            width: 100%;
            min-height: 100%;
            margin-bottom: 30px;
            box-shadow:  1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
            border-radius: 12px;
        }
        .items {
            align-content: center;
            padding: 10px 25px;
            height: 425px;
            overflow-y: scroll;
        }
        .items::-webkit-scrollbar {
            display: none;
          }
        .post-result {
            width: 100%;
            padding: 0px;
            background: #f7d27cb9;
            margin-bottom: 15px;
        }
        .post-result-child {
            padding: 10px;
            line-height: 0.7cm;
        }
        /* end of css for anouncement */

        .guide-images{
            width: 100%;
            height: 480px;
            margin-bottom: 10px;
            border-radius: 30px;
            border: 1px solid var(--color-grayish);
            box-shadow:  1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
        }
        /* Slideshow container */
        .slideshow-container {
            padding-top: 20px;
            width: 900px;
            position: relative;
            margin: auto;
            margin-top: 5px;
            z-index: 1;
            }

        /* Caption text */
        .text {
            border-radius: 0 0 13px 13px;
            font-weight: 900;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            top: 448px;
            width: 100%;
            text-align: center;
            }

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: orange;
        }

        /* Caption text */
        .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
        background-color: #717171;
        }

        /* Fading animation */
        .fade {
        animation-name: fade;
        animation-duration: 1000s;
        }

        @keyframes fade {
        from {opacity: 4}
        to {opacity: 4}
        }
        @media screen and (min-width: 585px) and (max-width: 640px) {
            .fade{
                max-width: 460px;
                padding-left: 30px;
            }
            .fade .text{
                width: 50%;
                top:322px;
            }
        }
  </style>

</body>
<script>

    // these code are for show password
    function myFunction() {
      var x = document.getElementById("pass");
      
      if (x.type === "password") {
        x.type = "text";
        
      } else {
        x.type = "password";
        
      }
    }

    // these code are for show password
    function myFunction() {
      var x = document.getElementById("cpass");
      
      if (x.type === "password") {
        x.type = "text";
        
      } else {
        x.type = "password";
        
      }
    }

    //for slideshow part
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }
    
</script>
</html>
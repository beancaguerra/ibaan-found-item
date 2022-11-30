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
</head>
<body>
    <!-- Start header -->
    <div class="container" id="container" style="width: 100%;">
        <div class="header" id="header">
            <img src="./images/ibaan.png" width="100%" height= "55%";/>
        </div>

        <div class="topnav">
            <p>User</p>
        </div>
    <!-- End Header -->

        <div class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container" style="padding: 30px 20% 30px 20%;">
                <!-- log in form -->
                <div class="col-md justify-content-center">
                    <div class="box">
                        <div class="detail-box vh-40" style = "margin: 10px 20px;">
                            <div class="vh-100 gradient-custom">
                                <div class="container py-12 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-10 col-md-10 col-lg-10 col-xl-10">
                                            <div class="card bg-light text-black">
                                                <div class="card-body p-4">
                                                    <div class="mb-md-4 mt-md-4 pb-4">
                                                        <h2>Sign Up</h2>
                                                        <hr class="mb-2">
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
    <style>
        @media screen and (max-width: 900px){
            .container .box{
                width: 334px;
                margin-left: -93px;
            }
            #alert {
                font-size: 12px;
            }
        }
    </style>
</body>
</html>
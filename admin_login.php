<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Lost-Item Finder System in Ibaan</title>
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
            <p>ADMINISTRATOR</p>
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
                                                        <h2 class="fw-bold mb-4 text-center">Log in</h2>
                                                        <hr class="mb-2 ">
                                                        <form action="admin_signin.php" method="POST">

                                                            <?php
                                                                $remarks = isset($_GET['remark_login']) ? $_GET['remark_login'] : '';
                                                                if ($remarks=='failed') {
                                                                    echo ' <div style="height: auto;
                                                                                width: 100%;
                                                                                background: #ec9006;
                                                                                padding: 0 15px;
                                                                                font-size: 19px;
                                                                                line-height: 40px;
                                                                                margin: 10px 0;
                                                                                color: #000;
                                                                                border-radius: 4px;"> Incorrect email or password</div> ';
                                                                }
                                                            ?>

                                                            <div class="form-outline form-white mb-2">
                                                                <label for="email">Email</label>
                                                                <input type="email" id="email" class="form-control form-control-lg" name="admin_email" placeholder="Enter your email..." required/>
                                                                
                                                            </div>

                                                            <div class="form-outline form-white mb-4">
                                                                <label for="password">Password</label>
                                                                <input type="password" id="password" class="form-control form-control-lg" name="admin_password" placeholder="Enter your password..." required/>
                                                                
                                                                <input style="margin-top: 22px; margin-bottom:25px; margin-right: 12px;" type="checkbox" onclick="myFunction()">Show Password
                                                            </div>

                                                            <button class="sign-btn" type="submit">Log in</button>
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

<script>
     // these code are for show password
    function myFunction() {
      var x = document.getElementById("password");
      
      if (x.type === "password") {
        x.type = "text";
        
      } else {
        x.type = "password";
        
      }
    }

</script>
</html>
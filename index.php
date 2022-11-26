<?php include_once ("controller.php"); ?>
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
            <a href="login-page-user.php" style="float:right">Sign in/Sign up</a>
            <!-- <a href="admin_login.php" style="float:right">Admin</a> -->
            
        </div>
    </div>
    <!-- End Header -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
            <div class="row">
                <!-- guideliness -->
                <div class="col-md">
                    <div class="box ">
                        <div class="detail-box" style = "background-color: wheat; margin: 10px 20px;">
                            <h5 class="guidelines-title">
                                Guidelines
                            </h5>
                            <div class="guide">
                                <div class="row grid">
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="box">
                                            <div>
                                                <div class="detail-box">
                                                    <p class="procedure">
                                                        1
                                                    </p>
                                                    <p style="font-size: 22px; text-align: justify;">
                                                        You should register first on this website before you login. You may check the list of found items even if you didn’t login yet.
                                                    </p>
                                                </div>
                                                <div class="detail-box" style="margin-bottom: 20px;">
                                                    <img src="./images/first-page.png" width="100%" height="100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="box">
                                            <div>
                                                <div class="detail-box">
                                                    <p class="procedure">
                                                        2
                                                    </p>
                                                    <p style="font-size: 22px; text-align: justify;">
                                                        If your item is in the list of found items, you should send a proof including image , location, brand, color and description of your item depending on the item. You may click the icon to pop up the form.
                                                    </p>
                                                    <div class="detail-box" style="margin-bottom: 20px;">
                                                        <img src="./images/send-form.png" width="100%" height="100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="box">
                                            <div>
                                                <div class="detail-box">
                                                    <p class="procedure">
                                                        3
                                                    </p>
                                                    <p style="font-size: 22px; text-align: justify;">
                                                        The administrator will send you a message if your proof of ownership is match or unmatch. If the item you send matches, the administrator will verify and send the QR Code of the item and also the password of the qr code. You will present the qr code in the office of administrator.
                                                    </p>
                                                    <div class="detail-box" style="margin-bottom: 20px;">
                                                        <img src="./images/message.png" width="100%" height="100%">
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
            <!-- end guidelines -->
                <div class="row">
                    <!-- announcement -->
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="detail-box" style = "margin: 10px 20px;">
                                <div class="announce-class">
                                    <h5 class="announce-title">
                                    Announcement
                                    </h5>
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
                    </div>
                    <!-- end announcement -->

                    <!-- found item list -->
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="detail-box" style = "margin: 10px 20px;">
                                <div class="found-class">
                                    <h5 class="found-title">
                                        Found Item List
                                    </h5>
                                
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
                                                    <span class="title"> DATE FOUND: </span><?php echo $row['date']; ?><br>
                                                    <span class="title"> TIME FOUND: </span><?php echo $row['time']; ?><br>
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
                    <!-- end found item list -->
                </div>
            </div>
        </div>
    </section>
</body>
</html>
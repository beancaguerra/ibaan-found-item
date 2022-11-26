<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Item Record</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
    </head>
    <?php include 'code_session.php'; ?>
    <body>
        <header>
            <div class="header" id="header">
                <div class="logo-name">
                </div>
            </div>
            <div class="divider">
                <p>Municipality of Ibaan</p>
            </div>
        </header>

        <!--Navigation-->
        <nav class="navigation" id="navigation">
            <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
            <div class="nav-links" id="myDIV">
                <a href="admin_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                <a href="admin_itemRecord.php" class="nav-link active"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
            </div>
        </nav>

        <div class="message-nav-parent">
            <div class="message-nav">
                <a href="admin_itemRecord.php" class="msg-nav-child --msg-active"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">AddItem</a>
                <a href="admin_updateItem.php" class="msg-nav-child"><img src="./images/update-icon.png" width="18" height="18" style="margin-right: 3px;">Update</a>
                <a href="admin_claim_item.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claim</a>
                <a href="admin_claimedItem.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed</a>
            </div>
        </div>

        <div class="search-bar">
            <form class="search-box" action="searchItem.php" method=POST>
                <input class="search" type="text" name="itemCategory" size='20' placeholder="Search Item Category." required>
                <button class="search-btn" title="Search" type="submit" name= "search"><img src="./images/search-icon.png" width="15" height="15"></button>
            </form>
        </div>

        <main>
            <div class="forms-input">
                <!--form inputs-->
                <form class='form' action="code_addItem.php" method="POST" enctype="multipart/form-data">
                    <div class="first-three">
                        <input class="input small" id="finder" type="text" placeholder="Finder" name="finder" required>
                        <input class="input small" id="contact" type="contact" placeholder="Contact..." name="contact" required>
                        <input class="input small" id="itemNo" style="background-color: #cccccc" type="text" placeholder="Item no..." name="itemNo" disabled required>
                    </div>
                    <div class="second-three">
                        <input class="input small" id="time" type="time" placeholder="Time..." name="time" required>
                       <input class="input small" id="date" type="date" placeholder="Date..." name="date" required>
                       <input class="input small" id="itemCategory" type="text" placeholder="Item Category..." name="itemCategory" required>
                    </div>
                   <div class="third-three">
                        <input class="input medium" id="itemLocation" type="text" placeholder="Item Location..." name="itemLocation" required>
                        <input class="input small" id="itemBrand" type="text" placeholder="Item Brand..." name="itemBrand" required>
                        <input class="input small" id="itemColor" type="text" placeholder="Item Color..." name="itemColor" required>
                        <input class="input medium" id="itemDescription" type="text" placeholder="Item Description..." name="itemDescription" required>
                    </div>
                    <div class="fourth-three">
                        <input class="input button-submit" id="submit" type="submit" name="Submit" value="Submit">
                    </div>
                </form>
            </div>
        </main>
        <section class="forms-input">
            <div class="submit-bar">
                <?php
                if(isset($_SESSION['Submit'])){
                    ?>
                    <div class="submit-btn" id="btnClose" style="border:1px solid #bbb; border-radius: 8px; padding:5px; margin:10px 0px; background:#eee; text-align:left; width: 84%"> 
                        <?php echo $_SESSION['Submit']; ?>
                        <button style="border:none; margin-left: 68%; padding: 2px; cursor: pointer; font-size: 20px" type="button" onclick="closeForm()">&times</button>
                    </div>

                    <?php
                    unset($_SESSION['Submit']);
                }
                ?>
            </div>
        </section>
        <section class="form-output" id="form-output">
            <div class="output-container">
                <?php
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL & ~E_NOTICE);
                    //Error_reporting(0);

                    include 'connect_db.php';

                    //showing data from tb_iteminfo to the system
                    $result=$conn->query("SELECT * FROM tb_itemrecord Order By itemNo DESC") or die("Error");
                    $count=$conn->query("select count(1) FROM tb_itemrecord");
                    $rows =  $count->fetch_array(MYSQLI_NUM);

                    $total = $rows[0];
                    echo "<p class='total-item'>Number of Found Item: $total </p>";
                    //if table has no data
                    if ($count->num_rows == 0) {
                        echo "<div class='nodata'>
                                <img src='./images/nodata.png' width='120px' height='120px'>
                                <p>No Data</p>
                            </div>";
                        exit;
                    }
                    while($row=$result->fetch_assoc())         
                    {
                    ?>
                        <div class='output-cont-child' style="width: 115%; margin-left: -5%">
                            <div class="qr-container">
                                <?php
                                echo '<img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl='.md5($row["itemNo"]).'&choe=UTF-8">';
                                ?>

                            </div>
                            <div class="detail-container">
                                <div class="output-one output">
                                    <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Finder: </span><?php echo $row['finder']; ?></p>
                                    <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Contact No: </span><?php echo $row['contact']; ?></p>
                                </div>
                                <div class="output-two output">
                                    <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Time: </span><?php echo $row['time']; ?></p>
                                    <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Date: </span><?php echo $row['date']; ?></p>
                                </div>
                                <div class="output-three output">
                                    <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Category: </span><?php echo $row['itemCategory']; ?></p>
                                    <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Description: </span><?php echo $row['itemDescription']; ?></p>
                                </div>
                                <div class="output-two output">
                                    <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Location: </span><?php echo $row['itemLocation']; ?></p>
                                    <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item No: </span><?php echo $row['itemNo']; ?></p>    
                                </div>

                                <div class="output-delete">
                                    <input style="color:#000000; margin: 10px 50px; border:none; background-color: gray; font-size: 1rem; text-decoration: underline; cursor: pointer;" type="button" onClick="deleteAcc(<?php echo $row['itemNo']; ?>)" name= "Delete" value="Delete">
                                </div>
                            </div>
                        </div>
                     <?php
                    }
                    ?>
            </div>
        </section>

        <!--Back to top button-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop.png" alt="" width="60" height="50"></button>
        <!--JavaScript Codes-->
        <script>
            //Get the button
            var mybutton = document.getElementById("myBtn");
            
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
            //<!------Deleting Record---->
            function deleteAcc(delid)
            {
                if(confirm("Do you want to delete this record?")){
                    window.location.href='delete_added_data.php?id=' +delid+'';
                    setInterval(function(){
                        alert("Deleted Successfully!");}, 3000)
                    return true;
                }
            }

        </script>
    </body>
</htmal>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Accounts</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
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
                <a href="admin_itemRecord.php" class="nav-link"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_reports.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Reports</a>
                <a href="admin_accounts.php" class="nav-link active"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
            </div>
        </nav>
        <div class="message-nav-parent">
            <div class="message-nav">
                <a href="admin_accounts.php" class="msg-nav-child"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">User</a>
                <a href="admin_admin-accounts.php" class="msg-nav-child --msg-active"><img src="./images/admin-ico.png" width="18" height="18" style="margin-right: 3px;">Admin</a>
            </div>
        </div>

        <?php
            $query = "SELECT admin_id FROM tb_admin ORDER BY admin_id DESC";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $lastid = $row['admin_id'];
            if(empty($lastid))
            {
                $number = "A-0000001";
            }
            else
            {
                $idd = str_replace("A-", "", $lastid);
                $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                $number = 'A-'.$id;
            }
        ?>

        <?php
            if($_SERVER["REQUEST_METHOD"]== "POST")
            {
                $admin_id   =   $_POST['admin_id'];
                $fullname   =   $_POST['admin_name'];
                $email      =   $_POST['admin_email'];
                $password   =   $_POST['admin_password'];
            
                if(!$conn)
                {
                    die("connection failed " . mysqli_connect_error());
                }
                else
                {
                    $sql = "INSERT INTO tb_admin(admin_id, admin_name, admin_email, admin_password)VALUES('".$admin_id."','".$fullname."','".$email."', '".$password."') ";
                    if(mysqli_query($conn,$sql))
                    {
                        $query = "SELECT admin_id FROM tb_admin ORDER BY admin_id DESC";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_array($result);
                        $lastid = $row['admin_id'];
            
                        if(empty($lastid))
                        {
                            $number = "A-0000001";
                        }
                        else
                        {
                            $idd = str_replace("A-", "", $lastid);
                            $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                            $number = 'A-'.$id;
                        }
            
                    }
                    else
                    {
                        echo "Record Faileddd";
                    }
                }
            }
        ?>

        <main>
            <section class="forms-input">
                <!--form inputs-->
                <form class='form' action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <div class="first-three">
                            <input type="text" class="form-control" name="admin_id" id="admin_id" style=" font-size: 16px; color: blue; font-weight: bold; "  value="<?php echo $number; ?>" readonly >
                            <input class="input big" type="text" placeholder="Fullname..." name="admin_name" required>
                            <input class="input big" type="email" placeholder="Email..." name="admin_email" required>
                            <input class="input small" type="password" onkeyup="validatePassword(this.value)" placeholder="Password" id="admin_password" name="admin_password" required>
                            <i class="fa fa-eye" id="togglePassword" style="margin: 19px 32px 0px -34px; cursor: pointer; position: absolute;"></i>
                        </div>
                        <div class="third-three">
                            <input class="input button-submit" type="submit" name="Submit" value="Submit">
                        </div>
                </form>
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
            <!--database connection and display section-->
            <section class="form-output" id="form-output">
                <div class="output-container">
                    <?php
                    header("Access-Control-Allow-Origin: *");

                    session_start();
                    
                    ini_set('display_errors',1);
                    //error_reporting(E_ALL & ~E_NOTICE);
                    Error_reporting(0);
                    
                    include 'connect_db.php';

                    //showing data from tb_accounts to the system
                    $query = "SELECT * FROM tb_admin Order by admin_id desc" or die("Error");
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<div class='nodata'>
                                <img src='./images/nodata.png' width='120px' height='120px'>
                                <p>No Data</p>
                              </div>";
                        exit;
                    }
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <!--division for data display-->
                        <div class='output-cont-table'>
                            <table style="width:100%">
                                <tr>
                                    <th style="text-align: left; background-color: #cccccc; color: #ec9006"><h3>Admin Info</h3></th>
                                    <th style="text-align: right; background-color: #cccccc; color: #ec9006">
                                    <a style="color:#ec9006; margin: 10px;" href='Update_admin_acc.php?admin_id=<?php echo $row['admin_id']; ?> & admin_email=<?php echo $row['admin_email']; ?> & admin_name=<?php echo $row['admin_name']; ?> & admin_password=<?php echo $row['admin_password']; ?> & admin_department=<?php echo $row['admin_department']; ?> & admin_campus=<?php echo $row['admin_campus']; ?>'>Edit</a>
                                    <a style="color:#ec9006; margin: 10px;" href='delete_admin_acc.php?id="<?php echo $row['admin_id']; ?>"'>Delete</a></th>
                                </tr>
                                <tr>
                                    <td style="width:50%"><p><span style="font-weight:700;">Name: </span><?php echo $row['admin_name']; ?></p></td>
                                    <td style="width:50%"><p><span style="font-weight:700;">ID: </span><?php echo $row['admin_id']; ?></p></td>
                                </tr>
                                <tr>
                                    <td style="width:50%"><p><span style="font-weight:700;">Email: </span><?php echo $row['admin_email']; ?></p></td>
                                    <td style="width:50%"><p><span style="font-weight:700;">Password: </span><?php echo $row['admin_password']; ?></p></td>
                                </tr>
                            </table>
                         </div>
                    <?php
                        }
                    ?>
                </div>
            </section>
        </main>
        <!--Back to top button-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop.png" alt="" width="60" height="50"></button>
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

            function closeForm() {
                document.getElementById("btnClose").style.display = "none";
                }
            
           // Javascript for show/hide password
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#admin_password');

            togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
            });
        </script>
    </body>
</html>
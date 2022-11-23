<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Scan QR Code</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
        <script src="js/jquery-3.3.1.js"></script>

        <style>
            .buttonContainer a{
                height:2em;
                width:100px;
                font-size:2em;
                vertical-align:middle;
                margin-left:50%;
                
            }
            .buttonContainer img{
                height:100px;
                width:100px;
            }
            
            .textBoxContainer input{
                line-height:40px;
                border: 2px solid rgba(80,80,80,0.2);
                padding: 3px 5px 3px 10px;
                font-size:1.2em;
                margin-left:44%;
            }

            input[type=text]:focus{
               
                border: 2px solid rgba(80,80,80,0.2) !important;
            }

            .passwordContainer{
                width:100%;
                display:inline;
            }
            #passDiv{
                
                margin: auto;
                margin-left:50%;
                width: 50%;
            }

        </style>
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
                <a href="admin_itemRecord.php" class="msg-nav-child"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">AddItem</a>
                <a href="admin_updateItem.php" class="msg-nav-child"><img src="./images/update-icon.png" width="18" height="18" style="margin-right: 3px;">Update</a>
                <a href="admin_claim_item.php" class="msg-nav-child --msg-active"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claim</a>
                <a href="admin_claimedItem.php" class="msg-nav-child"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed</a>
            </div>
        </div>
        <main>  
            <section class="forms-input">
                <div class="output-container" id="realtime">
                    <div class="main-container">
                        <div class="header_container">
                        <h1> CLAIM ITEM</h1>
                        </div>
                        <div class="buttonContainer">
                            <a>
                                <img src="./images/qrscan.png" width="20" height="20">
                            </a>
                        </div>
                        <div class="textBoxContainer">
                            <input type="text" id="txtQrCode" placeholder="Scan QR Code">
                        </div>

                     
                    </div>
                </div>
            </section>
            
            <section class="forms-input" id="passDiv">
                        <div class="passwordContainer">
                            <input type="password" id="txtQRPassword" class="input small" placeholder="Enter Password">
                        </div>
                        <div class="passwordContainer">
                            <button class="input button-submit" onclick="showDetails()" style="margin-left:30px;">Claim</button>
                        </div>
            </section>
        </main>
      
        <!--Back to top button-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop-icon.png" alt="" width="60" height="50"></button>
        <!--JavaScript Codes-->
        <script type="text/javascript">
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
                    window.location.href='delete_claimed.php?id=' +delid+'';
                    return true;
                }
            }

            $(document).ready(function(e){
                $("#txtQrCode").focus();
                $("#passDiv").hide();
            });

            ///TRIGGERS EVENT WHEN SCANNED
            $("#txtQrCode").change(function(e){

                var xQRCode = $(this).val();

                $.ajax(
                {
                    type: "POST",
                    url: "api/api_claim_item.php",
                    data: {'qrCode':xQRCode},
                    dataType:'json',
                    success:function(r){
                        if(r == "1"){
                            $("#passDiv").show();
                        }
                    },
                    error:function(err){
                        console.log(err);
                    }
                }
            );
            });

            function closeForm() {
                document.getElementById("btnClose").style.display = "none";
                }
                

            function showDetails(){
                    
                var qrPassword = $("#txtQRPassword").val();

                $.ajax(
                {
                    type: "POST",
                    url: "api/api_checkpassword.php",
                    data: {'qrPassword':qrPassword},
                    dataType:'json',
                    success:function(r){
                        if(r>0){
                        alert('Item was successfully claimed!');
                        $("#passDiv").hide();
                        $("#txtQRPassword").val('');
                        return;
                        }
                        else if(r==0){
                            
                        alert('Claiming process failed! Either the Item is already claimed or entered password is incorrect!');
                        return;
                        }
                    },
                    error:function(err){
                        console.log(err);
                    }
                }
                );
            }
        </script>
        </main>
    </body>
</html>
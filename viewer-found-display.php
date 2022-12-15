<!-- <//?php

include 'connect_db.php';

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
    echo "<div class='nodata'>
            <img src='./images/nodata.png' width='120px' height='120px'>
            <p>No Data</p>
          </div>";
    }   
}

while($row=mysqli_fetch_assoc($result))
{
?>
    <div class='output-cont-child'>
        <div class="output-one output">
            <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item No: </span><?php echo $row['itemNo']; ?></p>
            <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Category: </span><?php echo $row['itemCategory']; ?></p>
            <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Date&Time: </span><?php echo $row['timedate']; ?></p>
        </div>
    </div>
    
<//?php

}
?> -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost-Item Finder | Found Item</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="icon" href="./images/logo.png" type="image/x-icon">
  <script src="js/jquery-3.3.1.js"></script>
</head>
<body>
  <header>
      <div class="header" id="header">
        <div class="logo-name">
          <div class="hamburger" onclick="myNav()">
            <div class="burger"></div>
            <div class="burger"></div>
            <div class="burger"></div>
          </div>
        </div>
      </div>
      <div class="divider">
          <p>Municipality of Ibaan</p>
      </div>
  </header>
  <nav class="navigation" id="navigation">
    <div class="hamburger-close" onclick="closeNav()">
      <div class="burger --one"></div>
      <div class="burger --two"></div>
      <div class="burger --three"></div>
    </div>
    <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
    <div class="nav-links">
      <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
      <a href="viewer-found.php" class="nav-link active"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
      <a href="viewer-claimed.php" class="nav-link"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
      <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
      <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
      <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
    </div>
  </nav>
  <nav class="navigation">
    <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
    <div class="nav-links" id="myDIV">
      <a href="viewer_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
      <a href="viewer-found.php" class="nav-link active"><img src="./images/found-img.png" width="18" height="18" style="margin-right: 3px;">Found Item</a>
      <a href="viewer-claimed.php" class="nav-link"><img src="./images/claimed-icon.png" width="18" height="18" style="margin-right: 3px;">Claimed Item</a>
      <a href="viewer_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
      <a href="viewer_profile.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Profile</a>
      <a href="viewer_logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
    </div>
  </nav>
        <div class="search-bar">
            <a class="search-back" href='viewer-found.php'><img src="./images/backsearch-icon.png" width="20" height="20"></a>
        </div>
    <main>
      <section class="form-output" id="form-output">
        <div class="output-container" id="realtime">
          <?php

          include 'connect_db.php';
          ini_set('display_errors', 1);
          error_reporting(E_ALL & ~E_NOTICE);
          //Error_reporting(0);

          $idNo = $_GET['itemno'];
          $itemCategory=$_GET['itemCategory'];
          $timedate=$_GET['timedate'];
          $t_id = trim($loggedin_id);

          $query = "SELECT * FROM tb_itemrecord WHERE itemNo=$idNo, itemCategory=$itemCategory, timedate=$timedate";
          $result = mysqli_query($conn, $query);
        ?>
        </div>

        <div class='output-cont-child' style="width: 90%">
            <div class="output-one output">
                <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item No: </span><?php echo $idNo; ?></p>
                <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Category: </span><?php echo $itemCategory; ?></p>
                <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Date&Time: </span><?php echo $timedate; ?></p>
            </div>
            <div class="output-two output">
        </div>
      </section>
    </main>
    <!--back to top botton-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="./images/backtop.png" alt="" width="60" height="50"></button>
    
    <!--These codes are for message form-->
    <!--<button class="open-button" onclick="openForm()" title="Send Proof"><img src="./images/infocontact-icon.png" alt="" width="60" height="50"></button>-->
    <div class="" style="margin-left: 730px;">
        <form action="code_message.php" class="form-container" method="POST" enctype="multipart/form-data" autocomplete="off">

            <div class="message-header">
                <h3>Proof of Ownership Form</h3>
            </div>
            <div class="msg-input">
                <div>
                    <!-- <label for="name">Account Id</label> -->
                    <input type="hidden" value="<?php echo $t_id; ?>" name="accountId" required>
                </div>
                <div>
                    <label for="email">Item No.</label>
                    <input type="text" placeholder="Enter Item No." id="itemnumber" value="<?php echo $idNo; ?>" name="itemnumber" required>
                </div>
                <div>
                    <label for="email">Item Location</label>
                    <input type="text" id="itemLocation" placeholder="Location where the item was lost" name="itemLocation" required>
                </div>
                <div>
                    <label for="email">Item Brand</label>
                    <input type="text" id="itemBrand" placeholder="Enter Brand Name" name="itembrand" required>
                </div>
                <div>
                    <label for="email">Item Color</label>
                    <input type="text" id="itemColor" placeholder="Enter Color" name="itemcolor" required>
                </div>
            </div>
            <div class="msg-img">
                <label for="myfile">Select Image</label>
                <input type="file" id="myfile" name="myfile" accept="image/*" style="color: #ffffff;">
            </div>
            <div class="msg-submit">
                <textarea name="description" style="font: .8rem 'Poppins', Helvetica, sans-serif;" id="description" cols="53" rows="3" placeholder="Write Item's detailed description..."></textarea>
                <button type="submit" onClick="sendSuccess()" class="btn" title="Send"><img src="./images/send-icon.png" alt="" width="30" height="30"></button>
            </div>
        </form>
    </div>
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
        // thses codes are for message form
        function openForm() {
            document.getElementById("myForm").style.display = "block";
            
            }
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            }
        //small devices navigation
        function myNav() {
            document.getElementById("navigation").style.display = "block";
            }
        function closeNav() {
            document.getElementById("navigation").style.display = "none";
            }

        //for realtime fetching
        function loadXMLDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                document.getElementById("realtime").innerHTML = xhttp.responseText;
            }
            };
        //xhttp.open("GET", "viewer-found-display.php", true);
        //xhttp.send();
        }
        setInterval(function(){
            loadXMLDoc();
        },1000)

        window.onload = loadXMLDoc;

        function sendSuccess(){
            if(confirm("Send this message?")){
                window.location.href='viewer-found.php'
                setInterval(function(){
                    alert("Message sent!");}, 3000)
                return true;
            } 
        }

        $("#itemNumber").keyup(function(e){
        var val = this.value;
        val = val.replace(/[^0-9\.]/g, '');
        if (val != "") {
           valArr = val.split('.');
           valArr[0] = (parseInt(valArr[0], 10)).toLocaleString();
           val = valArr.join('.');
        }
        this.value = val;
       });
    </script>
</body>
</html>
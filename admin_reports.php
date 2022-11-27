<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Reports</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    </head>
    <//?php include 'code_session.php'; ?>
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
                <a href="admin_itemRecord.php" class="nav-link"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_reports.php" class="nav-link active"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Reports</a>
                <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
            </div>
        </nav>

        <main>
            <section class="profile-form">
                <div class="profile-cont">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        <h4>Reports of Items</h4>
                                    </div>
                                    <div class="card-body">
                                    
                                        <form action="" method="GET">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>From Date</label>
                                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>To Date</label>
                                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Click to Filter</label> <br>
                                                        <button type="submit" class="btn btn-primary">Filter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card mt-4">
                                    <div class="card-body">
                                        <table class="table table-borderd">
                                            <thead>
                                                <tr>
                                                    <th>Item No</th>
                                                    <th>Item Category</th>
                                                    <th>Item Location</th>
                                                    <th>Item Brand</th>
                                                    <th>Item Color</th>
                                                    <th>Item Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            <?php 
                                                include 'connect_db.php';
                                                
                                                ini_set('display_errors',1);
                                                //error_reporting(E_ALL & ~E_NOTICE);
                                                Error_reporting(0);

                                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                                {
                                                    $from_date = $_GET['from_date'];
                                                    $to_date = $_GET['to_date'];

                                                    $query="SELECT * FROM tb_itemrecord WHERE date BETWEEN '$from_date' AND '$to_date' ";
                                                    $query_run = mysqli_query($con, $query);
                                                    
                                                    if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?= $row['itemNo']; ?></td>
                                                                <td><?= $row['itemCategory']; ?></td>
                                                                <td><?= $row['itemLocation']; ?></td>
                                                                <td><?= $row['itemBrand']; ?></td>
                                                                <td><?= $row['itemColor']; ?></td>
                                                                <td><?= $row['itemDescription']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "No Record Found";
                                                    }
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_REQUEST['bkid'])) {
        $bid = intval($_GET['bkid']);
        $email = $_SESSION['login'];
        $sql = "SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':bid', $bid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $fdate = $result->FromDate;
                $a = explode("/", $fdate);
                $val = array_reverse($a);
                $mydate = implode("/", $val);
                $cdate = date('Y/m/d');
                $date1 = date_create("$cdate");
                $date2 = date_create("$fdate");
                $diff = date_diff($date1, $date2);
                echo $df = $diff->format("%a");
                if ($df > 1) {
                    $status = 2;
                    $cancelby = 'u';
                    $sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':status', $status, PDO::PARAM_STR);
                    $query->bindParam(':cancelby', $cancelby, PDO::PARAM_STR);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':bid', $bid, PDO::PARAM_STR);
                    $query->execute();

                    $msg = "Booking Cancelled successfully";
                } else {
                    $error = "You can't cancel booking before 24 hours";
                }
            }
        }
    }

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Travel and Tourism Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="keywords" content="Tourism Management System In PHP"/>
        <script type="application/x-javascript"> addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            } </script>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="css/style1.css" rel='stylesheet' type='text/css'/>
        <link href="css/style.css" rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-1.12.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: rgb(218, 152, 235);
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: rgb(218, 152, 235);
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }
        </style>
    </head>
    <body>
    <div class="top-header">
        <?php include('includes/header.php'); ?>
        <div class="slider-1 ">
            <div class="container">
                <h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"></h1>
            </div>
        </div>
        <div class="privacy">
            <div class="container">
                <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Tour History</h3>
                <form name="chngpwd" method="post" onSubmit="return valid();">
                    <?php if ($error) { ?>
                        <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?>
                        <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                    <p>
                    <table border="1" width="100%">
                        <tr align="center">
                            <th>#</th>
                            <th>Booking Id</th>
                            <th>Package Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>people</th>
                            <th>Status</th>
                            <th>Booking Date</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $uemail = $_SESSION['login'];
                        $sql = "SELECT a.*, c.PackageName 
                                FROM tblbooking a 
                                INNER JOIN tbltourpackages c ON a.PackageId = c.PackageId
                                WHERE a.UserEmail = :uemail";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <tr align="center">
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td>#BK<?php echo htmlentities($result->BookingId); ?></td>
                                    <td><a href="package-details.php?pid=<?php echo htmlentities($result->PackageId); ?>"><?php echo htmlentities($result->PackageName); ?></a></td>
                                    <td><?php echo htmlentities($result->FromDate); ?></td>
                                    <td><?php echo htmlentities($result->ToDate); ?></td>
                                    <td><?php echo htmlentities($result->people); ?></td>
                                    <td><?php if ($result->status == 0) {
                                            echo "Pending";
                                        }
                                        if ($result->status == 1) {
                                            echo "Confirmed";
                                        }
                                        if ($result->status == 2 and $result->CancelledBy == 'u') {
                                            echo "Canceled by you at " . $result->UpdationDate;
                                        }
                                        if ($result->status == 2 and $result->CancelledBy == 'a') {
                                            echo "Canceled by admin at " . $result->UpdationDate;
                                        }
                                        ?></td>
                                    <td><?php echo htmlentities($result->RegDate); ?></td>
                                    <?php if ($result->status == 2) { ?>
                                        <td>Cancelled</td>
                                    <?php } else { ?>
                                        <td><a href="tour-history.php?bkid=<?php echo htmlentities($result->BookingId); ?>"
                                               onclick="return confirm('Do you really want to cancel booking')">Cancel</a>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <?php $cnt = $cnt + 1;
                            }
                        } ?>
                    </table>
                    </p>
                </form>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
        <?php include('includes/signup.php'); ?>
        <?php include('includes/signin.php'); ?>
        <?php include('includes/write-us.php'); ?>
    </body>
    </html>
    <?php } ?>

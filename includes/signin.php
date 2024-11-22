<?php
session_start();

// Check if pkgid is provided in the URL
if(isset($_GET['pkgid'])) {
    $_SESSION['pkgid'] = $_GET['pkgid'];
}

if(isset($_POST['signin'])) {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        $_SESSION['login']=$_POST['email'];

        // Check if a package ID is stored in the session
        if (isset($_SESSION['pkgid'])) {
            $pkgid = $_SESSION['pkgid'];
            echo "<script type='text/javascript'> document.location = 'package-details.php?pkgid=$pkgid'; </script>";
            exit; // Add this line to stop further execution
        } else {
            // If no package ID is set, simply reload the current page
            echo "<script type='text/javascript'> document.location.reload(); </script>";
            exit; // Add this line to stop further execution
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <section class="login">
                <div class="login-grids">
                    <div class="login-right">
                        <form method="post">
                            <h3>Signin with your account</h3>
                            <input type="text" name="email" id="email" placeholder="Enter your Email" required="">
                            <input type="password" name="password" id="password" placeholder="Password" value="" required="">
                            <input type="submit" name="signin" value="SIGNIN">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                    <h4 style="color:white; font-size:15px; text-align:center; margin-top:10px;">Don't have an account?
                    <span><a class="sig" href="include/signup.php" data-toggle="modal" data-target="#myModal">signup</a></span></h4>
                </div>
            </section>
        </div>
    </div>
</div>
                        <?php include('includes/signup.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

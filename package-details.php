<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
    $pid=intval($_GET['pkgid']);
    $useremail=$_SESSION['login'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $people=$_POST['people'];
    $status=0;
    $sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,people,status) VALUES(:pid,:useremail,:fromdate,:todate,:people,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid',$pid,PDO::PARAM_STR);
    $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
    $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
    $query->bindParam(':todate',$todate,PDO::PARAM_STR);
    $query->bindParam(':people',$people,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $msg="Booked Successfully";
    }
    else 
    {
        $error="Something went wrong. Please try again";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Package Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/style1.css">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
   $(function() {
    var today = new Date().toISOString().split('T')[0];
    $('#datepicker, #datepicker1').attr('min', today);

    $('#datepicker').on('change', function() {
        $('#datepicker1').attr('min', this.value);
        var toDate = $('#datepicker1').val();
        if (toDate && this.value > toDate) {
            alert('The "To" date must be later than the "From" date.');
            $('#datepicker1').val('');
        }
    });

    $('#datepicker1').on('change', function() {
        var fromDate = $('#datepicker').val();
        if (this.value && this.value < fromDate) {
            alert('The "To" date must be later than the "From" date.');
            this.value = '';
        }
    });
});

</script>

<style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: rgb(218, 152, 235);
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap{
        padding: 10px;
        margin: 0 0 20px 0;
        background: rgb(218, 152, 235);
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
</style>				
</head>
<body>
<!-- top-header -->
<?php include('includes/header.php');?>
<!--- /slider ---->
<!--- selectroom ---->
<div class="selectroom">
    <div class="container">	
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <?php 
        $pid=intval($_GET['pkgid']);
        $_SESSION['pkgid'] = $pid;
        $sql = "SELECT * from tbltourpackages where PackageId=:pid";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':pid', $pid, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
            foreach($results as $result)
            {	?>

            <form name="" method="post">
                <div class="packagedetails gap-2">
                    <div class="col-md-4 selectroom_left ">
                        <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-8 selectroom_right">
                        <h2><?php echo htmlentities($result->PackageName);?></h2>
                        <p class="dow">#PKG-<?php echo htmlentities($result->PackageId);?></p>
                        <p><b>Package Type :</b> <?php echo htmlentities($result->PackageType);?></p>
                        <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
                        <p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
                        
                    </div>
                    <h3>Package Details</h3>
                    <p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails);?> </p>	
                    <div class="clearfix"></div>
                </div>
                <div class="packagedetails">
                    <h2>For booking this package</h2>
                    <div class="ban-bottom">
                            <div class="bnr-right">
                                <label class="inputLabel">From</label>
                                <input class="date" id="datepicker" type="date" placeholder="dd-mm-yyyy"  name="fromdate" required="">
                            </div>
                            <div class="bnr-right">
                                <label class="inputLabel">To</label>
                                <input class="date" id="datepicker"  type="date" placeholder="dd-mm-yyyy" name="todate" required="">
                            </div>
                        <div class="col-md-3 bnr-right" style="margin-left:none;">
                            <label class="inputLabel">Number of People:
                            <input type="number" id="people" name="people" min="1" value="1" oninput="calculateTotal(<?php echo htmlentities($result->PackagePrice); ?>)"></span></label>
                        </div><br><br>
                        <div class="col-md-3 room-right ">
                            <h5>Total Price: RS <span id="total-price"><?php echo htmlentities($result->PackagePrice);?></span></h5>
                        </div>
                        </div>
                    <div class="selectroom-info">
                        <ul>
                           
                            <?php if($_SESSION['login'])
                            {?>
                                <li class="spe" align="center">
                                    <button href="payment.php" type="submit" name="submit2" class="btn-primary btn">Book</button>
                                </li>
                            <?php } else {?>
                                <li class="sigi" align="center" style="margin-top: 1%">
                                    <a href="payment.php" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" > Book</a>
                                </li>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                </div>
            </form>
        <?php }} ?>
    </div>
</div>
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signup -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
<script>
    function calculateTotal(basePrice) {
        const people = document.getElementById('people').value;
        const totalPrice = basePrice * people;
        document.getElementById('total-price').innerText = totalPrice;
    }
</script>
</body>
</html>

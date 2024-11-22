<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {	
    header('location:index.php');
} else {
    if(isset($_GET['pid'])) {
        $pid = intval($_GET['pid']);
        
        // Deleting the package
        if(isset($_POST['delete'])) {
            $sql = "DELETE FROM TblTourPackages WHERE PackageId=:pid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pid', $pid, PDO::PARAM_STR);
            $query->execute();
            $msg = "Package Deleted Successfully";
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Package Deletion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
</style>
</head> 
<body>
   <div class="page-container">
       <div class="left-content">
	       <div class="mother-grid-inner">
              <?php include('includes/header.php'); ?>
			  <div class="clearfix"> </div>	
		   </div>

	       <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Delete Tour Package </li>
            </ol>
            
            <div class="grid-form">
                <div class="grid-form1">
                    <h3>Delete Package</h3>
                    <?php if($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                    else if($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <?php 
                            if(isset($pid)) {
                                $sql = "SELECT * FROM TblTourPackages WHERE PackageId=:pid";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':pid', $pid, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                if($query->rowCount() > 0) {
                                    foreach($results as $result) {
                            ?>

                            <form class="form-horizontal" name="package" method="post">
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Package Name" value="<?php echo htmlentities($result->PackageName);?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder="Package Type" value="<?php echo htmlentities($result->PackageType);?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Location</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagelocation" id="packagelocation" placeholder="Package Location" value="<?php echo htmlentities($result->PackageLocation);?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Price in Rs</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder="Package Price" value="<?php echo htmlentities($result->PackagePrice);?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagefeatures" id="packagefeatures" placeholder="Package Features" value="<?php echo htmlentities($result->PackageFetures);?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" readonly><?php echo htmlentities($result->PackageDetails);?></textarea> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
                                    <div class="col-sm-8">
                                        <img src="packageimages/<?php echo htmlentities($result->PackageImage);?>" width="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Last Updation Date</label>
                                    <div class="col-sm-8">
                                        <?php echo htmlentities($result->UpdationDate);?>
                                    </div>
                                </div>
                                <?php }} ?>

                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="delete" class="btn-danger btn">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('includes/footer.php'); ?>
        </div>
    </div>

    <?php include('includes/sidebarmenu.php'); ?>
    <div class="clearfix"></div>
    
    <script>
        var toggle = true;
        $(".sidebar-icon").click(function() {                
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
            } else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                    $("#menu span").css({"position":"relative"});
                }, 400);
            }
            toggle = !toggle;
        });
    </script>
    
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>

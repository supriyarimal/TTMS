<?php if ($_SESSION['login']) { ?>
	<div class="top-header">
		<div class="container">
			<ul class="tp-hd-lft">
				<li class="hm"><a href="index.html"><i class="fa fa-home"></i></a></li>
				<li class="prnt"><a href="profile.php">My Profile</a></li>
				<li class="prnt"><a href="change-password.php">Change Password</a></li>
				<li class="prnt"><a href="tour-history.php">My Tour History</a></li>
			</ul>
			<ul class="tp-hd-rgt">
				<li class="tol">Welcome :</li>
				<li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
				<li class="sigi"><a href="logout.php">/ Logout</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div><?php } else { ?>
	<div class="top-header">
		<div class="container">
			<ul class="tp-hd-lft">
				<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="hm"><a href="admin/index.php">Admin Login</a></li>
			</ul>
			<ul class="tp-hd-rgt">
				<li class="tol">Mobile Number:9843482626</li>
				<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
				<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">/ Sign In</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
<?php } ?>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo">
			<!---<img src="img/logo1.png" alt="" style="height:85px; width:200px;"> --->
		</div>
		<div class="lock">
			<li><i class="fa fa-lock"></i></li>
			<li>
				<div class="securetxt">SAFE &amp; SECURE </div>
			</li>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /header ---->
<!--- footer-btm ---->
<div class="footer-btm">
	<div class="container-fluid">
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1 container-fluid">
						<ul class="nav navbar-nav" style="font-weight:bolder;">
							<li><a href="index.php">Home</a></li>
							<li><a href="About.php">About</a></li>
							<li><a href="package-list.php">Tour Packages</a></li>

							<li><a href="contact.php">Contact Us</a></li>
							
								<li><a href="enquiry.php"> Enquiry </a> </li>
							<div class="clearfix"></div>

						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>

		<div class="clearfix"></div>
	</div>
</div>
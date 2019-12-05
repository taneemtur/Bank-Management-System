<?php
session_start();
include 'includes/dbconnect.php';

	$success = "";

	if(isset($_POST['submit'])){

		$accname = $_POST['firstname'];
		// $accno = $_POST['accno'];
		$acciban = $_POST['iban'];
		$accemail = $_POST['emailid'];
		$accpassword = $_POST['password'];
		// $acctype = $_POST['accounttype'];
		$accbalance = $_POST['accountbalance'];
		$accdate = date('y-m-d');
		$ins_sql = "INSERT INTO accounts(  iban,  accountbalance, accopendate) VALUES 
					('".$acciban."', '".$accbalance."', '".$accdate."', '".$accdate."')";
		$run_sql = mysqli_query($con,$ins_sql);
        $success = "Account added successfully!";

		// $temp = mysqli_affected_rows($con);
		// if($temp>0){

		// 	$in_sql = "INSERT INTO customers(firstname,customerid, iban,emailid, password) VALUES 
		// 			('".$accname."','".$acciban."', '".$accemail."', '".$accpassword."')";
		// 	$ru_sql = mysqli_query($con,$in_sql);

		// 	$success = "Account added successfully!";
		// }else{

		// 	$success = "Something went wrong!";
		// }

	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Credit.com - Credit Company </title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a><img src="img/core-img/logo.png" alt=""></a>
                        </div>

                        <!-- Top Contact Info -->
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="25 th Street Avenue, Karachi, PAK"><img src="img/core-img/placeholder.png" alt=""> <span>25 th Street Avenue, Karachi, PAK</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="info@credit.com"><img src="img/core-img/message.png" alt=""> <span>info@credit.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="credit-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="creditNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <!-- <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">Services</a>
                                        <div class="dropdown">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">Portfolio 1</a></li>
                                                <li><a href="#">Portfolio 2</a></li>
                                                <li><a href="#">Portfolio 3</a></li>
                                            </ul>
                                        </li>
                                    <li><a href="post.html">Blog</a></li> -->
                                    <li><a href="contact.html">Contact</a></li>
                                    <!-- <li><a href="login.html">Login</a></li> -->
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Contact -->
                        <div class="contact">
                            <!-- <a href="#"><img src="img/core-img/call2.png" alt=""> +92123456789 </a> -->
                            <?php if (isset($_SESSION['usr_id']))  ?>
				            <li><a href="logout.php">Log Out</a></li>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Dashboard</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DashBoard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Elements Area Start ##### -->
    <section class="elements-area section-padding-100-0">
       

                <!-- ========== Web Icons ========== -->
                <div class="col-12">
                    <div class="elements-title mb-30">
                        <div class="line"></div>
                        <h2>Admin DashBoard</h2>
                    </div>
                </div>
                <h3>Admin <?php echo $_SESSION['usr_name']; ?></h3>

                <div class="col-12 mb-70">
                    <div class="row">
                        
                        
                          
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="single-icons mb-30">
                                    <i class="icon-diamond"></i>
                                    <a href="addaccount.php"><span>Add Account</span></a>
                                    
                                </div>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        
                            
                        
                            <div class="container">
                            <div class="container">
                            <article class="row">
		<section class="col-lg-8">
			<div class="page-header">
				<h2>Add an account</h2>
			</div>
			<form class="form-horizontal" action="addaccount.php" method="post" role="form">
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Full Name *</label>
						<div class="col-sm-8">
							<input type="text" name="firstname" class="form-control" placeholder="Enter your name" id="firstname" required>
						</div>
				</div>
				<!-- <div class="form-group">
					<label for="number" class="col-sm-3 control-label">Account number *</label>
						<div class="col-sm-8">
							<input type="text" name="accno" class="form-control" placeholder="Enter account number" id="accno" required>
						</div>
				</div> -->
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">IBAN number *</label>
						<div class="col-sm-8">
							<input type="text" name="iban" class="form-control" placeholder="Enter IBAN number" id="iban" required>
						</div>
				</div>
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Email-address *</label>
						<div class="col-sm-8">
							<input type="email" name="emailid" class="form-control" placeholder="Enter Email-address" id="emailid" required>
						</div>
				</div>
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Password *</label>
						<div class="col-sm-8">
							<input type="password" name="password" class="form-control" placeholder="Enter password" id="password" required>
						</div>
				</div>
				<!-- <div class="form-group">
					<label for="name" class="col-sm-3 control-label">Account type *</label>
						<div class="col-sm-8">
							<select class="form-control" name="accounttype" id="accounttype">
								<option>Savings</option>
								<option>Current</option>

							</select>
						</div>
				</div> -->
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Account balance*</label>
						<div class="col-sm-8">
							<input type="text" name="accountbalance" class="form-control" placeholder="Enter the balance" id="accountbalance" required>
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
					<input type="submit" id="submit" name="submit" value = "Submit" class="btn btn-block btn-primary">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
					<h4><?php echo $success ?></h4>
					</div>
				</div>
				


    </article></form>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            
                            <i class="icon-purse"></i>
                         <a href="admin.php"> <span>Dash Board</span></a>  
                        </div>
</section></article></div>
		
		
    
    
                    
                        
                        
            
                    </div>
                </div>
                
            </div>
        </div>
        
                    
                  
    </section>
    <!-- ##### Elements Area End ##### -->

  
        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copywrite-content d-flex flex-wrap justify-content-between align-items-center">
                            <!-- Footer Logo -->
                            <a href="index.html" class="footer-logo"><img src="img/core-img/logo.png" alt=""></a>

                            <!-- Copywrite Text -->
                            <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>
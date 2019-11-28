<?php
session_start();
include_once 'includes/dbconnect.php';
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
                                    <a href="viewloans.php"><span>View Loans</span></a>
                                    
                                </div>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        
                            
                        
                            <div class="container">
                            <div class="container">
                            <article class="row">
		<section class="col-lg-8">
			<div class="page-header">
				<h2>Loans information</h2>
			</div>
			<table class="table table-bordered">
				   		<thead>
				   			<th>Loan ID</th>
				   			<th>Loan type</th>
				   			<th>Loan Amount</th>
				   			<th>Customer ID</th>
				   			<th>Interest</th>
				   			<th>Dated</th>
				   			</thead>
			<?php 

				$ins_sql = "SELECT * FROM loan";
				$run_sql = mysqli_query($con, $ins_sql);

				while($rows = mysqli_fetch_array($run_sql)){

					echo '

					
					    <tbody>
					      <tr>
					        <td>'.$rows['loanid'].'</td>
					        <td>'.$rows['loantype'].'</td>
                            <td>'.$rows['loanamount'].'</td>
                            <td>'.$rows['customerid'].'</td>
					        <td>'.$rows['interest'].'</td>
					        <td>'.$rows['startdate'].'</td>
					      </tr>
					    </tbody>
			 		

					';
				}
				?>
				 </table>

    </article>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            
                            <i class="icon-purse"></i>
                         <a href="admin.php"> <span>Dash Board</span></a>  
                        </div>
</section>
	

</div>

</div>
	
		
		
    
    
                    
                        
                        
            
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
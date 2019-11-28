<?php
session_start();
include 'includes/dbconnect.php';
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
                        <!-- Menu -->
                        <div class="classy-menu">
                        </div>
                        <!-- Contact -->
                        <div class="contact">
                            <!-- <a href="index.html"> LOG-OUT </a> -->
                            <?php if (isset($_SESSION['usr_id']))  ?>
				            <li><a href="logout.php">Log Out</a></li>
				            
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <!-- ##### Header Area End ##### -->
                <!-- ========== Web Icons ========== -->
                <div class="col-12">
                    <div class="elements-title mb-30">
                          <section class="elements-area section-padding-100-0">
                        <h2>Admin DashBoard</h2>
                    </div>
                </div>
                <div>
                <h3>Welcome, <?php echo $_SESSION['usr_name']; ?></h3>
</div>
                <div class="col-12 mb-70">
                    <div class="row">                        
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-purse"></i>
                             <a href="addaccount.php"> <span>Add Account</span></a>  
                            </div>
                        </div>
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-diamond"></i>
                                <a href="deleteaccount.php"><span>Delete Account</span></a>
                                
                            </div>
                        </div>
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-smartphone-1"></i>
                                <a href="grantloan.php"><span>Grant Loan</span></a> 
                                
                            </div>
                        </div>
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-check"></i>
                                <a href="viewaccounts.php"><span>View Accounts</span></a> 
                               
                            </div>
                        </div>                        
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                           
                             <i class="icon-invoice"></i>
                             <a href="depositmoney.php"><span>Deposit Money</span></a> 
                            
                            </div>
                        </div>   
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-smartphone"></i>
                                <a href="withdrawmoney.php"><span>Withdraw Money</span></a> 
                        
                            </div>
                        </div>
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-calculator"></i>
                                <a href="viewloans.php"><span>View Loans</span></a> 
                                
                            </div>
                        </div>
                        <!-- Single Icons -->
                        <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-atm-machine-1"></i>
                                <a href="#"><span>ATM</span></a> 
                                
                            </div>
                        </div> -->
                        <!-- Single Icons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-credit-card-1"></i>
                                <a href="card.php"><span>Debit-Card</span></a> 
                                
                            </div>
                        </div>
                        <!-- Single Icons -->
                        <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="single-icons mb-30">
                                <i class="icon-wallet"></i>
                                <a href="#"><span>Wallet</span></a> 
                                
                            </div>
                        </div> -->
                    </div>
                </div>
                
            </div>
        </div>
      
   
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
<?php

// trans.php
function begin(){
    mysql_query("BEGIN");
}

function commit(){
    mysql_query("COMMIT");
}

function rollback(){
    mysql_query("ROLLBACK");
}

$in_sql = "SELECT * FROM transactions WHERE payeeid = $id";
		$ru_sql = mysqli_query($con, $in_sql);
		$rows = mysqli_fetch_array($ru_sql);
		// $accno = $rows['payeeid'];
		// $ins_sql = "SELECT * FROM transactions WHERE receiveid = '$accno'";
		// $run_sql = mysqli_query($con, $ins_sql);
		while($rows = mysqli_fetch_array($ru_sql)){
			echo '
				<tbody>
					      <tr>
					        <td>'.$rows['transactionid'].'</td>
                            <td>'.$rows['paymentdate'].'</td>
                            <td>'.$rows['payeeid'].'</td>
                            <td>'.$rows['receiveid'].'</td>
                            <td>'.$rows['amount'].'</td>
                            <td>'.$rows['paymentstate'].'</td>
					      </tr>
					    </tbody>
				
			';
		}
    ?>
    
    </table>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            
                            <i class="icon-purse"></i>
                         <a href="customer.php"> <span>Dash Board</span></a>  
                        </div>

</section></article></div>
		
    
    
                    
                        
                        
            
                    </div>
                </div>
                
            </div>
        </div>
        
                    
                  
    </section>
    <!-- ##### Elements Area End ##### -->

    <!-- ##### Newsletter Area Start ###### -->
    <section class="newsletter-area section-padding-100 bg-img jarallax" style="background-image: url(img/bg-img/6.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="nl-content text-center">
                        <h2>Subscribe to our newsletter</h2>
                        <form action="#" method="post">
                            <input type="email" name="nl-email" id="nlemail" placeholder="Your e-mail">
                            <button type="submit">Subscribe</button>
                        </form>
                        <!-- <p>Curabitur elit turpis, maximus quis ullamcorper sed, maximus eu neque. Cras ultrices erat nec auctor blandit.</p> -->
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- ##### Newsletter Area End ###### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <h5 class="widget-title">About Us</h5>
                        <!-- Nav -->
                        <nav>
                            <ul>
                                <li><a href="index.php">Homepage</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="services.html">Services &amp; Offers</a></li>
                                <!-- <li><a href="#">Portfolio Presentation</a></li> -->
                                <li><a href="post.html">The News</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <!-- <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <h5 class="widget-title">Solutions</h5>
                        
                        <nav>
                            <ul>
                                <li><a href="#">Our Loans</a></li>
                                <li><a href="#">Trading &amp; Commerce</a></li>
                                <li><a href="#">Banking &amp; Private Equity</a></li>
                                <li><a href="#">Industrial &amp; Factory</a></li>
                                <li><a href="#">Financial Solutions</a></li>
                            </ul>
                        </nav>
                    </div>
                </div> -->

$result = mysql_query($query);

if(!$result){
    rollback(); // transaction rolls back
    echo "transaction rolled back";
    exit;
}else{
    commit(); // transaction is committed
    echo "Database transaction was successful";
}

?>
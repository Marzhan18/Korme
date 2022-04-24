<?php include "server1.php" ?>
<?php include "includes/header.php" ?>
<!DOCTYPE html>
<html lang="en">
<title>Happy Life My Account</title>
	<body >

		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" style="font-family: 'Oswald', sans-serif;"><b>My Account</b></h1>
          </div>
        </div>
      </div>
    </div>
  

    <section class="container-fluid" style="font-family: 'Oswald', sans-serif;">
    	<div class="container">
				<div class="row">
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
						<div class="heading-section-bold mb-5 mt-md-5">
							<div class="ml-md-0">
								<h2 class="mb-4" style="font-size: 45px;"> HI. I'm <?php echo $_SESSION['username']; ?></h2>
							</div>
	                    </div>
	                    <div class="pb-md-5">
                            <h1><a class="navbar-brand"><b>About me: </b></a></h1>
	          				<h4><a>My phone number is 877777777
	          					<?php 
                      $user = $_SESSION['username'];
                      $conn = oci_connect('test', '123', 'localhost/orcl12c');
                      $query = oci_parse($conn ,'SELECT * FROM artists WHERE username = :username');
                     oci_bind_by_name($query, ':username', $user);
                     oci_execute($query);
                     while (($row = oci_fetch_assoc($query)) != false) {  
                     echo $row['PHONE']; 
                     }?></a></h4>
                     <h4><a>My email is 
<?php echo $_SESSION['username']; ?></a></h4>
                    <form method="post">
                      <input type="submit" name="button1" class="btn btn-outline-secondary" value="DELETE ACCOUNT" /> 
                    </form>
                     <?php
                    if(array_key_exists('button1', $_POST)) { 
                                button1(); } 
                    function button1() { 
                    $conn = oci_connect('test', '123', 'localhost/orcl12c');
                    if (!$conn) {
                        $e = oci_error();
                        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                    }

                    $p1 = $_SESSION['artists_id'];

                    $stid = oci_parse($conn, 'begin delete_artist(:p1); end;');
                    oci_bind_by_name($stid, ':p1', $p1);
                    oci_bind_by_name($stid, ':p2', $p2);

                    oci_execute($stid);

                    print "$p1\n";  
                    oci_free_statement($stid);
                    oci_close($conn);
                    }
    ?>                      
                  <button type="button" name="update" class="btn btn-outline-secondary">Update Account</button>
	          			</div>
					    </div>
					<div class="col-sm-6 col-lg-4  img img-2 d-flex justify-content-center align-items-center" >
						<div class="card text-center">
              <?php 
                $user = $_SESSION['username'];
                $conn = oci_connect('test', '123', 'localhost/orcl12c');
                $query = oci_parse($conn ,'SELECT * FROM artists WHERE username = :username');
                     oci_bind_by_name($query, ':username', $user);
                     oci_execute($query);     
                         
                          while (($row = oci_fetch_assoc($query)) != false) {
                            echo '
                            <a href="#" class="img-prod"><img class="img-fluid" style="height: 260px;" src="images/'.$row['IMAGE'].'" ></a>
                           ';
                            } 
                            ?>
                           
				

</section>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
<?php include "includes/footer.php" ?>
  </body>
</html>

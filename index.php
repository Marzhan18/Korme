<?php include "includes/header.php" ?>
<?php include "server1.php" ?>
<!DOCTYPE html>
<html lang="en">
<title>Korme</title>

  <body>
		<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        	<h3 class="v">Korme</h3>
        	<h3 class="vr">Since - 2020</h3>
          <div class="col-md-11 ftco-animate text-center">
            <h1>Korme</h1>
            <h2><span>new breath</span></h2>
          </div>
          <div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
						</a>
				</div>
        </div>
      </div>
    </div>

    <div class="goto-here"></div>


    <section class="ftco-section bg-light">
        <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h1 class="big">ALL</h1>
            <h2 class="mb-4">ALL</h2>
          </div>
        </div>
        </div>
<?php 
                     $index = 0;
                     $stid = oci_parse($conn, 'SELECT * from art');oci_execute($stid);
                    while (($row = oci_fetch_assoc($stid)) != false) {
                      if ($index % 4 == 0) 
                        {echo '<div class="container-fluid" style="display: flex; flex-wrap: wrap;"><ul class="arts_l" > ';}
                        echo '
                        <div class="col-sm col-md-8 col-lg ftco-animate" >
                        <div class="product" style = "height: 50%; ">
                        <a href="#" class="img-prod"><img class="img-fluid" src=" '.$row['URL'].'" ></a>
                        <div class="text py-2 px-2">
                            <h3><a href="#">'.$row['AUTHOR'].' '.$row['TITLE'].' </a></h3>
                            
                          </div>
                          </div>
                          </div>';
                          if (($index + 1) % 4 == 0 ){ echo '</ul>
                        </div>';}
                        $index += 1 ; 

                        }
                        ?>                
    </section>  
	<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h1 class="big">Subscribe</h1>
                <h2>Subscribe</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include "includes/footer.php" ?>



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

  </body>
</html>

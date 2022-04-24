<?php include "includes/header.php" ?>
<?php include "server.php" ?>
<!DOCTYPE html>
<html lang="en">
<title>Happy life</title>
<meta charset="utf-8">

<link rel="stylesheet" href="feedback/vendors/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="feedback/css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <body>
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Arts</h1>
          </div>
        </div>
      </div>

    </div>
    <section class="ftco-section ">
        <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h1 class="big"> MY Arts</h1>
            <h2 class="mb-4"> MY Arts</h2>
          </div>
        </div>
        </div>
      
    <div class="container-fluid" style="font-family: 'Oswald', sans-serif;">     
            <ul class="arts_l" >
              <?php 
                $user = $_SESSION['username'];
                $conn = oci_connect('test', '123', 'localhost/orcl12C');
                $query = oci_parse($conn ,'SELECT * FROM arts WHERE author = :username');
                     oci_bind_by_name($query, ':username', $user);
                     oci_execute($query);     
                         
                          while (($row = oci_fetch_assoc($query)) != false) {
                            echo '<div class="container-fluid" style="display: flex; flex-wrap: wrap;">

        <ul class="arts_l" > ';
                            echo '
                            <div class="col-sm col-md-8 col-lg ftco-animate" >
                            <div class="product" style = "height: 50%; ">
                            <a href="#" class="img-prod"><img class="img-fluid" style="height: 260px;" src="'.$row['IMAGE'].'" ></a>
                            <div class="text py-2 px-2">
                                <h3><a href="#">'.$row['AUTHOR'].' '.$row['TITLE'].' '.$row['PRICE'].'$'.'</a></h3>
                                </div>
                              </div>

                              </div>
                              </div>';
                            } 
                            ?>
                            </ul>
                        </div>
<section class="button_art">
      <style>
        .button_art{
          padding:50px;
        }
      </style>
      <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#feedbackFormModal">Add Art</button>
<div class="modal" id="feedbackFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"><a class="navbar-brand"><strong><?php echo $_SESSION['username']; ?></strong> Please, fill it.</a></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="about me.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" class="control-label"><a class="navbar-brand">Title of art</a></label>
            <input id="name" type="text" name="title" class="form-control" value="" placeholder="TITLE">
            </div>
          <div class="form-group">
            <label for="name" class="control-label"><a class="navbar-brand">Style of art</a></label>
            <input id="name" type="text" name="style" class="form-control" value="" placeholder="STYLE">
            </div>  
          <div class="form-group">
            <label for="name" class="control-label"><a class="navbar-brand">Price of art</a></label>
            <input id="name" type="text" name="price" class="form-control" value="" placeholder="PRICE">
            </div>
          <div class="form-group">
            <label  ><a class="navbar-brand">Upload image</a></label>
            <input id="name" type="text" name="image" class="form-control" value="" placeholder="IMAGE">
            </div>    
           <input type="submit" class="btn btn-outline-secondary" name="upload" value="SUBMIT MY ART">
          <?php if(isset($_POST['upload'])){
              $username = $_SESSION['username'];
              $title = strip_tags(trim($_POST ['title']));
              $style = strip_tags(trim($_POST ['style']));
              $price = strip_tags(trim($_POST ['price']));
              $image = strip_tags(trim($_POST ['image']));
              $_SESSION['style'] = $style;
              $_SESSION['img'] = $img;

              $query = oci_parse($conn, 'INSERT INTO arts ( TITLE, PRICE,STYLE, IMAGE, AUTHOR)
                            VALUES (:title, :price, :style, :image, :author)');
              oci_bind_by_name($query, ':title', $title);
              oci_bind_by_name($query, ':price', $price);
              oci_bind_by_name($query, ':style', $style);
              oci_bind_by_name($query, ':image', $image);
              oci_bind_by_name($query, ':author', $username);
              oci_execute($query);

            }
           ?>  
          
</form>
      </div>
    </div>
  </div>
</div>

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
  <script src="feedback/vendors/jquery/jquery-3.3.1.min.js"></script>
  <script src="feedback/vendors/bootstrap/js/bootstrap.min.js"></script>
  <script src="feedback/js/main.js"></script>



  </body>
</html>

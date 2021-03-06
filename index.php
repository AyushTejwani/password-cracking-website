<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trial</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>
<?php 
 $time=0;
 $cores=0;
 $strength;
 $requestType=$_SERVER['REQUEST_METHOD'];
echo $requestType;
echo $_POST['password'];
if($requestType=='POST')
{
	$time=shell_exec(' cd /home/vagrant/cloud/ &&  time mpirun  ./bin/mpi-cracker -bluns -p $(echo -n '.$_POST['password'].' | sha256sum)  2>&1 &');
	$strength=shell_exec(' cd /home/vagrant/cloud/ && python strength.py '.$_POST['password'].' 2>&1 &');
	$imp=shell_exec(' cd /home/vagrant/cloud/ && python improvements.py '.$_POST['password'].' 2>&1 &');
	echo $time;
	echo gettype($time);
	echo substr($time,21,5);
	$cores=1;
	
}
?>
  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Password Strength Checker</a>
      <a class="btn btn-primary" href="#">Know more</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Enter your password to check if it is strong enough!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form method="POST" action="./index.php">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">

                <input type="password" name="password" name="password" class="form-control form-control-lg" placeholder="Type your password">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Check it!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h1>Time</h1>
            <h3><?php echo substr($time,21,5);?> seconds</h3>
            <p class="lead mb-0">Find out how much time was taken to display the results</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h1>Cores</h1>
            <h3><?php echo $cores;?></h3>
            <p class="lead mb-0">Check how many cores are being used</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h1>Strength</h1>
            <h3><?php echo $strength;?></h3>
            <p class="lead mb-0">How strong your password is</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
   <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/lock.jpeg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Improvements</h2>
          <p class="lead mb-0">
	      <?php  echo $imp;?>
	      </div>
      </div>
     
    </div>
  </section>

  <!-- Testimonials -->




  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

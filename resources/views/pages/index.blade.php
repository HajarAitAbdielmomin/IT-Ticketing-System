<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IT Ticketing System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" ></head>
    

  <link href="{{ asset('images/help.png') }}" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href=" {{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css ') }}" rel="stylesheet">
  <link href=" {{asset('vendor/swiper/swiper-bundle.min.css ')}}" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
  

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
    
      <h1 class="logo"><a><img   src="{{ asset('images/indeximg.png') }}" width="100px"   /></a></h1>
     

      <nav id="navbar" class="navbar">
        
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
   
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" onclick=" openForm()" style="cursor: pointer">Log In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
    </div>
  
  </header><!-- End Header -->
     
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          
@if(request()->session()->has('userNotExiste'))
	<div class="row no-gutters">
		<div class="col-lg-10 col-md-12 ml-auto">
			<div class="alert alert-danger fade show" id="Me" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 0;background-color: transparent;border: 0;
       -webkit-appearance: none;">
			    	<span aria-hidden="True" style="margin-left: 20em; font-size: 1.5rem;font-weight: 700;text-shadow: 0 1px 0 #fff;
    color: #000;">&times;</span>
			  	</button>
			 	<h4 class="alert-heading">Error !!</h4>
			  	<p>{{request()->session()->get('userNotExiste')}}</p>
			</div>
		</div>
	</div>  
{{request()->session()->forget('userNotExiste')}}
@endif
          <h1>Elegant and creative solutions</h1>
          <h2>LogIn and tell us about your technical problems.</h2>
          <div class="d-flex">
            <a  class="btn-get-started scrollto" onclick=" openForm()">Login	</a>
          
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
        
        <img src="{{ asset('images/Solution_mindset.png') }}" class="img-fluid animated" alt="">
          
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->
  
  
<!-- end -->
  <main id="main">

<br><br>
<br>    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="{{ asset('images/aboutUs.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Learn how IT ticketing can help your organization.</h3>
            <p class="fst-italic">
When you encounter technical issues at work, who do you turn to for help? The team goes by different names: help desk, customer support desk, IT (Information Technology) support, service desk. They are the technology experts who solve the system issues at a company.

Their key tool is an IT ticketing system. It’s the linchpin enabling help desk to assist internal and external customers efficiently and in a timely manner. Every organization with a help desk requires a <strong style="color:#0970b5">ticketing system.</strong>            
			</p>
			<b>Types of IT tickets :</b>
            <ul>
              <li><i class="bi bi-check-circle"></i> <strong style="color:#0970b5">Feature requests:</strong> When your IT services lack a feature that can benefit users or grow the business, that feature is collected in a feature request ticket.</li>
              <li><i class="bi bi-check-circle"></i> <strong style="color:#0970b5">Incidents:</strong> An incident is an IT term referring to an unplanned disruption to an IT system.</li>
              <li><i class="bi bi-check-circle"></i> <strong style="color:#0970b5">Maintenance and service requests:</strong> IT systems require routine maintenance. Its users also have needs such as resetting account passwords.</li>
            
			<li><i class="bi bi-check-circle"></i> <strong style="color:#0970b5">Lines of business or teams:</strong> If your company offers multiple products or tasks are frequently split between different IT teams, such as hardware versus software groups, categorizing tickets by lines of business or teams helps to streamline workflows and resolve issues faster.

</li>
            </ul>        
		   
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $clients }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $Tickets }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Tickets</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $solvedTickets }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Solved Tickets</p>
          </div>
           
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $unSolvedTickets }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Unsolved Tickets</p>
          </div>
        

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <span>Services</span>
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-business-time"></i></div>
              <h4><a href="">Business integration</a></h4>
              <p>Streamline help desk management processes with business app integrations.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-chart-line"></i></div>
			  <h4><a href="">Problem management</a></h4>
              <p>Analyze the root cause of problems and reduce recurring incidents.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-file-alt"></i></div>
              <h4><a href="">Reports and dashboards</a></h4>
              <p>Gain quick insights on your help desk processes with the built-in reporting module.</p>
            </div>
          </div>

          

        

        </div>

      </div>
   
</section>
   

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
        
        </div>

        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>34 Ghandi Street, Kenitra, Morocco</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>aithajar55@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+212601409071</p>
              </div>

 <center><div class="mapouter"><div class="gmap_canvas"><iframe width="947" height="290" id="gmap_canvas" src="https://maps.google.com/maps?q=34%20Rue%20Ghandi,%20K%C3%A9nitra,%20Maroc&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org"></a><br><style>.mapouter{position:relative;text-align:right;height:290px;width:947px;}</style><a href="https://www.embedgooglemap.net">how to copy a map from google maps</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:290px;width:947px;}</style></div></div> </div></center>
            </div>

          </div>

         

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="social-links">
          
          <a href="https://www.twitter.com/abdielmomin" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.facebook.com/kazuha.toyama.00" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://colorlib.com/etc/404/colorlib-error-404-9/" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="https://www.linkedin.com/in/hajar-ait-abdielmomin-98638421b" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>DevelopIt</span></strong>. All Rights Reserved
      </div>
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  
  <script src=" {{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js ') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js ') }}"></script>
     <script src="{{ asset('vendor/php-email-form/validate.js ') }}"></script>
      

  <!-- Template Main JS File
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  -->
  <script src=" {{ asset('js/main.js') }}"></script>
  
<div class="full-container">
    <div class="popup-container">
        <label class="close-btn fas fa-times" onclick="closeForm()"></label>
     
		<h5 class="card-title text-center mb-5 fw-light fs-5 "><strong>Login Form</strong></h5>
        <form action="{{ url('user') }}" class="needs-validation" method="POST" novalidate>
        {{ csrf_field() }}
     
        <div class="form-floating mb-3">
    
      <input type="email" class="form-control" id="uname" placeholder="Enter username" id="floatingInput" name="email" required>
	   <label for="floatingInput">Email address</label>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field with a valid email.</div>
    </div>
    
   <div class="form-floating mb-3">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password"  id="floatingPassword" name="password" required>
	  <label for="floatingPassword">Password</label>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
   
  <div class="d-grid">
                <input class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" value="Login" name="send">
                  
              </div>
  </form>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
  $(document).ready(function(){
 
    $('#Me').show();
 
});
  </script>
</body>

</html>
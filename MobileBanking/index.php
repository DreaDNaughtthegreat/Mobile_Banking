<?php
// Initialize the session
session_start();
require_once './resources/config.php';
$conn = DatabaseConnection::getInstance();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <title>Home
    <?php echo $siteName ?>.com
  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="shortcut icon" href="./resources/logo.jpg">

  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.css" />
  <script src="./resources/menu.js?v=10"></script>
  <link rel="stylesheet" href="./resources/menu.css?">
  <link rel="stylesheet" href="./resources/style.css?v=<?php echo time() ?>">
  <style>
    .body-bg {
      background-image: url('./resources/wavybg.svg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
    }
  </style>
</head>

<body class="container-fluid bg-dark mx-0 px-0 body-bg ">
  <!--including the menu-->
  <?php include "./resources/menu.php" ?>

  <!-- Hero Section -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Empowering Finances, One Transaction at a Time.</h1>
          <h2>Transforming Banking for Today's Mobile Lifestyle. Your Financial Freedom, Our Innovation.</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="./users/new_customer.php" class="btn-get-started scrollto">Get Started</a>
            <a href="<?php echo $youtubeChannel ?>" class="glightbox btn-watch-video"><i
                class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="./img/banking.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
 

<!-- About Us Section -->
<section id="about" class="about text-light">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2 class="text-light">About Mobile Banking</h2>
    </div>
    <div class="row content">
      <div class="col-lg-6">
        <p class="text-light">
          Welcome to Mobile Banking, where we're not just providing financial services – we're redefining the way you
          manage your finances on the go. Our dedicated team is committed to crafting a seamless mobile banking
          experience, making your financial transactions smarter, simpler, and more intuitive.
        </p>
        <h2>Our Expertise</h2>
        <p>We specialize in a range of services, including:</p>
        <ul>
          <li><i class="ri-check-double-line"></i>
            <h3>Mobile Banking Solutions</h3>
            <p>We design and develop mobile banking applications that provide secure and convenient access to your
              accounts, from fund transfers and bill payments to account management and financial insights.</p>
          </li>
        </ul>
      </div>
      <!--the right half-->
      <div class="col-lg-6 pt-4 pt-lg-0">
        <ul>
          <li><i class="ri-check-double-line"></i>
            <h3>User-Centric Design</h3>
            <p>We believe mobile banking should be more than just transactions; it should be a personalized experience
              tailored to your financial needs. Our team works closely with you to create a mobile banking app that
              reflects your unique preferences, ensuring a user-friendly and efficient interface.</p>
          </li>
          <li><i class="ri-check-double-line"></i>
            <h3>Security</h3>
            <p>Your financial security is our priority. Our mobile banking app is equipped with advanced security
              measures to safeguard your transactions and sensitive information, providing you with peace of mind.</p>
          </li>
          <li><i class=""></i>
            <a href="./users/new_customer.php" class="btn-learn-more">Create Account</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- End About Us Section -->


    
  <!-- Cta Section -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">

    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        <h3>Join the Mobile Banking Revolution</h3>
        <p> At <?php echo $siteName ?>, we're not just innovators; we're your partners in shaping a smarter future.
          Embrace the power of mobile banking, cutting-edge app development, and secure financial solutions. Don't let
          technology leave you behind. Connect with us today to explore how we can transform your financial world with
          intelligent, user-friendly solutions tailored just for you. Let's create something extraordinary together!
        </p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="./users/new_customer.php">Create Account</a>
      </div>
    </div>

  </div>
</section>
<!-- End Cta Section -->



<!-- Frequently Asked Questions Section -->
<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Frequently Asked Questions</h2>
      <p>Have questions about how Mobile Banking works and what services we offer? We've compiled a list of common questions
        and answers about our banking services, our approach, and how we ensure a secure and convenient banking
        experience for you.</p>
    </div>

    <div class="faq-list">
      <ul>
        <li data-aos="fade-up" data-aos-delay="100">
          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
            data-bs-target="#faq-list-1">What innovative banking solutions does Mobile Banking offer? <i
              class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
            <p>
              Mobile Banking specializes in a range of cutting-edge banking solutions, including secure mobile app
              development, seamless online transaction processing, and personalized financial management tools. Our
              expertise lies in integrating modern technology into practical, user-friendly applications for a seamless
              banking experience.
            </p>
          </div>
        </li>

        <li data-aos="fade-up" data-aos-delay="200">
          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"
            class="collapsed">How does Mobile Banking ensure the security of online transactions? <i
              class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
            <p>
              At Mobile Banking, we prioritize the security of your online transactions. We implement advanced encryption
              protocols, multi-factor authentication, and continuous monitoring to safeguard your financial
              information. Our commitment is to provide you with a secure and reliable online banking experience.
            </p>
          </div>
        </li>

        <li data-aos="fade-up" data-aos-delay="300">
          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
            class="collapsed">How can I access Mobile Banking services on my mobile device? <i
              class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
            <p>
              Accessing Mobile Banking services on your mobile device is easy. Simply download our official mobile app
              from the App Store or Google Play, and follow the on-screen instructions to set up your account. You can
              then enjoy convenient and secure banking on the go.
            </p>
          </div>
        </li>
      </ul>
    </div>

  </div>
</section>
<!-- End Frequently Asked Questions Section -->



   <!-- Testimonials Section -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Client Testimonials</h2>
      <p>Discover what our satisfied clients have to say about their experiences with our mobile banking services.</p>
    </div>

    <div class="row">

      <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="./img/testimonials/testimonial-1.jpg" class="img-fluid" alt="Customer"
              loading="lazy"></div>
          <div class="member-info">
            <h4>Walter Omollo</h4>
            <span>Mobile Banking Enthusiast</span>
            <p>"The mobile banking solutions provided by this team have revolutionized how I manage my finances.
              Exceptional service and support!"</p>

            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="./img/testimonials/testimonial-2.jpg" class="img-fluid" alt="Customer"
              loading="lazy"></div>
          <div class="member-info">
            <h4>Johnson Kipchumba</h4>
            <span>Mobile Banking Entrepreneur</span>
            <p>"My experience with their mobile banking solutions was outstanding. They delivered a user-friendly and
              secure mobile app that exceeded my expectations."</p>

            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="./img/testimonials/testimonial-3.jpg" class="img-fluid" alt="Customer"
              loading="lazy"></div>
          <div class="member-info">
            <h4>Julius Muthike</h4>
            <span>Mobile Banking Security Manager</span>
            <p>"Their expertise in mobile banking security has significantly enhanced our app's safety features. Highly
              reliable and professional service."</p>

            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="./img/testimonials/testimonial-4.jpg" class="img-fluid" alt="Customer"
              loading="lazy"></div>
          <div class="member-info">
            <h4>Deep Horizon Tech Africa</h4>
            <span>Mobile Tech Firm</span>
            <p>"I am thoroughly impressed with their mobile banking consultation services. Their insights and strategies
              have greatly benefited our app operations."</p>

            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Testimonials Section -->


  </main>
  <!-- End #main -->

  <!-- Footer -->
  <footer id="footer">

    

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>
              <?php echo $siteName ?>
            </h3>
            <p>
              <?php echo $siteLocation ?> <br><br>
              <strong>Phone:</strong>
              <?php echo $siteContact ?><br>
              <strong>Email:</strong>
              <?php echo $siteEmail ?><br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="./resources/TermsOfService.php">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="./resources/PrivacyPolicy.php">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Deposit</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Quick Loans</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Logbook Loans</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hire Purchase</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Withdrawals</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Join our online community and be a part of the conversation. Follow us on our social platforms</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>
            <?php echo $siteName ?>
          </span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">
          <?php echo $siteName ?>
        </a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!--  JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/js/glightbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="./resources/main.js"></script>

  <script>
    $(document).ready(function () {
     
      window.history.replaceState('', '', window.location.href)
    });
  </script>
</body>

</html>
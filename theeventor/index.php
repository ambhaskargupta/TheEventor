<!-- index.php-->
<?php include 'config.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome to The Eventor Live</title>
    <link rel="icon" type="image/x-icon" href="../admin/assets/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-festava-live.css" rel="stylesheet">
    <script src="../admin/assets/modules/jquery.min.js" type="text/javascript"></script>
    <link href="../admin/assets/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css"/>
    <script src="../admin/assets/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
    <link href="jquery/jquery-confirm.min.css" rel="stylesheet" type="text/css"/>
    <script src="jquery/jquery-confirm.min.js" type="text/javascript"></script>
    <link href="css/bootstrap.datetime.css" rel="stylesheet" type="text/css"/>
    <script src="js/bootstrap.datetime.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
if(isset($_GET['pay'])){
    if($_GET['pay']==1){ 
        $msd = '<img src=\"images/Paymentsuccessful21.png\">';
    }
    if($_GET['pay']==2){
        $msd =  '<img src=\"images/Payment-Failure-1.png\">';
    }
    echo '<script>
            $.dialog({
                theme: "material",
                title: false,
                content: "'.$msd.'",
                animation: "zoom",
                columnClass: "medium",
                closeAnimation: "scale",
                backgroundDismiss: false
            });
         </script>';
    }
?>
    <main>
        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <strong class="text-dark">Welcome to The Eventor</strong>
                        </p>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    The Eventor
                </a>
                <a href="ticket.php" class="ajax btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Venue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Package</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Contact</a>
                        </li>
                    </ul>
                    <a href="index_ajax.php?page=host_event" class="ajax btn custom-btn d-lg-block d-none me-4">Host Event</a>
                    <a href="index_ajax.php?page=ticket" class="ajax btn custom-btn d-lg-block d-none">Buy Ticket</a>
                </div>
            </div>
        </nav>
        <section class="hero-section" id="section_1">           
                    <div class="section-overlay"></div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-12 mt-auto mb-5 text-center">
                                <small>Inspiria Knowledge Campus Presents</small>
                                <h1 class="text-white mb-5">Insvaganza 2023</h1>
                                <a class="btn custom-btn smoothscroll" href="#section_2">Let's begin</a>
                            </div>
                            <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                                <div class="date-wrap">
                                    <h5 class="text-white">
                                        <i class="custom-icon bi-clock me-2"></i>
                                        5 - 6<sup>th</sup>, April 2023
                                    </h5>
                                </div>
                                <div class="location-wrap mx-auto py-3 py-lg-0">
                                    <h5 class="text-white">
                                        <i class="custom-icon bi-geo-alt me-2"></i>
                                        Inspiria Knowledge Campus, Siliguri
                                    </h5>
                                </div>
                                <div class="social-share">
                                    <ul class="social-icon d-flex align-items-center justify-content-center">
                                        <span class="text-white me-3">Share:</span>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link">
                                                <span class="bi-facebook"></span>
                                            </a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link">
                                                <span class="bi-twitter"></span>
                                            </a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link">
                                                <span class="bi-instagram"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-wrap">
                        <img src="images/banner.jpg" class="custom-video">
                        <video autoplay="" loop="" muted="" class="custom-video" poster="">
                            <source src="video/pexaels-2022395.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
        </section>
        
        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4">About The Eventor</h2>
                            <p class="text-white">The Eventor is the web-application of event management to the creation and development of  small scale events under an organization such as Seminar, Competition, Campaigns, Contests, Fests and many more.
                                The last few years have seen a rapid growth in the event management industry.
                                Considering the existing system problems related to event management we are developing an  web-application for event management.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="images/company-event.png" class="about-image img-fluid">
                            <div class="about-text-info d-flex">
                                <div class="d-flex">
                                    <i class="about-text-icon bi-person"></i>
                                </div>
                                <div class="ms-4">
                                    <h3>a happy moment</h3>
                                    <p class="mb-0 custm-text">your amazing festival experience with us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="artists-section section-padding" id="section_3">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Top 3 Event's</h2>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <video autoplay="" loop="" muted="" class="artists-image img-fluid" poster="">
                                    <source src="video/instagram_1682096695275.mp4" type="video/mp4">
                                </video>
                           </div>
                            <div class="artists-hover">
                                <p><strong>Name:</strong> Insvaganza</p>
                                <p><strong>Date:</strong> April 5<sup>th</sup>, 2023 &amp; April 6<sup>th</sup>, 2023</p>
                                <p><strong>Venue:</strong> Siliguri</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="images/Screenshot_2023-04-21-22-45-07-31_1c337646f29875672b5a61192b9010f9.jpg"
                                    class="artists-image img-fluid">
                            </div>
                            <div class="artists-hover">
                                <p><strong>Name:</strong>Cosplay</p>
                                <p><strong>Date:</strong>Feb 20, 2022</p>
                                <p><strong>Venue:</strong>Inspiria</p>
                            </div>
                        </div>
                        <div class="artists-thumb">
                            <img src="images/ceremony.jpg"
                                class="artists-image img-fluid">
                            <div class="artists-hover">
                                <p><strong>Name:</strong>Charter Presentation Ceremony</p>
                                <p><strong>Date:</strong>May 28, 2022</p>
                                <p><strong>Venue:</strong>Inspiria</p>
<!--                                <hr>
                                <p class="mb-0">
                                    <strong>Youtube Channel:</strong>
                                    <a href="#">Bruno Official</a>
                                </p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="schedule-section section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Event Schedule</h1>
                            <div class="table-responsive">
                                <table class="schedule-table table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Wednesday</th>
                                            <th scope="col">Thursday</th>
                                            <th scope="col">Friday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Day 1</th>
                                            <td class="table-background-image-wrap pop-bacakground-image">
                                                <h3>Clash Of Band</h3>
                                                <p class="mb-2">5:00 - 7:00 PM</p>
                                                <p>By Adele</p>
                                                <div class="section-overlay"></div>
                                            </td>
                                            <td style="background-color: #F3DCD4"></td>
                                            <td class="table-background-image-wrap rock-backaground-image">
                                                <h3>Face Painting</h3>
                                                <p class="mb-2">7:00 - 11:00 PM</p>
                                                <p>By Rihana</p>
                                                <div class="section-overlay"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Day 2</th>
                                            <td style="background-color: #ECC9C7"></td>
                                            <td>
                                                <h3>Burger Battle</h3>
                                                <p class="mb-2">6:30 - 9:30 PM</p>
                                                <p>By Rihana</p>
                                            </td>
                                            <td style="background-color: #D9E3DA"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Day 3</th>
                                            <td class="table-background-image-wrap country-backaground-image">
                                                <h3>Men Physique</h3>
                                                <p class="mb-2">4:30 - 7:30 PM</p>
                                                <p>By Rihana</p>
                                                <div class="section-overlay"></div>
                                            </td>
                                            <td style="background-color: #D1CFC0"></td>
                                            <td>
                                                <h3>Fashion Show</h3>
                                                <p class="mb-2">6:00 - 10:00 PM</p>
                                                <p>By Members</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Day 2</th>
                                            <td style="background-color: #ECC9C7"></td>
                                            <td>
                                                <h3>Solo Dance</h3>
                                                <p class="mb-2">6:30 - 9:30 PM</p>
                                                <p>By Rihana</p>
                                            </td>
                                            <td style="background-color: #D9E3DA"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="artists-section section-padding" id="section_4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">Top 3 Venue's</h2>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="../admin/image/venue/venue64328b18a67ac3.47327840.jpg" class="artists-image img-fluid">
                            </div>
                            <div class="artists-hover">
                                <p><strong>Name:</strong>Amphitheatre</p>
                                <p><strong>Address:</strong>Siliguri</p>
                                <p><strong>Timing:</strong>9:00 AM - 8:00 PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="../admin/image/venue/venue64328b2b4dc806.56162751.jpeg" class="artists-image img-fluid">
                            </div>
                            <div class="artists-hover">
                                <p><strong>Name:</strong>Ground</p>
                                <p><strong>Address:</strong>Siliguri</p>
                                <p><strong>Timing:</strong>9:00 AM - 8:00 PM</p>
                            </div>
                        </div>

                        <div class="artists-thumb">
                            <img src="../admin/image/venue/venue64328ae4df29c2.39899985.jpg" class="artists-image img-fluid">
                            <div class="artists-hover">
                                <p><strong>Name:</strong>Computer Lab</p>
                                <p><strong>Address:</strong>Siliguri</p>
                                <p><strong>Timing:</strong>9:00 AM - 8:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $memberplanssql = "SELECT * FROM $membershipplantable WHERE status = 1";
        $memberplanssqlrs = $function->fetch_data($memberplanssql);
        if(count($memberplanssqlrs)>0){
        ?>
        <section class="pricing-section section-padding section-bg" id="section_5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 mx-auto">
                        <h2 class="text-center mb-4">Membership Package</h2>
                    </div>
                    <?php 
                    foreach($memberplanssqlrs as $echplan){
                    ?>
                    <div class="col-lg-4 mt-4 col-12">
                        <div class="pricing-thumb">
                            <div class="d-flex">
                                <div>
                                    <h3><small><?php echo $echplan['name']; ?></small> <?php echo $echplan['price'].'/-'; ?></h3>
                                    <p>Including good things:</p>
                                </div>
                                <?php
                                if(!empty($echplan['offer'])){
                                ?>
                                <p class="pricing-tag ms-auto">Save up to <span>50%</span></p>
                                <?php   
                                }
                                ?>
                            </div>
                            <ul class="pricing-list mt-3">
                                <?php
                                $faci_array = array();
                                $faci_array = explode('|', $echplan['facilities']);
                                $i = 1;
                                foreach($faci_array as $echfaci){
                                ?>
                                <li class="pricing-list-item"><?php echo ucwords($echfaci); ?></li>
                                <?php
                                }
                                ?>
                            </ul>

                            <a class="link-fx-1 color-contrast-higher blck-color mt-4" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/eventor/theeventor/memberregister.php?id=<?php echo $_SERVER['HTTP_HOST']; ?>">
                                <span>Buy Membership</span>
                                <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="16" cy="16" r="15.5"></circle>
                                        <line x1="10" y1="18" x2="16" y2="12"></line>
                                        <line x1="16" y1="12" x2="22" y2="18"></line>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
        }
        ?>
        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Interested? Let's talk</h2>
                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                                role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Contact Form</h5>
                                </button>
                                <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactMap" type="button" role="tab"
                                    aria-controls="nav-ContactMap" aria-selected="false">
                                    <h5>Google Maps</h5>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post" role="form">
                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="contact-name" id="contact-name" class="form-control" placeholder="Full name" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="email" name="contact-email" id="contact-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                            </div>
                                        </div>
                                        <input type="text" name="contact-company" id="contact-company" class="form-control" placeholder="Company" required>
                                        <textarea name="contact-message" rows="3" class="form-control" id="contact-message" placeholder="Message"></textarea>
                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                                aria-labelledby="nav-ContactMap-tab">
                                <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.469402870927!2d120.94861466021855!3d14.106066818082482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd777b1ab54c8f%3A0x6ecc514451ce2be8!2sTagaytay%2C%20Cavite%2C%20Philippines!5e1!3m2!1sen!2smy!4v1670344209509!5m2!1sen!2smy"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="site-footer-top site-f-cus"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-4 pb-2">
                    <h5 class="site-footer-title mb-3">Links</h5>
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Home</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">About</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Artists</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Schedule</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Pricing</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Have a question?</h5>
                    <p class="text-white d-flex mb-1">
                        <a href="tel: 8617865255" class="site-footer-link">8617865255</a>
                    </p>
                    <p class="text-white d-flex">
                        <a href="mailto:hello@company.com" class="site-footer-link">eventor@mail.com</a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Location</h5>
                    <p class="text-white d-flex mt-3 mb-2">
                        Siliguri, West Bengal</p>
                    <a class="link-fx-1 color-contrast-higher mt-3" href="https://goo.gl/maps/o3BVSg74FBMagqE26">
                        <span>Find us on Map</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-12 mt-5">
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="termsconditions.php" class="site-footer-link">Terms &amp; Conditions</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="privacypolicy.php" class="site-footer-link">Privacy Policy</a>
                            </li>
                            <li class="site-footer-link-item">
                                <a href="feedback.php" class="site-footer-link">Your Feedback</a>
                            </li>
                            <li class="site-footer-link-item">
                                <a href="http://localhost/htdocs/admin/" class="site-footer-link">Admin</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-12 mt-lg-5">
                        <p class="copyright-text"><?php echo $footer; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<style>
.custom-video {
    filter: blur(6px);
}
.blck-color{
    color:black !important;
}
.pricing-thumb {
    transition: 1s;
  }
.pricing-thumb:hover {
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
  }
  .custm-text{
    color: #000000 !important;
    font-weight: 400 !important;
  }
  .site-f-cus {
        padding-top: initial !important;
        padding-bottom: initial !important;
    }
</style>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $(".ajax").colorbox();
    });
    
    function form_dialog(type) {
        $.dialog({
            theme: 'material',
            title: false,
            content: 'url:'+ type +'.php',
            animation: 'zoom',
            columnClass: 'medium',
            closeAnimation: 'scale',
            backgroundDismiss: false
        });
    }
    
    function hostEvent() {
        $('#submit').html('Submitting...')
        var a = $('#host_form').serializeArray();
        $.ajax({
           type:'POST',
           cache:false,
           url:'index_ajax.php?page=host_event',
           data:a,
           success: function(data){
               $.colorbox({html:data});
           }
        });
    }
    
    function buyTicket() {
        $('#submit').html('Submitting...')
        var a = $('#buyTicketForm').serializeArray();
        $.ajax({
           type:'POST',
           cache:false,
           url:'index_ajax.php?page=ticket',
           data:a,
           success: function(data){
               $.colorbox({html:data});
           }
        });
    }
</script>
</body>
</html>
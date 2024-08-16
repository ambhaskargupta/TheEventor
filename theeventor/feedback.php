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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link href="../admin/assets/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css"/>
    <script src="../admin/assets/colorbox/jquery.colorbox.js" type="text/javascript"></script>
</head>
<body>
    <main>
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
                            <a class="nav-link click-scroll" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Venue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Package</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Contact</a>
                        </li>
                    </ul>
                    <a href="index_ajax.php?page=host_event" class="ajax btn custom-btn d-lg-block d-none me-4">Host Event</a>
                    <a href="index_ajax.php?page=ticket" class="ajax btn custom-btn d-lg-block d-none">Buy Ticket</a>
                </div>
            </div>
        </nav>
        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Your&nbsp;Feedback</h2>
                        <div class="tab-content shadow-lg mt-5" id="mess" style="display:none;">
                            
                        </div>    
                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <form class="custom-form contact-form mb-5 mb-lg-0" action="javascript:void(0)" id="feedback_from" method="post" role="form">
                                <div class="contact-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Id" required>
                                        </div>
                                    </div>
                                    <textarea name="feedback" rows="3" class="form-control" id="contact-message" placeholder="Type Your Message"></textarea>
                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        <button type="submit" class="form-control" onclick="send_feedback()">Submit Feedback</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container mt-4">
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
                            <a href="index.php" class="site-footer-link">Events</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Venue</a>
                        </li>
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Package</a>
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
    .navbar {
        background: black !important;
    }
    .section-padding {
        padding-top: 45px !important;
    }
</style>
<script>
    $('#mess').hide();
    
    $(document).ready(function () {
        $(".ajax").colorbox({
            innerWidth:640,
            innerHeight:390
        });
    });
    
    function send_feedback() {
        var a = $('#feedback_from').serializeArray();
        $.ajax({
           type:'POST',
           cache:false,
           url:'index_ajax.php?page=form_data_load&case=feedback',
           dataType:'json',
           data:a,
           success: function(data){
                if(data.error == false){
                   $('#nav-tabContent').hide();
                   $('#mess').show();
                   $('#mess').html(data.msg);
                }
            }
        });
    }
</script>
</body>
</html>
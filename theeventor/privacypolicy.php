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
                        <h2 class="text-center mb-4">PRIVACY &nbsp; POLICY</h2>
                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <p>
                                This Privacy Policy applies to the processing of Personal Information and non-personal
                                information in connection with the Services and You should read this document before using
                                our Services. If You do not agree to the terms of this Privacy Policy, you may not use our Services.
                            </p>
                            <p>
                                Management Events will only collect such Personal Information that is relevant for the purposes described in this Privacy Policy.
                                All Management Events’ personnel processing Personal Information are obliged to keep such information strictly confidential.
                            </p>
                            <p>
                            Technically gathered information when You use our Services,
                            Information from publicly available sources and third parties in relation to our service.
                            We collect information that You give to us, for example when You use our Services. This information may include your name and email. On our website, You are also given the opportunity to subscribe to our newsletter.
                            </p>
                            <h5>Protection of Information</h5>
                            <p>
                                The registers will be maintained in external service providers’ servers with appropriate safeguards, such as password protection, granting the access to the stored information only to persons working at Management Events or Management Events partners who are expressly authorized by Management Events. The register is protected by appropriate industry standard, technical and organizational safety measures. Although we make good faith efforts to store the information collected on the services in a secure operating environment that is not available to the public, We cannot guarantee the absolute security of that information during its transmission or its storage on our systems. Management Events will post a notice on the Management Events website or through the Services in case material security breach that endangers your privacy or Personal Information. Management Events may also temporarily shut down a service to protect Personal Information.
                            </p>
                            <h5>Cookies and Tracking Technologies</h5>
                            <p>
                                A cookie is a string of information or a small text file that a website stores on a visitor’s device, and that the visitor’s browser or operating system provides to “remember” things about your visit. Management Events uses cookies to help it identify and track visitors, their usage of the Services, and their access preferences, improving quality, tailoring recommendations, and developing the Services. The cookies will not enable Management Events to access and review information stored on Your computer. In addition to cookies, Management Events may use other existing or later developed tracking technologies.
                                Please note that some parts of the Services may be country specific, and may not work properly if Management Events is unable to tell where You are accessing the Services from.
                            </p>
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
$(document).ready(function () {
        $(".ajax").colorbox({
            innerWidth:640,
            innerHeight:390
        });
    });
</script>
</body>
</html>
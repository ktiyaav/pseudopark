<?php
session_start();
include'includes/head.php';
?>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-6 banner">
                <style>
                    .fa-map-marker .main {
                    }
                </style>
                <h1>
                    Find the perfect parking<br />
                    spot in <app-rotating-text _nghost-sc35=""><span _ngcontent-sc35="" class="animated-text"></span></app-rotating-text>
                </h1>
                <div class="search">
                    <form action="search.php" method="get" autocomplete="off">
                        <div class="search-box flat-search">
                            <i class="fa fa-map-marker" style="position: absolute; left: 12px; top: 12px; color: red; font-size: 22px;"></i>
                            <input class="form-control" type="text" class="form-control focusField gplaces-input-dropdown fout-enabled" id="" placeholder="Search Address, Place or Event" onkeyup="showResult(this.value)" name="place" />
                        </div>
                    </form>
                    <div id="livesearch" style="border: none;"></div>
                </div>
            </div>
            <style>
                .banner22 {
                    background: url(images/banner.jpg) top right no-repeat;
                    width: 100%;
                    position: absolute;
                    right: -15%;
                    top: 0;
                    height: 100%;
                    border-radius: 0 0 0 30%;
                }
            </style>
            <div class="col-md-6">
                <div class="banner22"></div>
            </div>
        </div>
    </div>
</section>
<section class="feature">
    <div class="feature-half-left"></div>
    <div class="feature-half-right"></div>
    <div class="feature-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3><span>4000+</span> Parking Lots</h3>
                    <h3><span>500+</span> Regular Parkers</h3>
                    <h3><span>13</span> Cities</h3>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h2>Booking parking lot is very dangerous in this Covid situation! Book now easily and have 0 contact where you go!</h2>
                        <div class="divider-line"></div>
                        <a class="anchor-text" href="#search"> Search . Book . Relax<i class="fa fa-arrow-circle-right" style="font-size: 25px;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="popular-spaces">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title"><h2>Popular Parkings</h2></div>
                <div class="popular-space-carousel">
                    <ngu-carousel class="ngucarouselp6uHyS">
                        <div class="ngucarousel">
                            <div class="ngu-touch-container">
                                <div class="ngucarousel-items">
                                    <div class="item">
                                        <div class="popular-space-box">
                                            <img alt="" src="images/banner.jpg" />
                                            <div class="space-detail">
                                                <h5>Punjab</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="popular-space-box">
                                            <img alt="" src="images/banner.jpg" />
                                            <div class="space-detail">
                                                <h5>Mumbai</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="popular-space-box">
                                            <img alt="" src="images/banner.jpg" />
                                            <div class="space-detail">
                                                <h5>Delhi</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="popular-space-box">
                                            <img alt="" src="images/banner.jpg" />
                                            <div class="space-detail">
                                                <h5>Kolkata</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="popular-space-box">
                                            <img alt="" src="images/banner.jpg" />
                                            <div class="space-detail">
                                                <h5>Ranchi</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nguclearFix"></div>
                        </div>
                        <style>
                            @media (max-width: 767px) {
                                .ngucarouselp6uHyS > .ngucarousel > .ngu-touch-container > .ngucarousel-items .item {
                                    flex: 0 0 100%;
                                    width: 100%;
                                }
                            }
                            @media (min-width: 768px) {
                                .ngucarouselp6uHyS > .ngucarousel > .ngu-touch-container > .ngucarousel-items > .item {
                                    flex: 0 0 100%;
                                    width: 100%;
                                }
                            }
                            @media (min-width: 992px) {
                                .ngucarouselp6uHyS > .ngucarousel > .ngu-touch-container > .ngucarousel-items > .item {
                                    flex: 0 0 33.333333333333336%;
                                    width: 33.333333333333336%;
                                }
                            }
                            @media (min-width: 1200px) {
                                .ngucarouselp6uHyS > .ngucarousel > .ngu-touch-container > .ngucarousel-items > .item {
                                    flex: 0 0 25%;
                                    width: 25%;
                                }
                            }
                        </style>
                        <style></style>
                    </ngu-carousel>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="enquiry-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="enquiry-box"></div>
            </div>
        </div>
    </div>
</section>

<div class="icon-bar">
    <a href="index.php"><img src="images/home.webp" width="30" /></a>
    <a href="index.php"><img src="images/search.png" width="30" /></a>
    <a href="" data-toggle="modal" data-target="#modalLRForm"><img src="images/me.png" width="30" /></a>
</div>
<footer>
    <div class="footer-top">
        <div class=""></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix">
                        <div class="footer-right">
                            <div class="contact-info">
                                <a href="tel:+91 999999999"><i class="fa fa-phone" style="color: red;"></i><span>Call us on:</span> +91 999999999</a>
                            </div>
                            <div class="contact-info">
                                <a href=""><i class="fa fa-envelope" style="color: red;"></i><span>Email:</span>hello@shaktisaurav.com</a>
                            </div>
                            <ul class="social-links">
                                <li><a target="_blank" href="" class="fa fa-facebook"></a></li>
                                <li><a target="_blank" href="" class="fa fa-twitter"></a></li>
                                <li><a target="_blank" href="" class="fa fa-linkedin"></a></li>
                            </ul>
                        </div>
                        <div class="footer-center">
                            <ul class="link-list">
                                <li><a href=""> Parking in Delhi </a></li>
                                <li><a href=""> Parking in Ranchi </a></li>
                                <li><a href=""> Parking in Mumbai </a></li>
                                <li><a href=""> Parking in Banaras </a></li>
                            </ul>
                            <ul class="link-list">
                                <li>
                                    <a href="" target="_blank">List Your Parking</a>
                                </li>
                                <li><a href="/contact-us">contact us</a></li>
                                <li><a href="/privacy-policy">privacy policy</a></li>
                            </ul>
                        </div>
                        <div class="footer-left">
                            <div class="logo">
                                <a routerlink="/" href="/"><img alt="" style="width: 130px;" src="images/logo-dark.png" /></a>
                                <h5>Find your destination parking spot easilyy</h5>
                            </div>
                            <p>
                                Getting problem in parking at your desired place? Just use our easy process to find and book your desired parking and be safe :)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</body>
</html>

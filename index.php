<?php

$link_href = <<<EOF
    <link rel="stylesheet" type="text/css" media="screen" href="vendors/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" media="screen" href="vendors/slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" media="screen" href="vendors/lunchpark/css/index.css">
EOF;

$link_href_pre = <<<EOF

EOF;

$script_src = <<<EOF
    <script src="vendors/lunchpark/js/numscroller-1.0.js"></script>
    <script src="vendors/lunchpark/js/index.js"></script>
    <script src="vendors/ion_sound/ion.sound.js"></script>
    <script src="vendors/slick-1.8.1/slick/slick.min.js"></script>
EOF;

$script_src_pre = <<<EOF

EOF;

$page = 'index';
include_once "includes/header.php";

?>

<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="carousel-item active item" style="background-image: url('images/slide2.jpg')">
            <div class="carousel-overlay"></div>
            <!-- <img class="d-block w-100" src="/images/slide2.jpg" alt="First slide"> -->
            <div class="carousel-caption d-none d-md-block">
                <h5 class="animated bounceInRight" style="animation-delay: 0s"> Food Store</h5>
                <p class="animated bounceInLeft" style="animation-delay: 1s"> Make orders from any eatry of our choice in Nigeria, fast and easy.</p>
            </div>
        </div>
        <div class="carousel-item item" style="background-image: url('images/image_touched2.jpg')">
            <div class="carousel-overlay"></div>
            <!-- <img class="d-block w-100" src="/images/alcohol-blur-cuisine-390403.jpg" alt="First slide"> -->
            <div class="carousel-caption d-none d-md-block">
                <h5 class="animated slideInDown" style="animation-delay: 0s"> Order & delivery</h5>
                <p class="animated slideInUp" style="animation-delay: 1s"> Make orders from any eatry of our choice in Nigeria, fast and easy.</p>
            </div>
        </div>
        <div class="carousel-item item" style="background-image: url('images/image_touched1.jpg')">
            <div class="carousel-overlay"></div>
            <!-- <img class="d-block w-100" src="/images/slide2.jpg" alt="First slide"> -->
            <div class="carousel-caption d-none d-md-block">
                <h5 class="animated zoomIn" style="animation-delay: 0s"> reservation </h5>
                <p class="animated zoomIn" style="animation-delay: 1s"> Make orders from any eatry of our choice in Nigeria, fast and easy.</p>
            </div>
        </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="material-icons">chevron_left</span>
        <!-- <span class="glyphicon glyphicon-chrvron-left" aria-hidden="true"></span> -->
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="material-icons">chevron_right</span>
        <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
        <span class="sr-only">Next</span>
    </a>
    <div class="search-box">
        <div class="dropdown-search">
            <input type="text" placeholder="Search Category">
            <span class="material-icons">keyboard_arrow_down</span>
            <ul>
                <li> Option One </li>
                <li> Option Two </li>
                <li> Option Three </li>
            </ul>
        </div>
        <input type="text" placeholder="Enter your search keywords here">
        <button class="ripple">
            <span class="material-icons">search</span>
        </button>
    </div>
    <div class="search-icon">
        <span class="search-btn"> <span class="fa fa-search"> </span> </span>
    </div>
</div>

<div class="mobile-search animated bounceInRight">
    <form>
        <div class="form-group"> <input type="text" class="form-control" placeholder="Enter a search keyword here"> <span class="fa fa-barcode"> </span> </div>
        <button class="btn btn-info"> <i class="fa fa-sort"> </i> More Option </button>
        <button class="btn btn-primary ripple"> Search <i class="fa fa-search"> </i> </button>
    </form>
    <div class="search-close"> <span class="fa fa-times center-vertical"> </span> </div>
</div>

<div class="full-container">

    <div class="container section" id="service-block">
        <h4 class="section-title"> Our Services </h4>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/menu (1).svg" width="68px" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Menu Ordering</h4>
                            <p>Proin varius pellentesque nuncia tincidunt ante. In id lacus</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/food-truck.svg" width="68px" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Menu delivery</h4>
                            <p>Proin varius pellentesque nuncia tincidunt ante. In id lacus</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/menu (1).svg" width="68px" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>table Reservation </h4>
                            <p>Proin varius pellentesque nuncia tincidunt ante. In id lacus</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid section bg-dark" id="showcase-menu-block">
        <h4 class="section-title text-white"> Showcase Menu </h4>
        <div class="container text-center animatedParent">
            <div class="v-half" data-aos="bounceIn" data-aos-callback="alert('Hello');">
                <div class="v-col-2 showcase-img" style="background-image: url('uploads/LP_1542823871215.jpg')">

                </div>
                <diiv class="v-col-2 showcase-text showcase-special arrow-left">
                    <div class="item-header"> Eatry - Location </div>
                    <h6> Grilled Chicken</h6>
                    <span class="pricing">
                        <i class="currency-ng"></i>69 </span>
                    <p> Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. </p>
                    <ul class="d-flex flex-row item-footer p-0">
                        <li class="p-1"> Protein
                            <small> 5g </small>
                        </li>
                        <li class="p-1"> Qty
                            <small> 50</small>
                        </li>
                    </ul>
                </diiv>
            </div>
            <div class="v-half">
                <div class="h-col-2" data-aos="bounceIn">
                    <div class="v-col-2 showcase-img" style="background-image: url('images/download.jpg')"></div>
                    <div class="v-col-2 showcase-text arrow-left">
                        <div class="item-header"> Eatry - Location </div>
                        <h6> Grilled Chicken</h6>
                        <span class="pricing">
                            <i class="currency-ng"></i>50 </span>
                        <ul class="d-flex flex-row item-footer p-0">
                            <li class="p-1"> Protein
                                <small> 5g </small>
                            </li>
                            <li class="p-1"> Qty
                                <small> 50</small>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="h-col-2" data-aos="bounceIn">
                    <div class="v-col-2 showcase-text arrow-right">
                        <div class="item-header"> Eatry - Location </div>
                        <h6> Grilled Chicken</h6>
                        <span class="pricing">
                            <i class="currency-ng"></i>50 </span>
                        <ul class="d-flex flex-row item-footer p-0">
                            <li class="p-1"> Protein
                                <small> 5g </small>
                            </li>
                            <li class="p-1"> Qty
                                <small> 50</small>
                            </li>
                        </ul>
                    </div>
                    <div class="v-col-2 showcase-img" style="background-image: url('images/images.jpg')"></div>
                </div>
            </div>
            <div class="v-half">
                <div class="h-col-2" data-aos="bounceIn">
                    <div class="v-col-2 showcase-text arrow-right">
                        <div class="item-header"> Eatry - Location </div>
                        <h6> Grilled Chicken</h6>
                        <span class="pricing">
                            <i class="currency-ng"></i>50 </span>
                        <ul class="d-flex flex-row item-footer p-0">
                            <li class="p-1"> Protein
                                <small> 5g </small>
                            </li>
                            <li class="p-1"> Qty
                                <small> 50</small>
                            </li>
                        </ul>
                    </div>
                    <div class="v-col-2 showcase-img" style="background-image: url('images/pizza_tomatoes_olives_mushrooms_cheese_dish_leaves_food_93326_1920x1080.jpg')"></div>
                </div>
                <div class="h-col-2" data-aos="bounceIn">
                    <div class="v-col-2 showcase-img" style="background-image: url('uploads/LP_1542824217499.jpg')"> </div>
                    <div class="v-col-2 showcase-text arrow-left">
                        <div class="item-header"> Eatry - Location </div>
                        <h6> Grilled Chicken</h6>
                        <span class="pricing">
                            <i class="currency-ng"></i>50 </span>
                        <ul class="d-flex flex-row item-footer p-0">
                            <li class="p-1"> Protein
                                <small> 5g </small>
                            </li>
                            <li class="p-1"> Qty
                                <small> 50</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="v-half" data-aos="bounceIn">
                <div class="v-col-2 showcase-img" style="background-image: url('uploads/LP_1542824184321.jpg')"> </div>
                <diiv class="v-col-2 showcase-text showcase-special arrow-left">
                    <div class="item-header"> Eatry - Location </div>
                    <h6> Grilled Chicken</h6>
                    <span class="pricing">
                        <i class="currency-ng"></i>50 </span>
                    <p> Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. </p>
                    <ul class="d-flex flex-row item-footer p-0">
                        <li class="p-1"> Protein
                            <small> 5g </small>
                        </li>
                        <li class="p-1"> Qty
                            <small> 50</small>
                        </li>
                    </ul>
                </diiv>
            </div>
        </div>
    </div>

    <div class="container section" id="favourite-menu-block">
        <h4 class="section-title"> Favourite Menu </h4>
        <div class="col-lg-12 bg- text-center">
            <ul class="navbar-paginate">
                <li class="paginator"> All </li>
                <li class="paginator active"> Carbohydrate </li>
                <li class="paginator"> Protein </li>
                <li class="paginator"> Vitamins </li>
            </ul>
        </div>
        <div class="row pt-5 slick-menu-carousel text-center">
            <div class="col-lg-3 col-md-5 item" data-aos="fade-right">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="uploads/LP_1542824184321.jpg" class="">
                </div>
                <div class="item-desc">
                    <div class="item-header"> Eatry - Location </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small>
                                <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item" data-aos="fade-down">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="uploads/LP_1542824217499.jpg">
                </div>
                <div class="item-desc">
                    <div class="item-header"> Eatry - Location </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small>
                                <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item" data-aos="fade-right">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="uploads/LP_1542823871215.jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small>
                                <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item" data-aos="fade-up">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="uploads/LP_1542823567268.jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small>
                                <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item" data-aos="zoom-out">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="uploads/LP_1542824087315.jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="uploads/LP_1542824014114.jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="images/Biriyani1.jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="images/images (1).jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="images/images (3).jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="images/download.jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item">
                <div class="row item-bg bg-danger">
                    <div class="overlay"></div>
                    <img src="images/images (4).jpg">
                    <div class="item-bg-tools">
                        <i class="fa fa-search-plus"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 item">
                <div class="row item-bg">
                    <div class="overlay"></div>
                    <img src="uploads/LP_1542824294670.jpg">
                    <div class="item-bg-tools">
                        <i class="material-icons">zoom_in</i>
                        <i class="material-icons">favorite_border</i>
                    </div>
                </div>
                <div class="item-desc">
                    <div class="item-header"> Lunchpark - Nwaniba, Uyo, AKS </div>
                    <h6 class="item-title"> Menu Name </h6>
                    <ul class="item-footer d-flex flex-row">
                        <li class="bg- p-2">Protein
                            <small> 8g </small>
                        </li>
                        <li class="p-2 bg-"> Qty
                            <small> 80 </small>
                        </li>
                        <li class="p-2 bg-"> Price
                            <small> <i class="currency-ng"></i>800</small>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 text-center pt-5">
                <button class="btn btn-primary ripple p-3"> View Menu Store </button>
            </div>

        </div>
    </div>

    <div class="container-fluid bg-dark section">
        <div class="counter">
            <div class="counter-item">
                <div class="rounded-counter">
                    <h6>
                        <span class="numscroller" data-min="1" data-max="36" data-delay="5" data-increment="2"> 36 </span>
                        <small> Eatries </small>
                    </h6>
                </div>
            </div>
            <div class="counter-item">
                <div class="rounded-counter">
                    <h6>
                        <span class="numscroller" data-min="1" data-max="286" data-delay="5" data-increment="2"> 286 </span>
                        <small> Menus </small>
                    </h6>
                </div>
            </div>
            <div class="counter-item">
                <div class="rounded-counter">
                    <h6>
                        <span class="numscroller" data-min="1" data-max="150" data-delay="5" data-increment="2"> 150 </span>
                        <small> Customers </small>
                    </h6>
                </div>
            </div>
            <div class="counter-item">
                <div class="rounded-counter">
                    <h6>
                        <span class="numscroller" data-min="1" data-max="20" data-delay="5" data-increment="2"> 20 </span>
                        <small> Orders </small>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container section" id="slick-our-eatries">
        <h4 class="section-title"> Our Eatries</h4>
        <div class="row eatries-logos">
            <div class="slide">
                <img src="images/attachment_24048892.png" class="img-fluid">
            </div>
            <div class="slide">
                <img src="images/crunchies_logo_main.png" class="img-fluid">
            </div>
            <div class="slide" style="padding-left: 50px;">
                <img src="images/logo-asra.png" class="img-fluid">
            </div>
            <div class="slide">
                <img src="images/mareba_logo-big.jpg" class="img-fluid">
            </div>
            <div class="slide">
                <img src="images/Oxygen211_thumb900.jpg" class="img-fluid">
            </div>
            <div class="slide">
                <img src="images/apac-effie-logo-2019.png" class="img-fluid">
            </div>
            <div class="slide">
                <img src="images/7db0326594fc631bbc7179158c65a1da.png" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="container-fluid section bg-dark" id="customer-review-block">
        <h4 class="section-title text-white"> success stories from our customer</h4>
        <div class="container d-flex">
            <div class="row review-item">
                <div class="review-box">
                    <img src="images/8d876187ecb0f5acc1198a4a01899aba.jpg">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero rerum minima omnis. Enim dolor, commodi architecto, neque
                        nihil beatae amet cumque aperiam hic vero expedita veniam? Cupiditate facere fugiat est!
                    </p>
                    <div class="footer">
                        <h6> Customer Name
                            <small> Position </small>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="review-item">
                <div class="review-box">
                    <img src="images/8d876187ecb0f5acc1198a4a01899aba.jpg">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero rerum minima omnis. Enim dolor, commodi architecto, neque
                        nihil beatae amet cumque aperiam hic vero expedita veniam? Cupiditate facere fugiat est!
                    </p>
                    <div class="footer">
                        <h6> Customer Name
                            <small> Position </small>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="review-item">
                <div class="review-box">
                    <img src="images/8d876187ecb0f5acc1198a4a01899aba.jpg">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero rerum minima omnis. Enim dolor, commodi architecto, neque
                        nihil beatae amet cumque aperiam hic vero expedita veniam? Cupiditate facere fugiat est!
                    </p>
                    <div class="footer">
                        <h6> Customer Name
                            <small> Position </small>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="review-item">
                <div class="review-box">
                    <img src="images/8d876187ecb0f5acc1198a4a01899aba.jpg">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero rerum minima omnis. Enim dolor, commodi architecto, neque
                        nihil beatae amet cumque aperiam hic vero expedita veniam? Cupiditate facere fugiat est!
                    </p>
                    <div class="footer">
                        <h6> Customer Name
                            <small> Position </small>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container section" id="recent-menu-block">
        <h4 class="section-title"> Recent Menu </h4>
        <div class="row text-center">

            <div class="menu col-lg-3 bg-">
                <div>
                    <div class="menu-img-box"></div>
                    <h6> Fried Rice </h6>
                    <div class="menu-desc-box" data-aos="bounceIn">
                        <div class="item-header"> Eatry - Location</div>
                        <h6> Fried Rice </h6>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae similique, harum ipsa nesciunt
                            animi atque </p>
                        <ul class="item-footer">
                            <li> Protein
                                <small> 5g </small>
                            </li>
                            <li> Qty
                                <small> 25 </small>
                            </li>
                            <li> Price
                                <small> $50 </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="menu col-lg-3 bg-">
                <div>
                    <div class="menu-img-box" style="background-image: url('uploads/LP_1542823871215.jpg')"></div>
                    <h6> Fried Rice </h6>
                    <div class="menu-desc-box" data-aos="bounceIn">
                        <div class="item-header"> Eatry - Location</div>
                        <h6> Fried Rice </h6>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae similique, harum ipsa nesciunt
                            animi atque </p>
                        <ul class="item-footer">
                            <li> Protein
                                <small> 5g </small>
                            </li>
                            <li> Qty
                                <small> 25 </small>
                            </li>
                            <li> Price
                                <small> $50 </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="menu col-lg-3 bg-">
                <div>
                    <div class="menu-img-box" style="background-image: url('uploads/LP_1542824294670.jpg')"></div>
                    <h6> Fried Rice </h6>
                    <div class="menu-desc-box" data-aos="bounceIn">
                        <div class="item-header"> Eatry - Location</div>
                        <h6> Fried Rice </h6>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae similique, harum ipsa nesciunt
                            animi atque </p>
                        <ul class="item-footer">
                            <li> Protein
                                <small> 5g </small>
                            </li>
                            <li> Qty
                                <small> 25 </small>
                            </li>
                            <li> Price
                                <small>
                                    <i class="ngn"></i> 50 </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="menu col-lg-3 bg-">
                <div>
                    <div class="menu-img-box"></div>
                    <h6> Fried Rice </h6>
                    <div class="menu-desc-box" data-aos="bounceIn">
                        <div class="item-header"> Eatry - Location</div>
                        <h6> Fried Rice </h6>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae similique, harum ipsa nesciunt
                            animi atque </p>
                        <ul class="item-footer">
                            <li> Protein
                                <small> 5g </small>
                            </li>
                            <li> Qty
                                <small> 25 </small>
                            </li>
                            <li> Price
                                <small> $50 </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="menu col-lg-3 bg-">
                <div>
                    <div class="menu-img-box"></div>
                    <h6> Fried Rice </h6>
                    <div class="menu-desc-box" data-aos="bounceIn">
                        <div class="item-header"> Eatry - Location</div>
                        <h6> Fried Rice </h6>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae similique, harum ipsa nesciunt
                            animi atque </p>
                        <ul class="item-footer">
                            <li> Protein
                                <small> 5g </small>
                            </li>
                            <li> Qty
                                <small> 25 </small>
                            </li>
                            <li> Price
                                <small> $50 </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="menu col-lg-3 bg-">
                <div>
                    <div class="menu-img-box"></div>
                    <h6> Fried Rice </h6>
                    <div class="menu-desc-box" data-aos="bounceIn">
                        <div class="item-header"> Eatry - Location</div>
                        <h6> Fried Rice </h6>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae similique, harum ipsa nesciunt
                            animi atque </p>
                        <ul class="item-footer">
                            <li> Protein
                                <small> 5g </small>
                            </li>
                            <li> Qty
                                <small> 25 </small>
                            </li>
                            <li> Price
                                <small> $50 </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>

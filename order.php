<?php
$link_href = <<<EOF
    <link rel="stylesheet" type="text/css" media="screen" href="vendors/lunchpark/css/order.css">
EOF;

$link_href_pre = <<<EOF
    <link rel="stylesheet" type="text/css" media="screen" href="vendors/dist/sweetalert.css">
EOF;

$script_src = <<<EOF
    <script src="vendors/dist/sweetalert.min.js"></script>
EOF;

$script_src_pre = <<<EOF
    <script src="vendors/lunchpark/js/order.js"></script>
EOF;

session_start();
include_once "includes/header.php"; 

include_once 'includes/configuration/config.php';
// include_once '../customer/check_login.php';
$db = new DB;
$customer = new Customer;
$customer -> con = $db->connection();
$itemid = $db -> string_filter($_GET['menu_id']);
// print_r($con);
$db -> php_display_errors();
$menu = $customer -> view_item('menu', 'menu_id', $itemid);
$file_path = "uploads/";
$other_imgs = $db -> explode_other_imgs($menu['menu_imgs'], $file_path);

?>

<div class="hero-section jumbotron" style="background-image: url('images/katarzyna-grabowska-415006-unsplash.jpg')">
    <div class="container text-center">
        <h4> Order </h4>
    </div>
</div>

<div class="full-container">
    
    <div class="container section pt-2 pb-5">
        <div class="row menu-section">
            <div class="col-lg-6 img-box">
                <div class="col-lg-12 showcase" data-aos="bounceIn">
                    <span class="icon-bag"> <i class="text-center"> <?php echo $menu["menu_qty"]; ?> </i> </span>
                    <img src="<?php echo $db -> check_file($file_path.$menu['menu_main_img']) ?>" class="img-fluid">
                </div>
                <div class="nav">
                    <div> <img src="../../Lunchpark/images/pexels-photo-156114.jpeg"> </div>
                    <div class="active"> <img src="../../Lunchpark/images/pexels-photo-156114.jpeg"> </div>
                    <div> <img src="../../Lunchpark/images/pexels-photo-156114.jpeg"> </div>
                    <div> <img src="../../Lunchpark/images/pexels-photo-156114.jpeg"> </div>
                </div>
            </div>
            <div class="col-lg-6 desc-box">
                <h4 data-menu_id='<?php echo $menu['menu_id']; ?>'> <?php echo $menu['menu_name']; ?> <small> with chicken </small> </h4>
                <div class="star-rate">
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    <span> (25) </span>
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
                <div class="button-box">
                    <span> Home Delivery <i class="fa fa-check-circle text-success"> </i> </span>
                    <span> Recipee <i class="fa fa-times-circle text-danger"> </i> </span> 
                    <span> Price - <span class="currency-ng">500</span> </span>
                </div>
                <div class="action-box text-right">
                    <button class="btn btn-secondary ripple" data-purchase="cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    <button class="btn btn-secondary ripple" data-purchase="pay"><i class="fab fa-paypal"></i>One time purchase</button>
                </div>
            </div>            
        </div>
        <div class="row eatery-section mt-4">
            <div class="col-lg-12 text-center">
                <div class="overlay"></div>
                <ul class="nav">
                    <li data-menu="details" class="active">Details</li>
                    <li data-menu="nutrition">Additional</li>
                    <li data-menu="reviews">Customer Reviews</li>
                </ul>
            </div>
            <div class="col-lg-12" data-type="menu-section">
                <div class="row animated bounceIn" data-secName="details">
                    <div class="col-lg-6">
                        <h6 class="text-center">De Choice <small> Ikot Ekpene Rd, Uyo, Akwa Ibom State</small></h6>
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <img src="../../Lunchpark/images/error_image.png">
                                <button class="btn btn-primary ripple"> View Profile </button>
                            </div>
                            <div class="col-sm-8">
                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias consequatur, vel necessitatibus temporibus voluptatem aspernatur ex harum eveniet eaque fugiat quod reiciendis aperiam dolorem ratione deleniti quia rem, officiis et!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="star-rate">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i>
                            <p> 4.1 average based on 254 reviews.</p>
                            <div class="rate-stats">
                                <div class="row"> 
                                    <div class="col-sm-2"> 5 star </div>
                                    <div class="col-sm-8 stat-box"> <div class="bg-success"> </div> </div>
                                    <div class="col-sm-2"> 150 </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-2"> 4 star </div>
                                    <div class="col-sm-8 stat-box"> <div class="bg-primary"> </div> </div>
                                    <div class="col-sm-2"> 150 </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-2"> 3 star </div>
                                    <div class="col-sm-8 stat-box"> <div class="bg-info"> </div> </div>
                                    <div class="col-sm-2"> 150 </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-2"> 2 star </div>
                                    <div class="col-sm-8 stat-box"> <div class="bg-secondary"> </div> </div>
                                    <div class="col-sm-2"> 150 </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-2"> 1 star </div>
                                    <div class="col-sm-8 stat-box"> <div class="bg-danger"> </div> </div>
                                    <div class="col-sm-2"> 150 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" data-secName="reviews">
                    <div class="col-lg-6 row">
                        <div class="col-sm-3"> <img src="images/FB_IMG_15417660293657392.jpg"> </div>
                        <div class="col-sm-9">
                            <div class="d-flex bg-">
                                <h6> Joseph Bassey </h6>
                                <span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 row">
                        <div class="col-sm-3"> <img src="images/FB_IMG_15417660293657392.jpg"> </div>
                        <div class="col-sm-9">
                            <div class="d-flex bg-">
                                <h6> Joseph Bassey </h6>
                                <span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 row">
                        <div class="col-sm-3"> <img src="images/FB_IMG_15417660293657392.jpg"> </div>
                        <div class="col-sm-9">
                            <div class="d-flex bg-">
                                <h6> Joseph Bassey </h6>
                                <span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 row">
                        <div class="col-sm-3"> <img src="images/FB_IMG_15417660293657392.jpg"> </div>
                        <div class="col-sm-9">
                            <div class="d-flex bg-">
                                <h6> Joseph Bassey </h6>
                                <span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 row">
                        <div class="col-sm-3"> <img src="images/FB_IMG_15417660293657392.jpg"> </div>
                        <div class="col-sm-9">
                            <div class="d-flex bg-">
                                <h6> Joseph Bassey </h6>
                                <span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <!-- <div class="footer">
                                <span> 30th Jan, 2018 </span> <span> <i class="fa fa-thumbs-up"> </i>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 row">
                        <div class="col-sm-3"> <img src="images/FB_IMG_15417660293657392.jpg"> </div>
                        <div class="col-sm-9">
                            <div class="d-flex bg-">
                                <h6> Joseph Bassey </h6>
                                <span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "includes/footer.php"; 
?>
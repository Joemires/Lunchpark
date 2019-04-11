<?php
$path = '../';

$link_href_pre = <<<EOF
    <link rel="stylesheet" type="text/css" media="screen" href="${path}vendors/lunchpark/css/profile.css">
EOF;

$script_src = <<<EOF
    <script src="${path}vendors/lunchpark/js/profile.js"></script>
EOF;


include_once "includes/header.php";
?>

<div class="hero-section jumbotron mb-0" style="background-image: url('<?php echo $path; ?>images/profile_bg.jpg');">
</div>
<div class="container-fluid header mb-5">
    <div class="img-container text-center">
        <div class="profile-pic rounded-circle" style="background-image: url('<?php echo $path; ?>images/FB_IMG_15417660293657392.jpg')">
            <span> Edit </span>
            <i class="icon-eye"></i>
        </div>
    </div>
    <div class="nav-container">
        <div class="top"> 
            <h2> Joseph Bassey </h2>
            <ul>
                <li>Support Center</li> <li> <i class="fa fa-angle-down"></i> </li>
            </ul>
        </div>
        <ul>
            <li class="active"> Profile </li>
            <li> Orders </li>
            <li> Favourite </li>
            <li> Referral </li>
            <li class="right"> Edit Profile </li>
        </ul>
    </div>
</div>

<div class="full-container">
    
    <div class="container section pt-2 pb-5">
        <div class="row">   
            <div class="col-lg-3 bg-white pt-4 pb-4 rounded">
                <h4> <i class="fa fa-map-marker mr-1"></i> Map</h4>
                <!-- <ul>
                    <li>Order for Fried rice placed successfully</li>
                    <li>Username changed to Joemires</li>
                    <li>Order delivery successfull</li>
                    <li>Account information updated</li>
                </ul>
                <span> View More </span> -->
            </div>
            <div class="col-lg-8 offset-lg-1 bg-white pl-0 pr-0">
                <form>
                    <div class="form-con">
                        <div class="form-group">
                            <input type="text">
                            <label> Customer Name </label>
                        </div>
                    </div>
                    <div class="form-con">
                        <div class="form-group">
                            <input type="text">
                            <label> Username </label>
                        </div>
                        <div class="form-group">
                            <input type="text">
                            <label> E-Mail Addres </label>
                        </div>
                    </div>
                    <div class="form-con">
                        <div class="form-group">
                            <input type="text" id="phone">
                            <label for="phone"> Phone Number </label>
                        </div>
                        <div class="form-group" style="flex: 1.5">
                            <input type="text">
                            <label> Refer ID </label>
                        </div>
                    </div>
                    <div class="form-con">
                        <div class="form-group" style="flex: 1.5">
                            <input type="text">
                            <label> Billing Address </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 connect text-center mt-4 pt-4 bg-white">
                <h4 class=""> Connect </h4>
                <ul class="navbar">
                    <li>
                        <i class="icon-social-facebook"></i>
                        <button class="btn btn-default" disabled> Connected </button>
                    </li>
                    <li>
                        <i class="icon-social-twitter"></i>
                        <button class="btn btn-default"> Connect </button>
                    </li>
                    <li>
                        <i class="icon-social-instagram"></i>
                        <button class="btn btn-default"> Connect </button>
                    </li>
                    <li>
                        <i class="icon-social-linkedin"></i>
                        <button class="btn btn-default"> Connect </button>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12 text-center position-sticky bg-white mt-4 p-4">
                <button class="btn btn-secondary"> Update Profile</button>
            </div>
        </div>
    </div>
</div>
<?php 
include_once "includes/footer.php";
?>
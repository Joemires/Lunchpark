<?php
session_start();
// print_r($_SESSION);
$path = (isset($path) && $path != '') ? $path : '';
$loggedIn =(isset($_SESSION['loggedIn']) && isset($_SESSION['role']) && $_SESSION['loggedIn'] == true && $_SESSION['role'] == 'Customer') ? true : false;
$user_profile = 'user/'.$_SESSION['customer_id'];
?>

<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Article">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="https://lunchpark.com.ng/images/slide2.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index">
    <meta name="google-site-verification" content="zPIPwBGuuz6PfD8YQYXVTwz7rPxEduIQNxMYbSy9NiM" />
    <title>Lunchpark</title>
    <link href="https://fonts.googleapis.com/icon?family=Cousine" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path; ?>vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path; ?>vendors/lunchpark/css/animate.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path; ?>vendors/aos/aos.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path; ?>vendors/fontawesome-free-5.5.0-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path; ?>vendors/simple-line-icons/simple-line-icons.css">
    <?php echo (isset($link_href) && $link_href != '') ? $link_href : ''; ?>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path; ?>vendors/lunchpark/css/main.css">
    <?php echo (isset($link_href_pre) && $link_href_pre != '') ? $link_href_pre : ''; ?>
    <script src="<?php echo $path; ?>vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo $path; ?>vendors/bootstrap/js/bootstrap.min.js"></script>
    <?php echo (isset($script_src) && $script_src != '') ? $script_src : ''; ?>
    <script src="<?php echo $path; ?>vendors/aos/aos.js"></script>
    <script src="<?php echo $path; ?>vendors/ion_sound/ion.sound.js"></script>
    <script src="<?php echo $path; ?>vendors/slick-1.8.1/slick/slick.min.js"></script>
    <script src="<?php echo $path; ?>vendors/lunchpark/js/main.js"></script>
    <?php echo (isset($script_src_pre) && $script_src_pre != '') ? $script_src_pre : ''; ?>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark hero-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $path; ?>index.php">
                <img src="<?php echo $path; ?>images/logo.svg" alt="" class="navbar-logo"> Lunchpark
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item<?php echo (isset($page) && $page == 'index') ? ' active' : ''; ?>">
                        <a class="nav-link" href="<?php echo $path; ?>index">Home
                            <?php echo (isset($page) && $page == 'index') ? '<span class="sr-only">(current)</span>' : ''; ?>
                        </a>
                    </li>
                    <li class="nav-item<?php echo (isset($page) && $page == 'services') ? ' active' : ''; ?>">
                        <a class="nav-link" href="<?php echo $path; ?>services">Services
                            <?php echo (isset($page) && $page == 'services') ? '<span class="sr-only">(current)</span>' : ''; ?>
                        </a>
                    </li>
                    <li class="nav-item<?php echo (isset($page) && $page == 'menu') ? ' active' : ''; ?>">
                        <a class="nav-link" href="<?php echo $path; ?>menu">Menu
                            <?php echo (isset($page) && $page == 'menu') ? '<span class="sr-only">(current)</span>' : ''; ?>
                        </a>
                    </li>
                    <li class="nav-item<?php echo (isset($page) && $page == 'reservation') ? ' active' : ''; ?>">
                        <a class="nav-link" href="<?php echo $path; ?>reservation">Reservations
                            <?php echo (isset($page) && $page == 'reservation') ? '<span class="sr-only">(current)</span>' : ''; ?>
                        </a>
                    </li>
                    <li class="nav-item dropdown<?php echo (isset($page) && $page == 'account') ? ' active' : ''; ?>">
                        <a class="nav-link" href="#" data-toggle="dropdown" role="button" aria-expanded="true">Account
                            <?php echo (isset($page) && $page == 'account') ? '<span class="sr-only">(current)</span>' : ''; ?>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?php
                                    echo '<a href="'.$path; 
                                    echo ($loggedIn) ? $user_profile : 'customer/login';
                                    echo '"> Customer </a>';
                                ?>
                            </li>
                            <li><a href="<?php echo $path; ?>admin.php">Admin</a></li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

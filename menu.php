<?php
$link_href_pre = <<<EOF
    <link rel="stylesheet" type="text/css" media="screen" href="vendors/lunchpark/css/menu.css">
EOF;

$script_src = <<<EOF
    <script src="vendors/lunchpark/js/numscroller-1.0.js"></script>
EOF;

// session_start();
include_once 'includes/configuration/config.php';

$db = new DB;
$customer = new Customer;
$db -> php_display_errors();
// var_dump($customer)
$customer -> con = $db -> connection();
$file_path = "uploads/";

$result = $customer -> fetch_all_item('menu', 'eatry', 'e_id', 'e_id', 'DESC');

$page = 'menu';
include_once "includes/header.php"; 
?>

<div class="hero-section jumbotron" style="background-image: ;">
    <div class="container text-center">
        <h4> Menu </h4>
    </div>
</div>
<div class="full-container">
    
    <div class="container section pt-2 pb-5">
        <div class="row menu-section">            
            
            <?php

            if ($result[0] == true) {
                while ($menu = $result[1] -> fetch_assoc()) {
                    // print_r($menu);
                    $get_adu_id = $db -> get_col('eatry', 'adu_id', 'e_id', $menu['e_id']);
                    // print_r($get_adu_id);
                    $ad_user = $customer -> fetch_ad_user($get_adu_id['adu_id']);

                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="menu">
                            <div class="header">
                                <div class="floatable-box" style="right: 0;">
                                    Price - <div class="featured"> <i class="currency-ng"></i><?php echo number_format($menu["menu_price"]); ?></div> 
                                </div>
                                <span class="icon-plus"></span>
                                <img src="<?php echo $db -> check_file($file_path.$menu['menu_main_img']); ?>">
                                <span class="icon-bag"> <i> <?php echo $menu["menu_qty"]; ?> </i> </span>
                            </div>
                            <div class="body">
                                <div class="tag"> <span class="icon-star" style="font-weight: 800;"></span> </div>
                                <a href="order.php?menu_id=<?php echo $menu['menu_id']; ?>"> <h6> <?php echo ucwords($menu["menu_name"]); ?> </h6> </a>
                                <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia non hic fuga rerum libero laborum nemo tempora, soluta eveniet suscipit, iusto optio.</p>
                                <span class="nutr"> Protein <small> 5g </small> </span>
                            </div>
                            <div class="footer">
                                <?php echo $ad_user['adu_name']." - ".$ad_user['adu_locality'].", ".$ad_user['adu_state']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            
        </div>
        
        <div class="col-lg-12 pt-4 text-center">
            <button class="btn btn-primary p-2 ripple"> Load More </button>
        </div>

    </div>
</div>

<?php
include_once "includes/footer.php"; 
?>
<?php
$link_href_pre = <<<EOF
    <link rel="stylesheet" type="text/css" media="screen" href="vendors/lunchpark/css/checkout.css">
EOF;

$script_src = <<<EOF

EOF;

$script_src_pre = <<<EOF
    <script src="vendors/lunchpark/js/checkout.js"></script>
EOF;

include_once "includes/header.php"; 
include_once "includes/configuration/config.php";
$db = new DB;

// print_r($_COOKIE['shop_item']);
$item_detail = explode(',', $_COOKIE['shop_item']);
// print_r($item_detail);
$item_cat = explode('=', $item_detail[0])[1];
$col = $item_cat.'_name, '.$item_cat.'_price, '.$item_cat.'_qty';
$c_col = explode('=', $item_detail[0])[1].'_id';
print_r($item_detail);
$item_name = $db -> get_col($item_cat, $col, $c_col, explode('=', $item_detail[1])[1]);
print_r($item_name)
?>

<div class="hero-section jumbotron" style="background-image: url('images/jason-briscoe-387562-unsplash.jpg')">
    <div class="container text-center">
        <h4> Checkout </h4>
    </div>
</div>

<div class="full-container">

    <div class="container section bg- pt-0">
        <nav class="text-center"> 
            <ol>
                <li class="current" data-page="product"> <i class="fa fa-table"></i> Product </li>
                <li data-page="billing"> <i class="fab fa-paypal"></i> Billing Information </li>
                <li data-page="payment"> <i class="fab fa-paypal"></i> Payment </li>
                <li data-page="confirmation"> <i class="fab fa-paypal"></i> Confirmation </li>
            </ol>
        </nav>

        <div class="row ml-0 current" data-page="product">
            <div class="col-lg-7">
                <h6> Product Information </h6>
                <form class="fox rounded">
                    <div class="form-group">
                        <label> Product Name</label>
                        <div class="form-box"> <?php echo strtoupper($item_name[$item_cat.'_name']); ?></div>
                        <input type="text" name="menu_qty" value="<?php echo explode('=', $item_detail[1])[1]; ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label> Product Category</label>
                        <div class="form-box"> <?php echo strtoupper($item_cat); ?></div>
                    </div>
                    <div class="form-group">
                        <label> Product Price</label>
                        <div class="form-box"> <i class="currency-ng"></i><?php echo $item_name[$item_cat.'_price']; ?></div>
                    </div>
                    <div class="form-group">
                        <label> Product Quantity</label>
                        <div class="form-box qty"> 
                            <i class="fa fa-minus"></i> <input type="text" value="1" data-max_qty="<?php echo $item_name[$item_cat.'_qty']; ?>" name="item_qty"> of <?php echo $item_name[$item_cat.'_qty']; ?> <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </form>
                <h6 class="mt-3"> Delivery Information </h6>
                <form>
                    <div class="delivery-method-box d-flex">
                        <input type="radio" id="station" name="delivery" value="station" hidden>
                        <label for="station">
                            <span class="circle"></span>
                            <h6> Station Pickup <small> Free </small> </h6>
                            <p> Estimated 20-60 Min(s) delivery <br> (Delivery charges may apply) </p>
                        </label>
                        <input type="radio" id="home" name="delivery" value="home" hidden>
                        <label for="home">
                            <span class="circle"></span>
                            <h6> Home Delivery <i class="fa fa-times text-danger"></i> <small> <i class="currency-ng"></i>500 </small> </h6>
                            <p> Estimated 1-2 Hours delivery <br> (Delivery charges may apply) </p>
                        </label>
                    </div>
                </form>
            </div>
            <div class="col-lg-5 additional">
                <h6> Additional Purchase </h6>
                <p class="note"> <i class="fa fa-exclamation-circle text-warning mr-1"></i> Remember to check the item you want to purchase, uncheck items won't be delivered.</p>
                <form class="d-flex">
                    <div class="header d-flex"> <span>  </span> <span> Item </span> <span> Qty </span> <span> Price </span> </div>
                    <div class="body d-flex"> <span class=""> <input type="checkbox" value="chicken"> </span> <span> Chicken </span> <span> <input type="text" value="1"> of 10 </span> <span> <i class="currency-ng"></i>500 </span>  </div>
                    <div class="body d-flex"> <span> <input type="checkbox" value="beef"> </span> <span> Beef </span> <span> <input type="text" value="1"> of 4 </span> <span> <i class="currency-ng"></i>200 </span>  </div>
                    <div class="body d-flex"> <span> <input type="checkbox" value="butter"> </span> <span> Butter </span> <span> <input type="text" value="1"> of 8 </span> <span> <i class="currency-ng"></i>800 </span>  </div>
                </form>
            </div>
            <div class="col-lg-12 pt-4 text-right form_actions">
                <button class="btn btn-secondary ripple mr-3"> Cancel </button> <button class="btn btn-primary ripple"> Next </button>
            </div>
        </div>

    </div>
</div>

<?php
include_once "includes/footer.php"; 
?>
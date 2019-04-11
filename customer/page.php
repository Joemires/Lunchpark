<?php
// $order_details = <<<EOF
// <div class="d-flex"> 
//     <span> ${[1]} <i class="fa fa-times"></i> ${item[0]} </span> <span> <i class="currency-ng"></i>500 </span> 
// </div>
// EOF;
if (isset($_POST['suppl']) && trim($_POST['suppl']) != '') {
    $suppl_data = explode(', ', substr($_POST['suppl'], 0, strlen($_POST['suppl']) - 2));
    // $suppl_data = array_pop($suppl_data);
    // print_r($suppl_data);
    foreach ($suppl_data as $suppl_item) {
        $item = explode('->', $suppl_item);
        $order_details .= <<<EOF
<div class="d-flex"> 
    <span> ${item[1]} <i class="fa fa-times"></i> ${item[0]} </span> <span> <i class="currency-ng"></i>500 </span> 
</div>
EOF;
    }
    
    // print_r($order_details);

}


$content = <<<EOF
<div class="row ml-0" data-page="billing">
    <div class="col-lg-7">
        <h6> Customer Information </h6>
        <form class="fox rounded">
            <div class="form-group">
                <label> First Name</label>
                <input type="text" value="Joseph">
            </div>
            <div class="form-group">
                <label> Last Name</label>
                <input type="text" value="Bassey">
            </div>
            <div class="form-group">
                <label> E-Mail</label>
                <input type="text" value="Joemires20@yahoo.com">
            </div>
        </form>
        <h6 class="mt-3"> Shipping Information </h6>
        <div class="delivery-address d-flex">
            <div class="address">
                <ul>
                    <li> Jany Larson </li>
                    <li> Unit 2 Green Mount Retail Park </li>
                    <li> Halifax </li>
                    <li> HX1 5QN </li>
                    <li> Tel: +2348164642164</li>
                </ul>
                <a href="#"> Edit Address</a>
            </div>
            <div class="map bg-">

            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <h6> Order Details</h6>
        <hr>
        <div class="order-box">
            ${order_details}
            <div class="d-flex"> 
                <span> Delivery charge </span> <span class="color-fade"> <i class="currency-ng"></i>100 </span> 
            </div>
            <div class="d-flex"> 
                <span> Recipee </span> <span class="color-fade"> <i class="currency-ng"></i>0 </span> 
            </div>
            <div class="d-flex"> 
                <span> Coupon 12% OFF </span> <span class="color-fade"> - <i class="currency-ng ml-1"></i>100 </span> 
            </div>
            <hr>
            <div class="d-flex color-fade"> 
                <span> Subtotal </span> <span class="color-fade"> <i class="currency-ng"></i>800 </span> 
            </div>
            <hr>
            <div class="d-flex color-deep"> 
                <span> Total </span> <span> <i class="currency-ng"></i>800 </span> 
            </div>
            <button class="col-lg-12 mt-3"> place order</button>
        </div>
    </div>
</div>
EOF;
echo $content;
// print_r($_POST);
?>
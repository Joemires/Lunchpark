<?php
// print_r(explode('/', $_SERVER['REQUEST_URI']));
$path = (explode('/', $_SERVER['REQUEST_URI'])[2] == 'service') ? '../' : '' ;

$link_href_pre = <<<EOF
    <link rel="stylesheet" type="text/css" media="screen" href="${path}vendors/lunchpark/css/support.css">
EOF;

$script_src = <<<EOF
    <script src="${path}vendors/lunchpark/js/support.js"></script>
EOF;


include_once "includes/header.php";
?>

<div class="hero-section jumbotron" style="background-image: url('<?php echo $path; ?>images/adult-african-afro-1083619.jpg');">
    <div class="container text-center">
        <h4> Service Support </h4>
    </div>
</div>


<?php
include_once "includes/footer.php";
?>
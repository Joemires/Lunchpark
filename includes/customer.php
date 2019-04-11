<?php
// sleep(5);
session_start();
// print_r($_POST);
include_once "configuration/config.php";
$db = new DB;
$customer = new Customer;
$con = $db -> connection();
$customer -> con = $con;
$action = $db -> string_filter($_POST['action']);
$return_request = array();

if (isset($_SESSION) && isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] && $_SESSION['role'] == 'Customer') {
    $return_request['login'] = TRUE;
} else {
    $return_request['login'] = FALSE;
}


if ($action == 'customer_signup') {
    print_r($_POST);
    $login = $customer -> login($db->string_filter($_POST['email']));
    // print_r($login);
    if (!$login -> num_rows > 0) {
        foreach ($_POST as $key => $val) {
            $datas -> $key = $db -> string_filter($val);
        }
        // print_r($datas);
        $ref_by = $db -> ref_cookie();
        echo $_COOKIE['referrer_code'];
    } else {
        $return_request['message'] = "User Already Registered";
    }
}
if ($action == 'customer_login') {
    $return_request['response'] = 200;
    $login = false;
    $pass = (isset($_POST['passcode']) && $_POST['passcode'] != '') ? $_POST['passcode'] : '';
    $user_check = $customer -> login($db -> string_filter($_POST['email']));
    if ($user_check -> num_rows > 0) {
        $user_info = json_decode(json_encode($user_check -> fetch_assoc()));
        // print_r($user_info);
        if ($pass !== '') {
            // echo "Passcode Available";
            if ($db -> encryptedPass('verify', $pass, $user_info->c_pincode )) {
                $login = true;
                $pro_login = true;
            } else {
                $login = false;
                $return_request['status'] = 'FAILED';
                $return_request['status'] = 'Customers password not correct.';
            }
        } else {
            $login = true;
            $pro_login = false;
        }

        if ($login) {
            $callback = (isset($_SESSION['callback']) && $_SESSION['callback'] != '') ? json_decode($_SESSION['callback']) : '';
            session_destroy();
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['login_type'] = ($pro_login == true) ? 'Pro' : 'Basic';
            $_SESSION['role'] = 'Customer';
            $_SESSION['customer_id'] = $user_info -> c_id;
            $return_request['status'] = 'OK';
            $return_request['message'] = $_SESSION['login_type'].' login successful, Welcome '.$user_info -> c_fullname;
            $return_request['callback'] = $callback;
            // print_r($return_request);
        }
    } else {
        $return_request['status'] = 'FAILED';
        $return_request['message'] = 'Customer not found on our record.';
    }

}

if ($action == 'store_booking_session') {
    $return_request['response'] = 200;
    $callback = array();
    // print_r($_SESSION);
    $callback['url'] = $_POST['url'];
    $_SESSION['callback'] = json_encode($callback);
    // $return_request['response'] = "Redirect Back URL stored as ".$_SESSION['redirecting_url'];
} elseif ($action == 'load_more_menu') {
    sleep(2);
} elseif ($action == 'one-time order') {
    $return_request['message'] = "Ok, working on it";
    $shop_item = 'category='.$_POST['cat'].',id='.$_POST['item_id'];
    setcookie('shop_item', $shop_item, time()+3600, '/', 'localhost');
    $return_request['cookies'] = $_COOKIE;
    $return_request['status'] = 'OK';
}
echo json_encode($return_request);
// print_r($_POST);
?>

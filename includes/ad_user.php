<?php
session_start();
include_once "configuration/config.php";

$db = new DB;
$conn = $db -> connection();
$db -> php_display_errors();
$ad_user = new Ad_user;
$page = isset($_POST['page']) ? strtolower($_POST['page']) : '';

if(!($db -> is_ajax_request())){
    header("location:../Error");
}

if (isset($_SESSION['service_id']) && $_SESSION['service_id'] != '') {
  if ($_SESSION['service'] == 'Both') {
    if ($page == 'eatery' || $page == 'menu' || $page == 'orders') {
      $ad_user -> service_id = explode(",", $_SESSION['service_id'])[0];
    } else {
      $ad_user -> service_id = explode(",", $_SESSION['service_id'])[1];
    }
  } else {
    $ad_user -> service_id = $_SESSION['service_id'];
  }
}


// print_r($_POST);
if($conn) {

    $ad_user -> con = $conn;

    $action = $_POST['action'];

    if($action == 'generate-adu_id') {

        echo $ad_user -> adu_id();
    }

    if($action == 'adu_register') {

        /*foreach ($_POST as $a => $key) {
            echo $db -> string_filter($a) . " => " . $key ."\n";
        }*/

        $adu_zipcode = (isset($_POST['adu_zipcode']) && $_POST['adu_zipcode'] != '') ? $_POST['adu_zipcode'] : "null";
        $adu_f_address= (isset($_POST['adu_f_address']) && $_POST['adu_f_address'] != '') ? $_POST['adu_f_address'] : "null";
        $adu_geolocation = (isset($_POST['adu_geolocation']) && $_POST['adu_geolocation'] != '') ? $_POST['adu_geolocation'] : "Lat-null Long-null";

        $encrpted_pass = $db -> encryptedPass("create", $_POST['adu_password'], "");
        $ad_user -> adu_id = $db -> string_filter($_POST['adu_id']);

        $result = $ad_user -> insert_adu($db -> string_filter($_POST['adu_name']), strtolower($db -> string_filter($_POST['adu_email'])), $db -> string_filter($_POST['adu_phone']), $encrpted_pass, $db -> string_filter($_POST['adu_location']), $db -> string_filter($_POST['adu_locality']), $db -> string_filter($_POST['adu_state']), $db -> string_filter($_POST['adu_service']), $db -> string_filter($adu_zipcode), $db -> string_filter($adu_f_address), $db -> string_filter($adu_geolocation), $db -> string_filter($_POST['reg_name']), $db -> string_filter($_POST['reg_phone']));

        // print_r($result);
        if($result['status'] == 'success') {

            if(strtolower($db -> string_filter($_POST['adu_service'])) == 'eatery'){
                $insert_service = $ad_user -> insert_service ('eatry', 'e_id', '');
            } elseif (strtolower($db -> string_filter($_POST['adu_service'])) == 'event center') {
                $insert_service = $ad_user -> insert_service ('evt_centers', 'ec_id', '');
            } elseif (strtolower($db -> string_filter($_POST['adu_service']))) {
                $insert_service = $ad_user -> insert_service ('eatry', 'e_id', '');
                $insert_service = $ad_user -> insert_service ('evt_centers', 'ec_id', '');
            }

        } else {

        }

    }

    if($action == 'adu_login') {

        $r = array("status" => "fail");
        if (strtolower($_POST['adu_id']) == 'admin') {
          $result = $db -> get_col('admin', '*', 'admin_email', strtolower($db -> string_filter($_POST['adu_login'])), 'admin_phone');
          if ($result && $db -> encryptedPass('verify', $_POST['adu_pass'], $result['admin_pass'])) {
            $return_val['status'] = "success";
            session_destroy();
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['role'] = "Admin";
            $_SESSION['sub_role'] = $result['admin_role'];
            $_SESSION['admin_id'] = $result['admin_id'];
            $return_val['message'] = "Administrator authentication successful, redirecting";
          } else {
            $return_val['message'] = "Administrator authentication was unsuccessful";
          }
        } else {
          if ($db -> get_col('ad_user', 'adu_id', 'adu_id', $db -> string_filter($_POST['adu_id']))) {
            $fetched_result = $ad_user -> get_adu($db -> string_filter($_POST['adu_login']), $db -> string_filter($_POST['adu_login']));
            // print_r($fetched);
            if($fetched_result['message'] == 'fetched') {
              // echo $fetched['adu_password'];
              if ($db -> encryptedPass('verify', $db -> string_filter($_POST['adu_pass']), $fetched_result['adu_password'])) {
                $return_val['status'] = "success";
                session_destroy();
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['role'] = "Ad User";
                $_SESSION['adu_id'] = $fetched_result['adu_id'];
                $_SESSION['service'] = $fetched_result['adu_service'];
                $return_val['message'] = "Login successful, You will soon be redirected";
              } else {
                $return_val['message'] = "Incorrect password";
              }
            } else {
              $return_val['message'] = "E-Mail or Phone Number not found on record";
            }
          } else {
            $return_val['message'] = "Admin ID not found on our record";
          }
        }

    }
    elseif($action == 'adu_venue')
    {
        $return_val = array('status' => false, 'message' => 'Input not correct');
        if($_POST['type'] == 'new') {
            $val =(!empty(trim($_POST['name']))) ? true : false;
            $val =(!empty(trim($_POST['price']))) ? true : false;
            $val =(!empty(trim($_POST['capacity']))) ? true : false;

            if($val) {

                if(isset($_FILES['img']) && $_FILES['img']['name'] != '') {

                } else {
                    $img = "https://lunchpark.com.ng/images/Thumbnail/default_venue.svg";
                }

                $v_id = $db -> unique_id();
                $result = $ad_user -> insert_venue ($v_id, $db -> string_filter($_POST['name']), $img, $db -> string_filter($_POST['capacity']), $db -> string_filter($_POST['price']));
                if($result) {
                    $return_val['status'] = true;
                    $return_val['message'] = "Venue has been added successfully";
                } else {
                    $return_val['status'] = 500;
                }

            }

        }

    }
    elseif($action == 'adu_menu')
    {
        // print_r($_POST);
        $return_val = array('status' => 500, 'message' => 'Input not correct');
        if($_POST['type'] == 'new') {
            $val =(!empty(trim($_POST['name']))) ? true : false;
            $val =(!empty(trim($_POST['price']))) ? true : false;
            $val =(!empty(trim($_POST['quantity']))) ? true : false;
            //echo $val;
            if($val) {

                if(isset($_FILES['img']) && $_FILES['img']['name'] != '') {

                } else {
                    $img = "https://lunchpark.com.ng/images/Thumbnail/default_venue.svg";
                }

                $m_id = $db -> unique_id();
                $result = $ad_user -> insert_menu ($m_id, $db -> string_filter($_POST['name']), $img, $db -> string_filter($_POST['quantity']), $db -> string_filter($_POST['price']));
                if($result) {
                    $return_val['status'] = true;
                    $return_val['message'] = "Menu has been added successfully";
                } else {
                    $return_val['status'] = false;
                    $return_val['message'] = "Server error";
                }

            }

        }
        elseif($_POST['type'] == 'update')
        {
            $suppls = trim($db -> string_filter($_POST['v_suppl']));
            $suppls = substr($suppls, 0, strlen($suppls)-2);
            $menu_update = $ad_user -> update_menu($db -> string_filter($_POST['id']), $db -> string_filter($_POST['name']), $db -> string_filter($_POST['price']), $db -> string_filter($_POST['qty']), $db -> string_filter($_POST['b_nutr']), $db -> string_filter($_POST['placement']), $db -> string_filter($_POST['add_nutr']), $db -> string_filter($_POST['d_suppl']), $suppls, $db -> string_filter($_POST['desc']), $db -> string_filter($_POST['recipee']), $db -> string_filter($_POST['recipee_amt']));
            //print_r($menu_update);
            if($menu_update) {
                $return_val['status'] = true;
                $return_val['message'] = "Menu updated successfully";
                // $return_val['others'] = $suppls;
            } else {
                $return_val['message'] = "Problem updating your menu, contact Admin <br> to resolve this issue";
            }
            //echo count($menu_update);
        }

    }
    elseif ($action == 'adu_delete')
    {
        if ($db -> delete_col($db -> string_filter($page), $db -> string_filter($page.'_id'), $db -> string_filter($_POST['id']))) {
            $return_val['status'] = true;
            $return_val['message'] = ucfirst($page)." removed successful";
        }
    }
    elseif ($action == 'adu_profile_update')
    {
        // print_r($_POST);
        $ad_user -> adu_id = $_SESSION['adu_id'];
        $geo = "Lat-".$db -> string_filter($_POST['adu_geo_lat'])." Long-".$db -> string_filter($_POST['adu_geo_lon']);
        // echo $geo;
        $adu_wrking_hrs = "From-".$_POST['adu_wrking_hrs_from']." To-".$_POST['adu_wrking_hrs_to'];
        // echo $adu_wrking_hrs;

        if ($ad_user -> update_adu($db -> string_filter($_POST['adu_address']), $db -> string_filter($_POST['adu_zipcode']), $db -> string_filter($_POST['adu_state']), $db -> string_filter($_POST['adu_locality']), $db -> string_filter($geo), $db -> string_filter($adu_wrking_hrs))) {
            $return_val['status'] = true;
            $return_val['message'] = "Profile updated successfully";
        } else {
            echo "Not so good after all";
        }

    }

    if ($action == 'adu_writeup' && $_SESSION['role'] == 'Admin') {
      if ($db -> update_one_col('lp_services', 'description', $_POST['desc'], 'name', $db -> string_filter($_POST['name']))) {
        $return_val['status'] = true;
        $return_val['message'] = $_POST['name']." content updated successfully";
      }

    }

    echo json_encode($return_val);
} else {
    $r = array('respond' => 101, 'status' => 'db_error', 'message' => '');
    echo json_encode($r);
}
?>

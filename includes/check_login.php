<?php
session_start();
include_once "configuration/config.php";
$db = new DB;
$con = $db -> connection();
$ad_user = new Ad_user;
$ad_user -> con = $con;

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true && isset($_SESSION['role']) && $_SESSION['role'] != ''){
    if($_SESSION['role'] == "Ad User") {

        $ad_user -> adu_id = $_SESSION['adu_id'];
        $user = $ad_user -> get_adu ();
        array_shift($user);

        if($user['adu_service'] == 'Eatery') {
            $tbl = 'eatry';
            $col = 'e_id';
        } elseif($user['adu_service'] == 'Event Center') {
            $tbl = 'evt_centers';
            $col = 'ec_id';
        }
        if($user['adu_service'] == 'Eatery' || $user['adu_service'] == 'Event Center'){
            $_SESSION['service_id'] = $db -> get_col($tbl, $col, 'adu_id', $db -> string_filter($_SESSION['adu_id']))[$col];
        } elseif($user['adu_service'] == 'Both') {
            $tbl = 'eatry';
            $col = 'e_id';
            $e_id = $db -> get_col($tbl, $col, 'adu_id', $db -> string_filter($_SESSION['adu_id']))['e_id'];

            $tbl = 'evt_centers';
            $col = 'ec_id';
            $ec_id = $db -> get_col($tbl, $col, 'adu_id', $db -> string_filter($_SESSION['adu_id']))['ec_id'];

            $_SESSION['service_id'] = $e_id.",".$ec_id;
        }

    }
} else {
   header('location:login.php');
}
?>

<?php
//print_r($_FILES);
session_start();
include_once '../include/configuration/config.php';
include_once 'image_resize.php';
$db = new DB;
$db -> connection();
$return_arr = array('respond' => '100', 'status' => 'fail');

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true && isset($_SESSION['adu_id']) && $_SESSION['adu_id'] != '') {
    // echo $db -> encryptedPass('verify', 'dearest_glory1234.', '$2y$09$13Wp8EBglIZgLlJayntP6e9UQRRbm5YgX5jKk.uW4yRg/E7Q4do1O');
    $return_arr['respond'] = 200;
    if ($_FILES)
    {
        $fileExt = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $time_stamp = time();
        $path = "../uploads/";
        $file = "LP_".$time_stamp.rand(100, 900).'.'.$fileExt;
        $tmp_name = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $max_size = (1024 * 1024) * 8;
        $sourceProperties = getimagesize($tmp_name);
        $uploadImageType = $sourceProperties[2];
        $sourceImageHeight = $sourceProperties[1];
        $sourceImageWidth = $sourceProperties[0];
        $ext = true;
        //echo $name."<br> <br> ".$tmp_name."<br> ".$type."<br> ".$size."<br> ".$error."<br> ".$max_size;
        switch($uploadImageType)
        {
            case IMAGETYPE_JPEG:
                // $resourceType = imagecreatefromjpeg($tmp_name);
                // $return_arr['optional'] = ($tmp_name);
                // $imageLayer = $db -> resize_image($resourceType, $sourceImageWidth, $sourceImageHeight);
                // imagejpeg($imageLayer, $path.$file);
                break;
            case IMAGETYPE_GIF:
                // $resourceType = imagecreatefromgif($tmp_name);
                // $imageLayer = $db -> resize_image($resourceType, $sourceImageWidth, $sourceImageHeight);
                // imagegif($imageLayer, $path.$file);
                break;
            case IMAGETYPE_PNG:
                // $return_arr['optional'] = "png";
                // $resourceType = imagecreatefrompng($tmp_name);
                // $imageLayer = $db -> resize_image($resourceType, $sourceImageWidth, $sourceImageHeight);
                // imagepng($imageLayer, $path.$file);
                break;
            case IMAGETYPE_TIFF_II:
                // $resourceType = imagecreatefromstring($tmp_name);
                // $imageLayer = $db -> resize_image($resourceType, $sourceImageWidth, $sourceImageHeight);
                // imagestring($imageLayer, $path.$file);
                break;
            default:
                $ext = false;
                break;
        }
        //echo "<br>".$ext."<br>";

        if ($size <= $max_size && $ext) {
            if(move_uploaded_file($tmp_name, $path.$file)) {
                $image = new ImageResize($path.$file);
                $image->width(800);
                $image->resize();
                $image->save($path.'resized_'.$file);
                if (filesize($path.$file) > filesize($path.'resized_'.$file)) {
                    unlink($path.$file);
                    rename($path.'resized_'.$file, $path.$file);
                } else {
                    unlink($path.'resized_'.$file);
                }


                $return_arr['message'] = "File sanitised and uploaded";
                $return_arr['status'] = 201;
                $return_arr['url'] = $path.$file;
                $return_arr['type'] = "success";

                // exec.php
                // $cmd = "dir"; // Windows
                $cmd = "chmod 777 ../uploads/".$path.$file; // Linux, Unix & Mac
                exec(escapeshellcmd($cmd), $output, $status);

            } else {
                $return_arr['status'] = 202;
                $return_arr['message'] = "File sanitized but could not be upload";
                $return_arr['type'] = "warning";
            }
        } else {
            $return_arr['status'] = 203;
            $return_arr['message'] = "Your image type is not accepted or size exceeds 8MB";
            $return_arr['type'] = "danger";
        }
        echo json_encode($return_arr);
    }

    if(isset($_POST['img_role']) && isset($_POST['img_url']) && isset($_POST['table'])) {

        print_r($_POST);
        $url_role = strtolower($_POST['img_role']);
        $checking_col = (strtolower($_POST['table']) == 'menu') ? 'menu_id' : 'venue_id';

        if($url_role == 'other1' || $url_role == 'other2' || $url_role == 'other3') {
            $col = ($checking_col == 'menu_id') ? "menu_imgs" : "venue_imgs";
        } elseif ($url_role == 'main') {
            $col = ($checking_col == 'menu_id') ? "menu_main_img" : "venue_main_img";
        } elseif($url_role == 'featured') {
            $col = ($checking_col == 'menu_id') ? "menu_featured_img" : "venue_featured_img";
        }


        echo $col;
        echo "<br> Checking col = ".$checking_col;
        echo "<br>".$_POST['table'];
        echo "<br>".$_SESSION['service_id'];
        echo "Column = ".$col;
        echo "Item id = ".$_POST['item_id'];
        $row = $db -> get_col($db -> string_filter($_POST['table']), $db -> string_filter($col), $db -> string_filter($checking_col), $db -> string_filter($_POST['item_id']));

        $remove_link = $row[$col];
        print_r($row);

        if($url_role == 'other1' || $url_role == 'other2' || $url_role == 'other3') {
            $str = $remove_link;
            //"other1 -> hdhfhdfdfsfsg || other2 -> hdhfhdfdfsfsg || other3 -> hdhfhdfdfsfsg"; // DB Grab

            $arr = explode(' || ', $str);

            $new_url = " -> ".$_POST['img_url'];

            for ($i=0; $i < count($arr) ; $i++) {

                $url_substring = substr($arr[$i], 0, strlen($url_role));
                if ($url_substring == $url_role) {
                    $remove_link = substr($arr[$i], strlen($url_role)+4, strlen($arr[$i])-strlen($url_role));
                    $arr[$i] = substr_replace($arr[$i], $new_url, strlen($url_role), strlen($arr[$i]));
                    //echo $remove_link;
                }

            }
            $_POST['img_url'] = implode(" || ",$arr);
        }

        // echo "<br>".$_POST['img_url'];
        // echo "<br> <br> <br>";
        echo $_POST['table']." ".$col." ".$_POST['img_url'].$url_role. " ". $_POST['item_id'];
        $remove_link = "../uploads/".$remove_link;

        if(isset($_POST['img_url']) && $_POST['img_url'] != '') {

            if($ins = $db -> update_one_col ($_POST['table'], $col, $_POST['img_url'], $checking_col, $_POST['item_id'])) {
                // echo "  ===  ".$remove_link;
                // echo $remove_link;
                if(file_exists($remove_link) && is_file($remove_link)) {
                    unlink($remove_link);
                }
                echo true;

            } else {
                echo false;
            }
        }
        // print_r($_GLOBAL);
    }
}
?>

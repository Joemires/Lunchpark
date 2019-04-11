<?php
include "credentials.php";

class DB
{
    var $con = '';

    public function __construct() {
        $this -> dburl = $GLOBALS['dbsurl'];
        $this -> dbuser = $GLOBALS['dbsuser'];
        $this -> dbpass = $GLOBALS['dbspass'];
        $this -> dbname = $GLOBALS['dbsname'];
        $this -> con = $this -> connection();
    }

    public function connection()
    {
        $connection = mysqli_connect($this->dburl, $this->dbuser, $this->dbpass, $this->dbname);
        return $this -> con = $connection;
    }

    public function php_display_errors()
    {
      ini_set('display_errors', TRUE);
      error_reporting(E_ALL);
    }

    public function string_filter($string, $convert = null)
    {
        $str = $this -> con -> escape_string(strip_tags($string));
        return (trim($str) == '' && $convert == null) ? Null : trim($str);
    }

    public function check_file($file='', $alt="../images/error_image.png")
    {
        if (file_exists($file)) {
            return $file;
        } else {
            return $alt;
        }
    }

    public function is_ajax_request()
    {
        $server = $_SERVER['HTTP_X_REQUESTED_WITH'];
        return isset($server) && $server == 'XMLHttpRequest';
    }

    public function explode_other_imgs ($img_str, $img_path, $delimiter = ' || ')
    {
      $img_arr = explode($delimiter, $img_str);
      $a = 0;
      $n_str = "othern";
      $other_imgs = array();

      while ($a <= count($img_arr)-1) {
        $str = $img_arr[$a];
        $other_imgs[$a] = $img_path.substr($str, strlen($n_str)+4, strlen($str)-strlen($n_str));
        $a++;
      }
      return $other_imgs;
    }

    public function encryptedPass($action, $pass, $hash)
    {
        if ($action == 'verify') {

            if (password_verify($pass, $hash)) {
                return true;
            } else {
                return false;
            }

        } elseif ($action == 'create') {

            $timeTarget = 0.05;

            $cost = 8;

            do {
                $cost++;
                $start = microtime(true);
                $hash = password_hash($pass, PASSWORD_BCRYPT, ["cost" => $cost]);
                $end = microtime(true);
            } while (($end - $start) < $timeTarget);

            return $hash;
        }

    }

    public function unique_id ($len='', $chars='', $col = '', $tbl = '')
    {
        $unique_ref = '';
        $unique_ref_found = false;
        $possible_chars = "1234567890";

        if ($chars != '') {
            $possible_chars .= $chars;
        }

        $unique_ref_length = 3;

        if($len != '') {
            $unique_ref_length = $len;
        }

        $query = "SELECT `menu_id`, `venue_id` FROM `menu`, `venue` WHERE `menu_id`='".$unique_ref."' or `venue_id`='".$unique_ref."'";

        while (!$unique_ref_found) {

            $unique_ref = "";
            $i = 0;

            while ($i < $unique_ref_length) {

                $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);

                $unique_ref .= $char;

                $i++;

            }


            $result = $this ->con -> query($query) or die(mysqli_error().' '.$query);
            if (mysqli_num_rows($result)==0) {

                $unique_ref_found = true;

            }

        }

        return $unique_ref;

    }


   function truncate($string, $length)
   {
      if (strlen($string) > $length) {
        $string = substr($string, 0, $length) . '...';
      }

      return $string;
   }

   public function send_bulk_sms($number='', $msg='')
   {
       echo $msg;
       if ($number == '' || $msg == '') {
           return;
       }
       $url = "http://api.smartsmssolutions.com/smsapi.php";
       $postvar = "username=Joemires&password=saint10.&sender=Lunchpark&recipient=$number&message=$msg";

       // $ch = curl_init();
       // curl_setopt($ch, CURLOPT_URL, $url);
       // curl_setopt($ch, CURLOPT_FAILONERROR, 1);
       // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       // curl_setopt($ch, CURLOPT_POST, 1);
       // curl_setopt($ch, CURLOPT_POSTFIELDS, $postvar);
       //
       // $result = curl_exec($ch);
       // curl_close($ch);
       // return $result;
   }

   public function order_booking_id($chars='', $len='')
   {
       $unique_ref = '';
       $unique_ref_found = false;
       $possible_chars = "1234567890".$chars;
       while (!$unique_ref_found) {
           $unique_ref = "";
           $i = 0;
           while ($i < ($len != '' ? $len : 4)) {

               $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);

               $unique_ref .= $char;

               $i++;

           }
           $sql = "SELECT `order_id`, `booking_id`, `verification_hash` FROM `orders`, `bookings` WHERE `order_id` = '$unique_ref' or `booking_id` = '$unique_ref' or `verification_hash` = '$unique_ref'";
           $result = $this ->con -> query($sql) or die(mysqli_error($this -> con).' '.$sql);
           if (mysqli_num_rows($result)==0) {

               $unique_ref_found = true;

           }
       }
       return $unique_ref;
   }

   public function get_col($tbl, $col, $check_col1, $check_condition, $check_col2 = '', $return = null) {
      $sql = "select $col from `$tbl` where  $check_col1 = ?";
      if ($check_col2 != '') {
          $sql .= " or $check_col2 = ?";
      }
      $stmt = $this->con -> stmt_init();
      if (!$stmt -> prepare($sql)) {
           echo "Error in SQL Code";
      } else {
           if ($check_col2 != '') {
               $stmt -> bind_param("ss", $check_condition, $check_condition);
           } else {
               $stmt -> bind_param("s", $check_condition);
           }
           if ($stmt -> execute()) {
               $result = $stmt -> get_result();
               $stmt->close();
               if ($result -> num_rows > 0) {
                   if($return != null) {
                        return $result;
                   } else {
                       return mysqli_fetch_assoc($result);
                   }
               } else {
                   return false;
               }

           }
      }

   }

   public function count_row($tbl, $check_col = null, $check_condition = null)
   {
       $sql = "SELECT $check_col FROM $tbl ";
       if ($check_col != null && $check_condition != null) {
           $sql .= "WHERE $check_col = ?";
       }

       $stmt = $this->con -> stmt_init();
       if (!$stmt -> prepare($sql)) {
            return "Error in SQL Code";
       } else {
           if ($check_col != null && $check_condition != null) {
               $stmt -> bind_param("s", $check_condition);
           }
            if ($stmt -> execute()) {

                $result = $stmt -> get_result();
                $stmt->close();
                $count = 0;
                while ($row = $result -> fetch_assoc()) {
                    $count ++;
                }
                return $count;
            }
       }

   }

   public function select_max_min_number($tbl, $col, $check_col, $check_condition)
   {
       $sql = "SELECT MAX($col) as max, MIN($col) as min FROM $tbl WHERE $check_col = ?";
       $stmt = $this->con -> stmt_init();
       if (!$stmt -> prepare($sql)) {
            // "Error in SQL Code";
       } else {
            $stmt -> bind_param("s", $check_condition);
            if ($stmt -> execute()) {

                $result = $stmt -> get_result();
                $stmt->close();
                return mysqli_fetch_assoc($result);

            }
       }
   }

   public function count_int($tbl, $col, $check_col = null, $check_condition = null)
   {
       $sql = "SELECT COUNT($col) as count FROM $tbl WHERE $check_col = ?";

       $stmt = $this->con -> stmt_init();
       if (!$stmt -> prepare($sql)) {
            return "Error in SQL Code";
       } else {
           $stmt -> bind_param("s", $check_condition);
            if ($stmt -> execute()) {

                $result = $stmt -> get_result();
                $stmt->close();
                return mysqli_fetch_assoc($result);

            }
       }
   }

   public function sum_int($tbl, $col, $check_col = null, $check_condition = null)
   {
       $sql = "SELECT SUM($col) as sum FROM $tbl WHERE $check_col = ?";

       $stmt = $this->con -> stmt_init();
       if (!$stmt -> prepare($sql)) {
            return "Error in SQL Code";
       } else {
           $stmt -> bind_param("s", $check_condition);
            if ($stmt -> execute()) {

                $result = $stmt -> get_result();
                $stmt->close();
                return mysqli_fetch_assoc($result);

            }
       }
   }

   public function delete_col($tbl, $check_col, $check_condition) {
      $sql = "DELETE FROM `$tbl` WHERE $check_col = ?";
      $stmt = $this->con -> stmt_init();
      if (!$stmt -> prepare($sql)) {
           // "Error in SQL Code";
      } else {
           $stmt -> bind_param("s", $check_condition);
           if ($stmt -> execute()) {
             return true;
           }
      }
   }

   public function select_grt_lsr_eqls($tbl, $col, $check_col1, $check_condition1, $check_col2, $check_condition2, $operant)
   {
       $sql = "SELECT MIN(`$check_col2`) as cap FROM `$tbl` WHERE `$check_col1`=? AND `$check_col2` $operant ?";
       $stmt = $this -> con -> stmt_init();
       if (!$stmt -> prepare($sql)) {
           echo "Error in SQL Code";
       } else {
           $stmt -> bind_param('sd', $check_condition1, $check_condition2);
           if ($stmt -> execute()) {
               // echo "Searching";
               $result = $stmt -> get_result();
               $stmt -> close();
               if ($result -> num_rows > 0) {
                   return $result -> fetch_assoc();
               }
           }
       }
   }

   public function update_one_col ($tbl, $col, $val, $check_col, $check_condition) {

        $sql = "UPDATE `$tbl` SET `$col`=? WHERE `$check_col` = ?";
        $stmt = $this -> con -> stmt_init();

        if (!$stmt -> prepare($sql)) {
              echo "SQL error";
         } else {
             $stmt -> bind_param("ss", $val, $check_condition);
             if ($stmt ->execute()) {
                $stmt->close();
                 return true;
             }
         }

     }

     public function ref_cookie($ref_id='')
     {
         // echo "Hello";
         if((isset($ref_id) && $ref_id != '' && $this -> get_col('customers', 'c_ref_code', 'c_ref_code', $ref_id)) || isset($_COOKIE['referrer_code'])) {
             if (!(isset($_COOKIE['referrer_code']) && $_COOKIE['referrer_code'] == $ref_id)) {
                 setcookie('referrer_code', $ref_id, time()+259200/* For 3 Days */, '/lunchpark', 'localhost');
             }
             $ref_by = $ref_id;
         } else {
             $ref_by = 'G6351';
         }
         return $ref_by;
     }
}

class Ad_user
{

    var $con = '';
    var $adu_id = '';
    var $service_id = '';

    public function adu_id()
    {
        $unique_ref = '';
        $unique_ref_found = false;
        $possible_chars = "1234567890";

        $unique_ref_length = 4;

        $query = "SELECT `adu_id` FROM `ad_user` WHERE `adu_id`='".$unique_ref."'";


        while (!$unique_ref_found) {

            $unique_ref = "";
            $i = 0;

            while ($i < $unique_ref_length) {

                $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);

                $unique_ref .= $char;

                $i++;

            }

            $unique_ref = "LP".$unique_ref;

            $result = $this ->con -> query($query) or die(mysqli_error().' '.$query);
            if (mysqli_num_rows($result)==0) {

                $unique_ref_found = true;

            }

        }

        return $unique_ref;

    }

    public function insert_adu($adu_name, $adu_email, $adu_phone, $adu_pass, $adu_address, $adu_locality, $adu_state, $adu_service, $adu_zipcode, $adu_f_address, $adu_geolocation, $reg_name, $reg_phone){

        $exist = $this -> get_adu($adu_email, $adu_phone, $adu_address, $adu_locality, $adu_state);

        if(isset($exist['status']) && $exist['status'] && isset($exist['message']) && $exist['message'] == 'fetched') {
            $msg = array("status" => "failed", "message" => "Account information already exist");
            if($exist['id']) {
                $msg['suggest'] = "Try refreshing the ID";
            }

            return $msg;
        }

        $adu_msg = array('status' => 'error');
        $adu_logo = "https://lunchpark.com.ng/images/demo_logo.png";
        $adu_wrking_hrs = "null";
        $adu_active = "true";

        $sql = "insert into ad_user values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this-> con -> stmt_init();

        if (!$stmt -> prepare($sql)) {
             $adu_msg['message'] = "SQL statement failed";
        } else {
            $stmt -> bind_param("ssssssssssissssss", $this->adu_id , $adu_name, $adu_email, $adu_phone, $adu_pass, $adu_address, $adu_locality, $adu_state, $adu_f_address, $adu_geolocation, $adu_zipcode, $adu_service, $adu_logo, $adu_wrking_hrs, $adu_active, $reg_name, $reg_phone);
            if ($stmt ->execute()) {
                $stmt->close();
                $adu_msg['status'] = "success";
                $adu_msg['message'] = "Code inserted";
            } else {
                $adu_msg['message'] = "bad code";
            }
        }
        return $adu_msg;
    }

    public function get_adu ($adu_email='', $adu_phone='', $adu_address='', $adu_locality='', $adu_state=''){

        $sql = "select * from ad_user where adu_id = ? OR adu_email = ? or adu_phone = ? or (adu_address = ? and adu_locality = ? and adu_state = ?)";

        $stmt = $this->con -> stmt_init();

        $check_msg = array("status" => false);
        if (!$stmt -> prepare($sql)) {
            $check_msg['message'] = "Error in SQL Code";
        } else {
            $stmt -> bind_param("ssssss", $this->adu_id, $adu_email, $adu_phone, $adu_address, $adu_locality, $adu_state);
            if ($stmt -> execute()) {

                $result = $stmt -> get_result();
                $stmt->close();
                $check_msg['status'] = true;
                $check_msg['id'] = false;

                if ($result -> num_rows > 0) {

                    $check_msg['message'] = "fetched";
                    $row = mysqli_fetch_assoc($result);
                    //$check_msg .= $row;

                    foreach($row as $k => $d) {
                        $check_msg[$k] = $d;
                    }

                    if($this -> adu_id == $row['adu_id']) {
                        $check_msg['id'] = true;
                    }

                } else {

                    $check_msg['message'] = "No row found";

                }
            }
        }

        return $check_msg;

    }

    public function update_adu ($adu_address, $adu_zipcode, $adu_state, $adu_locality, $adu_geolocation, $adu_wrking_hrs)
    {
      $sql = "UPDATE `ad_user` SET `adu_address`=?, `adu_zip_code`=?, `adu_locality`=?, `adu_state`=?, `adu_geolocation`=?, `adu_wrking_hrs`=? WHERE `adu_id`=?";
      $stmt = $this -> con -> stmt_init();

      if (!$stmt -> prepare($sql)) {
          return false;
      } else {
          $stmt -> bind_param("sisssss", $adu_address, $adu_zipcode, $adu_locality, $adu_state, $adu_geolocation, $adu_wrking_hrs, $this -> adu_id);
          if ($stmt -> execute()) {
              $stmt -> close();
              return true;
          }
      }
    }

    public function insert_service ($tbl, $col, $val) {

       $sql = "insert into `$tbl` (`$col`, `adu_id`) values (?, ?)";
       $stmt = $this -> con -> stmt_init();

       if (!$stmt -> prepare($sql)) {
             return false;
        } else {
            $stmt -> bind_param("is", $val, $this->adu_id);
            if ($stmt ->execute()) {
                $stmt->close();
                return true;
            }
        }

    }

    public function insert_venue ($v_id, $v_name, $v_img, $v_cap, $v_price) {

       $sql = "insert into `venue` (`venue_id`, `ec_id`, `venue_name`, `venue_main_img`, `venue_capacity`, `venue_price`) values (?, ?, ?, ?, ?, ?)";
       $stmt = $this -> con -> stmt_init();

       if (!$stmt -> prepare($sql)) {
             return false;
        } else {
            $stmt -> bind_param("sissid", $v_id, $this->service_id, $v_name, $v_img, $v_cap, $v_price);
            if ($stmt ->execute()) {
                $stmt->close();
                return true;
            }
        }

    }

    public function insert_menu ($m_id, $m_name, $m_img, $m_qty, $m_price) {

        $sql = "insert into `menu` (`menu_id`, `e_id`, `menu_name`, `menu_main_img`, `menu_qty`, `menu_price`) values (?, ?, ?, ?, ?, ?)";
        $stmt = $this -> con -> stmt_init();

        if (!$stmt -> prepare($sql)) {
              return false;
         } else {
             $stmt -> bind_param("sissid", $m_id, $this->service_id, $m_name, $m_img, $m_qty, $m_price);
             if ($stmt ->execute()) {
                $stmt->close();
                 return true;
             }
         }

     }

    public function fetch_service_item ($service_tbl, $service_id_col, $indexing='') {
        $sql = "select * from `$service_tbl` where `$service_id_col` = ?";
        $stmt = $this->con -> stmt_init();
        if (!$stmt -> prepare($sql)) {
            return "Error in SQL Code";
        } else {
            $stmt -> bind_param("s", $this -> service_id);
            if ($stmt -> execute()) {

                $result = $stmt -> get_result();
                $stmt->close();
                $a = array();

                if ($result -> num_rows > 0) {
                    //echo "True";
                    $a[0] = true;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        if ($indexing != '') {
                            $a[$row[$indexing]] = $row;
                        } else {
                            $a[] = $row;
                        }
                    }
                } else {
                   $a[0] = false;
                }
            }
        }

        return $a;

    }

    public function update_menu($m_id, $m_name, $m_price, $m_qty, $m_basic_nutr, $m_placement, $m_add_nutr, $m_default_suppl, $m_var_suppl, $m_descr, $m_recipee, $m_recipee_amt)
    {
        $sql = "UPDATE `menu` SET `menu_name`=?,`menu_default_suppliment`=?,`menu_suppliments`=?,`menu_main_nutrient`=?,`menu_nutrients`=?,`menu_price`=?,`menu_description`=?,`menu_qty`=?, `menu_recipee`=?, `menu_recipee_price`=? WHERE `menu_id`=?";
       $stmt = $this -> con -> stmt_init();

       if (!$stmt -> prepare($sql)) {
             return false;
        } else {
            $stmt -> bind_param("sssssdsisdi", $m_name, $m_default_suppl, $m_var_suppl, $m_basic_nutr, $m_add_nutr, $m_price, $m_descr, $m_qty, $m_recipee, $m_recipee_amt, $m_id);
            if ($stmt ->execute()) {
                $stmt->close();
                $sql = "SELECT * from `menu` WHERE `menu_id` = '$m_id'";
                $query = $this->con -> query($sql);
                if (mysqli_num_rows($query) > 0) {
                    //$this -> con -> query("UPDATE `menu` set `menu_aval` = 'complete' WHERE `menu_id` = '$m_id'");
                    $row = $query -> fetch_array(MYSQLI_NUM);

                    $count = 0;
                    $exist = 0;
                    while($count < count($row)) {
                        //echo $row[$count];
                        if($row[$count] == '' || $row[$count] == Null) {
                            $exist ++;
                            //echo "Exist is row ".$count;
                        }
                        $count ++;
                    }
                    //print_r($row);
                    //echo $exist;
                    if($exist > 0) {
                        $this -> con -> query("UPDATE `menu` set `menu_aval` = 'incomplete' WHERE `menu_id` = '$m_id'");

                    } else {
                        $this -> con -> query("UPDATE `menu` set `menu_aval` = 'complete' WHERE `menu_id` = '$m_id'");

                    }
                }

                return true;
            }
        }
        //return func_get_args();
    }

}

class Customer
{
   var $customer_id = '';
   var $con = '';

  public function login ($email, $pass='') {

      $sql = "SELECT * FROM `customers` WHERE `c_email`=?";

      $stmt = $this->con -> stmt_init();
      if (!$stmt -> prepare($sql)) {
          echo "Error in SQL Code";
      } else {
        $stmt -> bind_param("s", $email);

        if ($pass != '') {
            $stmt -> bind_param("ss", $email, $pass);
        }

        if($stmt -> execute()) {
           $result = $stmt -> get_result();
           // print_r($result);
           $stmt -> close();
           return $result;
        }
      }
  }

  public function register($fullname, $email, $phone, $address, $locality, $state, $ref_code, $ref_by)
  {
    $sql = "INSERT INTO customers (`c_email`, `c_fullname`, `c_phone`, `c_address`, `c_locality`, `c_state`, `c_ref_code`, `c_ref_by`) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this -> con -> stmt_init();
    if (!$stmt -> prepare($sql)) {

    } else {
        $stmt -> bind_param('ssssssss', $email, $fullname, $phone, $address, $locality, $state, $ref_code, $ref_by);
        if ($stmt -> execute()) {
            return true;
        } else {
            return false;
        }
    }
  }

  public function fetch_all_item ($tbl1, $tbl2, $col, $order_col='', $order_type='DESC', $condition_col=NULL, $condition=NULL) {

    $sql = "SELECT `$tbl1`.* FROM `$tbl1` ORDER BY $order_col $order_type";
    if ($condition_col != NULL) {
        $sql = "SELECT `$tbl1`.* FROM `$tbl1` WHERE $condition_col = ? ORDER BY $order_col $order_type";
    }

     $stmt = $this->con -> stmt_init();
     if (!$stmt -> prepare($sql)) {
         echo "Error in SQL Code";
     } else {

         if ($condition_col != NULL) {
             $stmt -> bind_param('s', $condition);
         }
         if ($stmt -> execute()) {

             $result = $stmt -> get_result();
             $stmt->close();
             $a = array();
             // print_r($result);
             if ($result -> num_rows > 0) {
                 //echo "True";
                 $a[0] = true;
                 $a[1] = $result;

             } else {
                $a[0] = false;
             }
         }
     }

     return $a;
 }

  public function fetch_ad_user ($test_con) {
    $sql = "SELECT ad_user.adu_id, ad_user.adu_name, ad_user.adu_email, ad_user.adu_phone, ad_user.adu_address, ad_user.adu_service, ad_user.adu_locality, ad_user.adu_state, ad_user.adu_geolocation, ad_user.adu_logo, ad_user.adu_wrking_hrs, ad_user.adu_availability FROM ad_user WHERE `adu_id` = ? OR `adu_email` = ? OR `adu_locality` = ? OR `adu_state` = ?  OR `adu_geolocation` = ? OR `adu_address` = ? OR `adu_service` = ?";

    $stmt = $this->con -> stmt_init();
    if (!$stmt -> prepare($sql)) {
        echo "Error in SQL Code";
    } else {
      $stmt -> bind_param("sssssss", $test_con, $test_con, $test_con, $test_con, $test_con, $test_con, $test_con);
      if($stmt -> execute()) {
         $result = $stmt -> get_result();
         $stmt -> close();
         return $result -> fetch_assoc();
      }
    }
  }

  public function view_item ($tbl, $check_col, $check_condition)
  {
      $sql = "SELECT $tbl.* FROM $tbl WHERE $check_col=?";

      $stmt = $this->con -> stmt_init();
      if (!$stmt -> prepare($sql)) {
          echo "Error in SQL Code";
      } else {
        $stmt -> bind_param("s", $check_condition);
        if($stmt -> execute()) {
           $result = $stmt -> get_result();
           $stmt -> close();
           return ($result -> fetch_assoc());
       } else {
           echo "No";
       }
      }
  }

  public function check_center_avalability($place_id, $str_time, $end_time) {
      $sql = "SELECT `bookings`.booking_id FROM `bookings`, `venue` WHERE (`bookings`.venue_id=? or `venue`.venue_id=?) AND (`bookings`.event_date_timestamp BETWEEN ? AND ?)";
      $stmt = $this -> con -> stmt_init();
      if (!$stmt -> prepare($sql)) {
          echo "Error in SQL Code";
      } else {
          $stmt -> bind_param('ssss', $place_id, $place_id, $str_time, $end_time);
          if($stmt -> execute()) {
              if ($stmt -> get_result() -> num_rows > 0) {
                  return true;
              } else {
                  return false;
              }
          }
      }
  }

  public function post_comment($service_id, $service_item_id, $comment, $customer_id)
  {
    $timestamp = time();

    $sql = "insert into `customers_comment` (`service_id`, `service_item_id`, `c_comment_c_id`, `c_comment`, `c_comment_timestamp`) values (?, ?, ?, ?, ?)";
    $stmt = $this -> con -> stmt_init();

    if (!$stmt -> prepare($sql)) {
          echo "Not a good code";
     } else {
         $stmt -> bind_param("iiisi", $service_id, $service_item_id, $customer_id, $comment, $timestamp);
         if ($stmt ->execute()) {
             $stmt->close();
             echo "Okey good";
         }
     }
  }

  public function fetch_comment($check_col, $check_condition)
  {
      $sql = "SELECT * FROM `customers_comment` WHERE `$check_col`=?";

      $stmt = $this->con -> stmt_init();
      if (!$stmt -> prepare($sql)) {
          echo "Error in SQL Code";
      } else {
        $stmt -> bind_param("s", $check_condition);
        if($stmt -> execute()) {
           return $stmt -> get_result();
           $stmt -> close();
        }
      }
  }

  public function place_order($type, $tranx_ref, $datas, $payment_status='')
  {
      $datas = (array) $datas;

      if ($type == 'menu') {
          $sql = "insert into orders values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $datas['delivery_method'] = ucwords(strtolower(implode(' ', explode('_', $datas['delivery_method']))));
          $datas['payment_method'] = ucwords(strtolower(implode(' ', explode('_', $datas['payment_method']))));
      } else {

      }
      $stmt = $this -> con -> stmt_init();
      if (!$stmt -> prepare($sql)) {

      } else {
          if ($type == 'menu') {
              $delivery_status = 0;
              $stmt -> bind_param("sidisssdddsssss", $datas['order_id'], $datas['qty'], $datas['amt'], $datas['c_id'], $datas['menu_id'], $datas['additives'], $datas['delivery_method'], $datas['delivery_time'], $datas['order_time'], $datas['payable_amt'], $datas['payment_method'], $datas['status'], $tranx_ref, $delivery_status, $datas['verification_hash']);
          }

          if($stmt -> execute()) {
              $stmt -> close();
              return true;
          } else {
              return false;
          }
      }
  }



}
?>

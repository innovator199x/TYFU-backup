<?php
include("main.class.php");

class Functions extends Database {
    /*
     * ** Main Function Developed By Akram Chauhan :) <<<
      -> mac_getData()
      - return single and multi records
      -> mac_getValue()
      - return single records
      -> mac_getTotalRecord()
      - return number of records
      -> mac_getMaxVal()
      - return maximum value
      -> mac_insert()
      - insert record
      -> mac_delete()
      - delete record
      -> mac_update()
      - update record
      -> tableExists()
      - check whether table exist or not
      -> mac_limitChar()
      - return trimed character string
      -> mac_dupCheck()
      - check for duplicate record in table
      -> mac_location()
      - redirect to given URL
      -> mac_getDisplayOrder()
      - get next display order
      -> mac_createSlug()
      - create alias of given string
      -> mac_getTotalReview()
      - number of total review of product
      -> mac_catData()
      - get cid/sid/ssid from slug
      -> clean()
      - prevent mysql injction
      -> mac_productQty()
      - Current Product Qty
      -> mac_getProductPriceDiv()
      - Product Price Div
     */

    public function mac_getData($table, $rows = '*', $where = null, $order = null, $die = 0) { // Select Query, $die==1 will print query By Akram Chauhan
        $results = array();
        $q = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($order != null)
            $q .= ' ORDER BY ' . $order;
        if ($die == 1) {
            echo $q;
            die;
        }
        if ($this->tableExists($table)) {
            if (mysql_num_rows(mysql_query($q)) > 0) {
                $results = @mysql_query($q);
                return $results;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function mac_getValue($table, $row = null, $where = null, $die = 0) { // single records ref HB function
        if ($this->tableExists($table) && $row != null && $where != null) {
            $q = 'SELECT ' . $row . ' FROM ' . $table . ' WHERE ' . $where;
            if ($die == 1) {
                echo $q;
                die;
            }
            if (mysql_num_rows(mysql_query($q)) > 0) {
                $results = @mysql_fetch_array(mysql_query($q));
                return $results[$row];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function mac_getMaxVal($table, $row = null, $where = null, $die = 0) {
        if ($this->tableExists($table) && $row != null && $where != null) {
            $q = 'SELECT MAX(' . $row . ') as ' . $row . ' FROM ' . $table . ' WHERE ' . $where;
            if ($die == 1) {
                echo $q;
                die;
            }
            if (mysql_num_rows(mysql_query($q)) > 0) {
                $results = @mysql_fetch_array(mysql_query($q));
                return $results[$row];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function mac_getMinVal($table, $row = null, $where = null, $die = 0) {
        if ($this->tableExists($table) && $row != null && $where != null) {
            $q = 'SELECT MIN(' . $row . ') as ' . $row . ' FROM ' . $table . ' WHERE ' . $where;
            if ($die == 1) {
                echo $q;
                die;
            }
            if (mysql_num_rows(mysql_query($q)) > 0) {
                $results = @mysql_fetch_array(mysql_query($q));
                return $results[$row];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function mac_getSumVal($table, $row = null, $where = null, $die = 0) {
        if ($this->tableExists($table) && $row != null && $where != null) {
            $q = 'SELECT SUM(' . $row . ') as ' . $row . ' FROM ' . $table . ' WHERE ' . $where;
            if ($die == 1) {
                echo $q;
                die;
            }
            if (mysql_num_rows(mysql_query($q)) > 0) {
                $results = @mysql_fetch_array(mysql_query($q));
                return $results[$row];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function mac_getAvgVal($table, $row = null, $where = null, $die = 0) {
        if ($this->tableExists($table) && $row != null && $where != null) {
            $q = 'SELECT AVG(' . $row . ') as ' . $row . ' FROM ' . $table . ' WHERE ' . $where;
            if ($die == 1) {
                echo $q;
                die;
            }
            if (mysql_num_rows(mysql_query($q)) > 0) {
                $results = @mysql_fetch_array(mysql_query($q));
                return $results[$row];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function mac_getTotalRecord($table, $where = null, $die = 0) { // return number of records By Akram Chauhan
        $q = 'SELECT * FROM ' . $table;
        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($die == 1) {
            echo $q;
            die;
        }
        if ($this->tableExists($table))
            return mysql_num_rows(mysql_query($q)) + 0;
        else
            return 0;
    }

    public function mac_insert($table, $values, $rows = 0, $die = 0) { // mac_insert - Insert and Die Values By Akram Chauhan
        if ($this->tableExists($table)) {
            $insert = 'INSERT INTO ' . $table;
            if (count($rows) > 0) {
                $insert .= ' (' . implode(",", $rows) . ')';
            }

            for ($i = 0; $i < count($values); $i++) {
                if (is_string($values[$i]))
                    $values[$i] = '"' . $values[$i] . '"';
            }
            $values = implode(',', $values);
            $insert .= ' VALUES (' . $values . ')';
            if ($die == 1) {
                echo $insert;
                die;
            }
            $ins = @mysql_query($insert);
            if ($ins) {
                $last_id = mysql_insert_id();
                return $last_id;
            } else {
                return false;
            }
        }
    }

    public function mac_delete($table, $where = null, $die = 0) {
        if ($this->tableExists($table)) {
            if ($where != null) {
                $delete = 'DELETE FROM ' . $table . ' WHERE ' . $where;
                if ($die == 1) {
                    echo $delete;
                    die;
                }
                $del = @mysql_query($delete);
            }
            if ($del) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function mac_update($table, $rows, $where, $die = 0) { //update query by Akram Chauhan
        if ($this->tableExists($table)) {
            // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row
            //print_r($where);die;

            $update = 'UPDATE ' . $table . ' SET ';
            $keys = array_keys($rows);
            for ($i = 0; $i < count($rows); $i++) {
                if (is_string($rows[$keys[$i]])) {
                    $update .= $keys[$i] . '="' . $rows[$keys[$i]] . '"';
                } else {
                    $update .= $keys[$i] . '=' . $rows[$keys[$i]];
                }

                // Parse to add commas
                if ($i != count($rows) - 1) {
                    $update .= ',';
                }
            }
            $update .= ' WHERE ' . $where;
            if ($die == 1) {
                echo $update;
                die;
            }
            //$update = trim($update," AND");
            $query = @mysql_query($update);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function tableExists($table) {
        $tablesInDb = @mysql_query('SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');
        if ($tablesInDb) {
            if (mysql_num_rows($tablesInDb) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function mac_limitChar($content, $limit, $url = "javascript:void(0);", $txt = "&hellip;") {
        if (strlen($content) <= $limit) {
            return $content;
        } else {
            $ans = substr($content, 0, $limit);
            if ($url != "") {
                $ans .= "<a href='$url' class='desc'>$txt</a>";
            } else {
                $ans .= "&hellip;";
            }
            return $ans;
        }
    }

    public function mac_dupCheck($table, $where = null, $die = 0) { // Duplication Check BY Akram Chauhan
        $q = 'SELECT id FROM ' . $table;
        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($die == 1) {
            echo $q;
            die;
        }
        if ($this->tableExists($table)) {
            $results = @mysql_num_rows(mysql_query($q));
            if ($results > 0) {
                return true;
            } else {
                return false;
            }
        } else
            return false;
    }

    public function mac_location($redirectPageName = null) { // Lcaotion BY Akram Chauhan
        if ($redirectPageName == null) {
            header("Location:" . $this->SITEURL);
            exit;
        } else {
            header("Location:" . $redirectPageName);
            exit;
        }
    }

    public function mac_getDisplayOrder($table, $where = null, $die = 0) { // Display Order BY Akram Chauhan
        $q = 'SELECT MAX(display_order) as display_order FROM ' . $table;
        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($die == 1) {
            echo $q;
            die;
        }
        if ($this->tableExists($table)) {
            $results = @mysql_query($q);
            if (@mysql_num_rows($results) > 0) {
                $disp_d = mysql_fetch_array($results);
                return intval($disp_d['display_order']) + 1;
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    public function mac_createSlug($string) {    // Slug BY Akram Chauhan 
        $slug = strtolower(trim(preg_replace('/-{2,}/', '-', preg_replace('/[^a-zA-Z0-9-]/', '-', $string)), "-"));
        return $slug;
    }

    public function mac_createProSlug($string) { // Product Slug BY Akram Chauhan 
        $slug = strtolower(trim(preg_replace('/-{2,}/', '-', preg_replace('/[^a-zA-Z0-9-.]/', '-', $string)), "-"));
        return $slug;
    }

    public function getDBName() {
        $dbData = $this->db_host . "," . $this->db_user . "," . $this->db_pass . "," . $this->db_name;
        return $dbData;
    }
    public function getRandomStr($limit) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $limit; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
    
    public function sendVarificationEmail($id, $email, $str) {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $content = "<html><head><title>Thank You for Register with Us</title></head>
		<style type='text/css'>
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
        	max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>

<body>

<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td>
                        <!-- HERO IMAGE -->
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            <td align='center' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding'>" . $message . "</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align='center'>
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            


</body>
</html>";


        //		mail($row,$subject,$content,$headers)or die('please Check in mail code');
        require_once "../smtpmail/Mail.php";

        $from = "Customer Service<customerservice@thankyoufollowup.com>";
        $to = $row;
        $subject = $subject;
        $body = $content;

        $host = "ssl://gator3058.hostgator.com";
        $port = "465";
        $username = "customerservice@thankyoufollowup.com";
        $password = "Makemoney123";

        $headers = array('From' => $from,
            'To' => $to,
            'Subject' => $subject,
            'MIME-Version' => '1.0',
            'Content-Type' => "text/html; charset=ISO-8859-1");

        //print_r($headers);
        //exit;
        $smtp = Mail::factory('smtp', array('host' => $host,
                    'port' => $port,
                    'auth' => true,
                    'username' => $username,
                    'password' => $password));

        //print_r($smtp);
        //exit;

        $mail = $smtp->send($to, $headers, $content);

        //print_r($mail);

        if (PEAR::isError($mail)) {
            echo("<p>" . $mail->getMessage() . "</p>");
        } else {
            echo("<p>Message successfully sent!</p>");
        }
    }
    public function setViewCounter($tableName, $counterFieldName, $setCounterOnField, $setCounterOnFieldValue) {
        setcookie($counterFieldName . '_' . $setCounterOnFieldValue, "productViewCookie", time() + 3600);
        $counterUpdateQuery = "UPDATE " . $tableName . " SET " . $counterFieldName . " = " . $counterFieldName . "+1 WHERE " . $setCounterOnField . "=" . $setCounterOnFieldValue;
        //echo $counterUpdateQuery; exit;
        mysql_query($counterUpdateQuery);
    }
    
    public function mac_num($val, $deci = "2", $sep = ".", $thousand_sep = "") {
        return number_format($val, $deci, $sep, $thousand_sep);
    }

    public function catData($cslug = null, $sslug = null, $ssslug = null) {
        if ($cslug != null && $sslug == null && $ssslug == null) {
            return $this->mac_getData("category", "*", "slug='" . $cslug . "' AND isDelete=0");
        } else if ($cslug != null && $sslug != null && $ssslug == null) {
            $cid = $this->mac_getValue("category", "id", "slug='" . $cslug . "'");
            return $this->mac_getData("sub_category", "*", "cid='" . $cid . "' AND slug='" . $sslug . "' AND isDelete=0");
        } else if ($cslug != null && $sslug != null && $ssslug != null) {
            $cid = $this->mac_getValue("category", "id", "slug='" . $cslug . "'");
            $sid = $this->mac_getValue("sub_category", "id", "cid='" . $cid . "' AND slug='" . $sslug . "'");
            return $this->mac_getData("sub_sub_category", "*", "cid='" . $cid . "' AND sid='" . $sid . "' AND slug='" . $ssslug . "' AND isDelete=0");
        } else {
            return false;
        }
    }

    public function mac_getTotalReview($pid) {
        return $this->mac_getTotalRecord("product_review", "pid = '" . $pid . "'");
    }

    public function clean($string) {
        $string = trim($string);        // Trim empty space before and after
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);             // Stripslashes
        }
        $string = mysql_real_escape_string($string);           // mysql_real_escape_string
        return $string;
    }

    public function mac_getProductQty($pid, $subpid = 0) {
        if ($subpid > 0) {
            $proQty = $this->mac_getValue("sub_product", "qty", "id='" . $subpid . "'");
        } else {
            $proQty = $this->mac_getValue("product", "qty", "id='" . $pid . "'");
        }
        return $proQty;
    }

    public function mac_getProductPriceDiv($max_price, $sell_price) {
        if ($sell_price < $max_price && $sell_price != $max_price) {
            ?>
            <span class="price"><?php echo CURR; ?><?php echo $sell_price; ?></span><span class="price-before-discount"><?php echo CURR; ?><?php echo $max_price; ?></span>
            <?php
        } else {
            ?>
            <span class="price"><?php echo CURR; ?><?php echo $sell_price; ?></span><span class="price-before-discount"></span>
            <?php
        }
    }

    public function mac_getShippingCharge($pincode, $pid, $subpid = 0) {
        if ($subpid > 0) {
            $tabName = "sub_product";
            $pro_id = $subpid;
        } else {
            $tabName = "product";
            $pro_id = $pid;
        }
        $deliveryPin_r = $this->mac_getData("delivery_pincode", "*", "pincode='" . $pincode . "' AND isDelivery=1");
        if (mysql_num_rows($deliveryPin_r) > 0) {
            $deliveryPin_d = mysql_fetch_array($deliveryPin_r);
            $area_type = $deliveryPin_d["area_type"];

            if ($area_type == 0) {
                $shipping_charge = $this->mac_num($this->mac_getValue($tabName, "local_ship_charge", "id='" . $pro_id . "'"));
            } else if ($area_type == 1) {
                $shipping_charge = $this->mac_num($this->mac_getValue($tabName, "zonal_ship_charge", "id='" . $pro_id . "'"));
            } else {
                $shipping_charge = $this->mac_num($this->mac_getValue($tabName, "national_ship_charge", "id='" . $pro_id . "'"));
            }
            return $shipping_charge;
        } else {
            return $this->mac_num($this->mac_getValue($tabName, "national_ship_charge", "id='" . $pro_id . "'"));
        }
    }

    public function mac_checkDeliveryAndShipping($pincode, $pid) {
        if ($this->mac_getTotalRecord("delivery_pincode", "pincode='" . $pincode . "'") > 0) {
            if ($this->mac_getTotalRecord("delivery_pincode", "pincode='" . $pincode . "' AND isDelivery=1") > 0) {
                $shipping_charge = $this->mac_getShippingCharge($pincode, $pid);
                if ($shipping_charge == 0.00) {
                    $shipping_charge = "Free";
                } else {
                    $shipping_charge = CURR . $shipping_charge;
                }
                $_SESSION['SHOPWALA_SESS_PINCODE'] = $pincode;
                ?>
                <div class="col-md-5"><strong>Delivery available at pincode:</strong> <?php echo $pincode; ?></div>
                <div class="col-md-5"><strong>Shipping Charges:</strong> <?php echo $shipping_charge; ?></div>
                <?php
            } else {
                ?>
                <div class="col-md-12"><strong>Delivery not available at pincode:</strong> <?php echo $pincode; ?></div>
                <?php
            }
        } else {
            ?>
            <div class="col-md-12"><strong>Sorry, we couldn't find pincode:</strong><?php echo $pincode; ?></div>
            <?php
        }
    }

    public function printr($val, $isDie = 1) {
        echo "<pre>";
        print_r($val);
        if ($isDie) {
            die;
        }
    }
    
    

}

include("cart.class.php");
include("admin.class.php");
?>
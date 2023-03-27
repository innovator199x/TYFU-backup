<?php 
    include('./inc/config.php');
    include('./inc/myfunctions.php');
    require_once "./inc/smtpmail/Mail.php";
    include('./template/email_template.php');
    $id = $_SESSION['user_id'];

    if(isset($_POST['save_thank_you'])){

        $thank_you_email_subject = $_POST['thank_you_email_subject'];
        $thank_you_email_color = $_POST['thank_you_email_color'];
        $thank_you_button_color = $_POST['thank_you_button_color'];
        $thank_you_email_body = mysqli_real_escape_string($conn, $_POST['thank_you_email_body']);
        $thank_you_sms_body = $_POST['thank_you_sms_body'];
        // echo $thank_you_email_body;

        $results = mysqli_query($conn, "
        UPDATE user_settings SET thank_you_email_subject = '$thank_you_email_subject', 
        thank_you_email_color = '$thank_you_email_color', thank_you_button_color = '$thank_you_button_color',
        thank_you_email_body = '$thank_you_email_body', thank_you_sms_body = '$thank_you_sms_body' WHERE user_id = $id
        ");

        if ($results) {
            echo 1;
        }

    }

    if(isset($_POST['delete_review'])){ 
        $review_id = $_POST['id'];
        $results = mysqli_query($conn, "UPDATE bt_review SET bt_review.isDELETE = 1 WHERE bt_review.id = '$review_id'");
        if ($results) {
            echo 1;
        }
    }

    if(isset($_POST['delete_offer'])){ 
        $id = $_POST['id'];
        $results = mysqli_query($conn, "UPDATE review SET review.isDELETE = 1 WHERE review.id = '$id'");
        if ($results) {
            echo 1;
        }
    }

    if(isset($_POST['save_review_text'])){ 
        $review_text = $_POST['review_text'];
        $results = mysqli_query($conn, "UPDATE user_settings SET user_settings.review_site_description = '$review_text' WHERE user_settings.user_id = $id");
        if ($results) {
            echo 1;
        }
    }

    if(isset($_POST['save_review_link'])){ 
        $question = $_POST['question'];
        $review_link = $_POST['review_link'];
        $results = mysqli_query($conn, "INSERT INTO bt_review (bt_review.user_id, bt_review.platform, bt_review.review_link) VALUES ($id, '$question', '$review_link')");
        if ($results) {
            echo 1;
        }
    }

    if(isset($_POST['edit_offer'])){ 
        $id = $_POST['id'];
        // $review_link = $_POST['review_link'];
        $results = mysqli_query($conn, "SELECT * FROM review WHERE id = '$id'");
        $data = mysqli_fetch_assoc($results);
        // if ($results) {
        //     echo 1;
        // }

        echo '
        <div class="card-body">
            <div class="form-group clearfix">
                <div class="col-md-12">
                    <label>Enter Offer Details</label>
                    <textarea id="offer_details_edit" name="offer_details_edit" class="form-control" required>'.$data['offer_insentive'].'</textarea>
                </div>
                <div class="col-md-12">
                    <label>Offer Expiration Days</label>
                    <input type="number" id="offer_expire_edit" name="offer_expire_edit" class="form-control" value="'.$data['offer_days'].'" required></input>
                </div>
                <div class="col-md-12">
                    <label>Enter Address and Phone Number</label>
                    <input type="text" id="offer_address_edit" name="offer_address_edit" class="form-control" value="'.$data['address'].'" required></input>
                </div>
                <div class="col-md-12">
                    <label>Enter Referral Incentive</label>
                    <input type="text" id="offer_incentive_edit" name="offer_incentive_edit" class="form-control" value="'.$data['referral_incentive'].'" required></input>
                </div>
                <div class="col-md-12">
                    <label>Enter Offfer Redeem Pin</label>
                    <input type="number" id="offer_pin_edit" name="offer_pin_edit" class="form-control" value="'.$data['redeem_pin'].'" required></input>
                </div>
                <div class="col-md-12">
                    <label>Choose Offer Image</label>
                    <input type="file" id="offer_image_edit" name="offer_image_edit" class="form-control" accept="image/*"></input>
                    <input type="hidden" id="offer_image_file" name="offer_image_file" class="form-control" value="'.$data['offer_image'].'"></input>
                    <input type="hidden" id="review_id" name="review_id" class="form-control" value="'.$data['id'].'"></input>
                </div><br>
                <div class="col-md-12">
                    <img src="../assets/img/offer/'.$data['offer_image'].'" class="img img-responsive" style="width: 240px; height: auto;" />
                </div>
                </div><br>   
            </div>
        </div>
        ';
    }

    if(isset($_POST['add_new_review'])){ 
        $question = $_POST['question'];
        $question_type = $_POST['question_type'];
        $ans1 = $_POST['ans1'];
        $ans2 = $_POST['ans2'];
        $ans3 = $_POST['ans3'];
        $ans4 = $_POST['ans4'];
        $ans5 = $_POST['ans5'];
        $offer_date = date("Y-m-d");
        $table = 'questions';

        $values = array($id,$_POST['status'],$question,$question_type,$ans1, $ans2, $ans3, $ans4, $ans5, $offer_date);
        $rows = array('user_id','status','question','question_type' ,'ans1', 'ans2', 'ans3', 'ans4', 'ans5', 'timestamp');

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
        $results = mysqli_query($conn, $insert);

        if ($results) {
            echo 1;
        }
    }

    if(isset($_POST['delete_survey'])){ 
        $id = $_POST['id'];

        $results = mysqli_query($conn, "UPDATE questions SET isDelete = 1 WHERE id = $id");

        if ($results) {
            echo 1;
        }
    }

    if(isset($_POST['update_survey_status'])){ 
        $sid = $_POST['sid'];
        $status = $_POST['status'];

        if ($status == 1) {
            $newstatus = 0;
        } else {
            $newstatus = 1;
        }

        $results = mysqli_query($conn, "UPDATE questions SET status = $newstatus WHERE id = $sid");

        if ($results) {
            echo 1;
        }
    }

    if(isset($_POST['add_customer'])){ 
        $fileName = $_FILES["customer_csv"]["tmp_name"];
        $name = $_FILES["customer_csv"]["name"];

        if ($name != '') {
            $tmp = explode('.', $name);
            $file_extension = end($tmp);
            if ($file_extension == 'csv') {
                $file = fopen($fileName, "r");
                while (($data = fgetcsv($file, 100000)) !== FALSE){
                    $enter_date = date("Y-m-d");
                    $table = 'customer';
                    $name = "";
                    if (isset($data[0])) {
                        $name = mysqli_real_escape_string($conn, $data[0]);
                    }
                    $email = "";
                    if (isset($data[1])) {
                        $email = mysqli_real_escape_string($conn, $data[1]);
                    }
                    $mobile_no = "";
                    if (isset($data[2])) {
                        $mobile_no = mysqli_real_escape_string($conn, $data[2]);
                    }
                    echo $name.' '.$email.' '.$mobile_no;
                    $dup = mysqli_query($conn, "SELECT * FROM customer WHERE name = '$name' AND email = '$email' AND mobile_no = '$mobile_no' LIMIT 1");
                    $rowcount = mysqli_num_rows($dup);
                    // echo $rowcount;
                    if ($rowcount == 1) {
                        // header('location: customers');
                    } else {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < 5; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        // echo $randomString;
                        $values = array($id,$randomString,$name,$email,$mobile_no, $enter_date);
                        $rows = array('user_id','pin','name','email','mobile_no','enter_date');

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
                        $results = mysqli_query($conn, $insert);
                    }
                }
                header('location: customers');
            }
        } else {
            // echo 0;
            $enter_date = date("Y-m-d");
            $table = 'customer';
            $name = $_POST['name'];
            $email_address = $_POST['email_address'];
            $mobile_number = $_POST['mobile_number'];

            $dup = mysqli_query($conn, "SELECT * FROM customer WHERE name = '$name' AND email = '$email_address' AND mobile_no = '$mobile_number' LIMIT 1");
            $rowcount = mysqli_num_rows($dup);

            if ($rowcount == 1) {
                header('location: customers');
            } else {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 5; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                // echo $randomString;
                $values = array($id,$randomString,$name,$email_address,$mobile_number, $enter_date);
                $rows = array('user_id','pin','name','email','mobile_no','enter_date');

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
                $results = mysqli_query($conn, $insert);

                // $from = "$bname<$business_from_email>";
                $from = "Test";
                $to = "suppordev199x@gmail.com";
                // $subject = $settings['thank_you_email_subject'].$name;
                $subject = "Test Subject";
                // include("email_content.php");
                // $body = $content;

                //$host = "ssl://gator3058.hostgator.com";
                $host = "ssl://host.upselltech.com";
                $port = "465";
                $username = "customerservice@thankyoufollowup.com";
                $password = "Makemoney123";

                $headers = array(
                    'From' => $from,
                    'To' => $to,
                    'Subject' => $subject,
                    'MIME-Version' => '1.0',
                    'Content-Type' => "text/html; charset=ISO-8859-1");

                //print_r($headers);
                //exit;
                $smtp = Mail::factory('smtp', array(
                    'host' => $host,
                    'port' => $port,
                    'auth' => true,
                    'username' => $username,
                    'password' => $password));

                //print_r($smtp);
                //exit;
                $con = "Test content";
                $mail = $smtp->send($to, $headers, $con);

                //print_r($mail);

                if (PEAR::isError($mail)) {
                    // ("<p>" . $mail->getMessage() . "</p>");
                    echo "Wala na send";
                    
                } else {
                    //mysql_query("update customer set follow_count = follow_count+1 where id=$last_id");
                    // mysql_query("update customer set follow_count = follow_count+1,fol_date='".date('Y-m-d')."',email_open='0',reminder_sent='0' where id=$last_id");
                    // ("<p>Follow-up successfully sent!</p>");
                    echo "Na send";
                }

                if ($results) {
                    // header('location: customers');
                }
            }
        }
    }

    mysqli_close($conn);

?>

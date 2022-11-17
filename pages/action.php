<?php 
    include('./inc/config.php');
    include('./inc/myfunctions.php');
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

?>

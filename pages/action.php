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

?>

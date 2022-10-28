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

?>

<?php include('./inc/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logo/<?php echo ($_SESSION['source'] == 'MBT') ? 'my.png':'up.png'; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/logo/<?php  echo ($_SESSION['source'] == 'MBT') ? 'my.png':'up.png'; ?>" type="image/x-icon">
    <title>Dashboard | <?php echo ($_SESSION['source'] == 'MBT') ? 'MyBeautyTech':'UpsellTech'; ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/simple-mde.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

    
  </head>

  <style>
    /* .page-wrapper .sidebar-main-title h6{
      color: #4E0275;
    } */
  </style>
  <body onload="startTime()" class="dark-only">
  <!-- <body onload="startTime()" > -->
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="./dashboard"><img class="img-fluid" src="../assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col horizontal-wrapper ps-0">
          </div>
          <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0 me-0">
                <!-- <div class="media profile-media"><img class="b-r-10" src="../assets/images/logo/<?php // echo ($_SESSION['source'] == 'MBT') ? 'mybeautytech.png':'upselltech.png'; ?>" alt=""> -->
                  <div class="media-body"><span><?=$_SESSION['name'];?></span>
                    <p class="mb-0 font-roboto">User <i class="middle fa fa-angle-down"></i></p>
                  </div>
                <!-- </div> -->
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="./profile"><i data-feather="user"></i><span>Profile </span></a></li>
                  <li><a href="./settings"><i data-feather="settings"></i><span>Settings</span></a></li>
                  <li><a href="../login?logout=1"><i data-feather="log-out"> </i><span>Log out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
      
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <!-- <div class="logo-wrapper"><a href="./dashboard"><img class="img-fluid for-light" src="../assets/images/logo/<?php // echo ($_SESSION['source'] == 'MBT') ? 'mbt-light.png':'upsell-light.png'; ?>" alt=""><img class="img-fluid for-dark" style="-webkit-filter: brightness(0) invert(1);" src="../assets/images/logo/<?php // echo ($_SESSION['source'] == 'MBT') ? 'mybeautytech.png':'upsell-light.png'; ?>" alt=""></a> -->
            <div class="logo-wrapper"><a href="./dashboard"><img class="img-fluid for-light" style="width: 170px; height: auto;" src="../assets/images/logo/<?php echo ($_SESSION['source'] == 'MBT') ? 'mybeautytech.png':'upsell-light.png'; ?>" alt=""><img class="img-fluid for-dark" style="width: 170px; height: auto;" src="../assets/images/logo/<?php echo ($_SESSION['source'] == 'MBT') ? 'mybeautytech.png':'upsell-light.png'; ?>" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="./dashboard"><img class="img-fluid" src="../assets/images/logo/<?php echo ($_SESSION['source'] == 'MBT') ? 'mbt-light.png':'upsell-light.png'; ?>" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="./dashboard"><img class="img-fluid" src="../assets/images/logo/<?php echo ($_SESSION['source'] == 'MBT') ? 'mbt-light.png':'upsell-light.png'; ?>" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>GENERAL</h6>
                    </div>
                  </li>
                  <li class="sidebar-list">
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'dashboard') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./dashboard"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'settings') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./settings"><i data-feather="settings"> </i><span>Settings</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'manage_optin') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./manage_optin"><i data-feather="package"></i><span>Manage Optin</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'customers') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./customers"><i data-feather="user"></i><span>Customers</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'referral_customers') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./referral_customers"><i data-feather="users"></i><span>Referral Customers</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'track_redemptions') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./track_redemptions"><i data-feather="grid"></i><span>Track Redemptions</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'sms_credits') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./sms_credits"><i data-feather="message-circle"></i><span>SMS Credits</span></a></li>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>FOLLOW-UP</h6>
                    </div>
                  </li>
                  <li class="sidebar-list">
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'thank_you') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./thank_you"><i data-feather="thumbs-up"> </i><span>Thank You</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'survey') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./survey"><i data-feather="list"> </i><span>Survey</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'review') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./review"><i data-feather="folder"></i><span>Review</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'offer_referral') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./offer_referral"><i data-feather="archive"></i><span>Offer/Referral</span></a></li>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>BROADCAST</h6>
                    </div>
                  </li>
                  <li class="sidebar-list">
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'email_broadcast') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./email_broadcast"><i data-feather="mail"></i><span>Email Broadcast</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="<?php  if($sidebar_active == 'sms_broadcast') { echo 'background-color:'.$sidebar_active_color; } ?>" href="./sms_broadcast"><i data-feather="message-square"> </i><span>SMS Broadcast</span></a></li>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6></h6>
                    </div>
                  </li>
                  
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
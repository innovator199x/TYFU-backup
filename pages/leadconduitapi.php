<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | API</title>
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
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/prism.css">
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
  <body class="dark-only">
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
    <div class="page-wrapper horizontal-wrapper enterprice-type" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="./index"></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col horizontal-wrapper ps-0">
          </div>
          <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0 me-0">
                <!-- <div class="media profile-media"><img class="b-r-10" src="../assets/images/logo/<?php // echo ($_SESSION['source'] == 'MBT') ? 'mybeautytech.png':'upselltech.png'; ?>" alt=""> -->
                  <div class="media-body"><span>Admin</span>
                  </div>
                <!-- </div> -->
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
            <div class="logo-wrapper"><a href="#">5th Limb Consulting API</a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="./index"></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="./index"></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>GENERAL</h6>
                    </div>
                  </li>
                  <li class="sidebar-list">
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" style="background-color:#7366ff;" href="./index"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                  </li>  
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
      
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">

        <!-- Page Sidebar Ends-->
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>CRM Leads</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index">                                       <i data-feather="user"></i></a></li>
                    <li class="breadcrumb-item">Leads</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          
          <!-- Container-fluid starts-->
          <div class="container-fluid">


            <div class="col-sm-12">
              <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-9">
                        <!-- <button class="form-control btn btn-primary" style="width: 200px;" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="fa fa-plus"></i>Add Customer</button> -->
                      </div>
                      <div class="col-md-3">
                        <input type="text" name="search" class="form-control" id="search" placeholder="Search Here" onkeyup="load_data(this.value);" />
                      </div>
                    </div><br>
                    <!-- <div class="row"> -->
                      <div style="margin-bottom: -20px;" class="pull-right"><b>Total Customer's - <span id="total_data"></span></b></div>
                    <!-- </div> -->
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Lead Type</th>
                            <th class="text-center">Supplier Name</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody id="post_data"></tbody>
                      </table><br>
                      <div class="pull-right" id="pagination_link"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid Ends-->
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Leads Details</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="div_api">
                    
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-primary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-secondary" type="button" data-bs-original-title="" title=""><i class="fa fa-send"></i>Send Follow-Up</button> -->
                </div>
            </div>
            </div>
        </div>

        <script>

        load_data();

        function load_data(query = '', page_number = 1)
        {
          var form_data = new FormData();

          form_data.append('query', query);

          form_data.append('page', page_number);

          var ajax_request = new XMLHttpRequest();

          ajax_request.open('POST', 'leadconduitapi_process_data.php');

          ajax_request.send(form_data);

          ajax_request.onreadystatechange = function()
          {
            if(ajax_request.readyState == 4 && ajax_request.status == 200)
            {
              var response = JSON.parse(ajax_request.responseText);

              var html = '';

              var serial_no = 1;

              // alert(response.data.length);

              if(response.data.length > 0)
              {
                for(var count = 0; count < response.data.length; count++)
                {
                  html += '<tr>';
                  html += '<td class="text-center">'+response.data[count].first_name+'</td>';
                  html += '<td class="text-center">'+response.data[count].last_name+'</td>';
                  html += '<td class="text-center">'+response.data[count].phone+'</td>';
                  html += '<td class="text-center">'+response.data[count].lead_type+'</td>';
                  html += '<td class="text-center">'+response.data[count].name+'</td>';
                  html += '<td class="text-center"><button class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" onclick="get_details('+response.data[count].id+')"><i class="fa fa-info-circle"></i>API</button></td>';
                  html += '</tr>';
                  serial_no++;
                }
              }
              else
              {
                html += '<tr><td colspan="3" class="text-center">No Data Found</td></tr>';
              }

              document.getElementById('post_data').innerHTML = html;

              document.getElementById('total_data').innerHTML = response.total_data;

              document.getElementById('pagination_link').innerHTML = response.pagination;

            }

          }
        }

        function get_details(id) {
            $.ajax({
              url: 'leadconduitapi_process_data.php',
              type: 'POST',
              async: false,
              data:{
                  id:id,
                  get_details: 1,
              },
                  success: function(response){
                    $("#div_api").html(response);
                  }
              });
        } 

        function save_link(id) {
          // alert(id);
          let trusted_form = $('#trusted_form').val();
          $.ajax({
              url: 'leadconduitapi_process_data.php',
              type: 'POST',
              async: false,
              data:{
                  id:id,
                  trusted_form:trusted_form,
                  save_link: 1
              },
                  success: function(response){
                    // alert(response);
                    if (response == 1) {
                      swal("Success!", "Successfully saved.", "success");
                    } else {
                      swal(
                            "Error!", "Something went wrong.", "error"           
                        );
                    }
                  }
              });
        }

        function submit_api(id) {
          if (confirm('Are you sure?')) {
            $.ajax({
              url: 'https://5thlimbconsulting.com/px_pingpost/leadconduitapi.php',
              type: 'POST',
              async: false,
              data:{
                  id:id,
                  submit_api: 1
              },
                  success: function(response){
                    console.log(response);
                    // if (response == 1) {
                    //   swal("Success!", "Successfully saved.", "success");
                    // } else {
                    //   swal(
                    //         "Error!", "Something went wrong.", "error"           
                    //     );
                    // }
                  }
              });
          }
        }

        </script>

      </div>
    </div>
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/chart/chartist/chartist.js"></script>
    <script src="../assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="../assets/js/chart/knob/knob.min.js"></script>
    <script src="../assets/js/chart/knob/knob-chart.js"></script>
    <script src="../assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="../assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="../assets/js/notify/bootstrap-notify.min.js"></script>
    <!-- <script src="../assets/js/dashboard/default.js"></script> -->
    <script src="../assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="../assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="../assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="../assets/js/typeahead/handlebars.js"></script>
    <script src="../assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="../assets/js/typeahead/typeahead.custom.js"></script>
    <script src="../assets/js/typeahead-search/handlebars.js"></script>
    <script src="../assets/js/typeahead-search/typeahead-custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <!-- <script src="../assets/js/theme-customizer/customizer.js"></script> -->
    <!-- login js-->
    <!-- Plugin used-->
    <script src="../assets/js/prism/prism.min.js"></script>
    <script src="../assets/js/clipboard/clipboard.min.js"></script>
    <script src="../assets/js/custom-card/custom-card.js"></script>
    <script src="../assets/js/button-tooltip-custom.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="../assets/js/editor/ckeditor/adapters/jquery.js"></script>
    <script src="../assets/js/editor/ckeditor/styles.js"></script>
    <script src="../assets/js/editor/ckeditor/ckeditor.custom.js"></script>
    <script src="../assets/js/tooltip-init.js"></script>
    <script src="../assets/js/sweet-alert/sweetalert.min.js"></script>
    <script src="../assets/js/sweet-alert/app.js"></script>
    <!-- Plugins JS Ends-->
  </body>
</html>
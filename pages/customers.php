
        <?php 
        $sidebar_active = 'customers';
        include('./template/header.php'); ?>

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Customers</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./customers">                                       <i data-feather="user"></i></a></li>
                    <li class="breadcrumb-item">Customers</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">


            <div class="col-sm-12">
              <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-9"><button class="form-control btn btn-primary" style="width: 200px;" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="fa fa-plus"></i>Add Customer</button></div>
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
                            <th class="text-center">Customer ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Mobile No.</th>
                            <th class="text-center">Customer Pin</th>
                            <th class="text-center">Claimed Referral <br> Rewards</th>
                            <th class="text-center">Unclaimed Referral <br> Rewards</th>
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
                <h4 class="modal-title" id="myLargeModalLabel">Add New Customer</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="card">
                            <!-- <div class="card-body"> -->
                                <div class="mb-3">
                                    <label class="col-form-label pt-0">Add Customer for SINGLE Upload</label><br>
                                    <label class="col-form-label pt-0">Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label pt-0">Email Address</label>
                                    <input class="form-control" id="mobile_number" type="email" placeholder="Email Address">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label pt-0">Country Code + Mobile Number</label>
                                    <input class="form-control" id="business_name" type="text" placeholder="Country Code + Mobile Number">
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="col-form-label pt-0">Upload CSV for BULK Upload</label>
                                    <input class="form-control" id="customer_csv" type="file">
                                </div>
                                <div class="mb-3">
                                    <span class="help-block"><a class="text-primary" href="https://thankyoufollowup.com/new_design/new_user/assets/csv_format.png" target="_blank">View File Format</a></span>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-secondary" type="button" data-bs-original-title="" title=""><i class="fa fa-send"></i>Send Follow-Up</button>
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

          ajax_request.open('POST', 'process_data_customer.php');

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
                  html += '<td class="text-center">'+response.data[count].id+'</td>';
                  html += '<td class="text-center">'+response.data[count].name+'</td>';
                  html += '<td class="text-center">'+response.data[count].email+'</td>';
                  html += '<td class="text-center">'+response.data[count].mobile_no+'</td>';
                  html += '<td class="text-center">'+response.data[count].pin+'</td>';
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

        </script>
        <?php include('./template/footer.php'); ?>
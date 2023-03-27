
        <?php 
        $sidebar_active = 'track_redemptions';
        include('./template/header.php'); ?>

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Track Redemptions</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./track_redemptions">                                       <i data-feather="grid"></i></a></li>
                    <li class="breadcrumb-item">Track Redemptions</li>
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
                      <div class="col-md-9"><h3>Customers Redemptions</h3></div>
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
                            <th class="text-center">Reffered By</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody id="post_data"></tbody>
                      </table><br>
                      <div class="pull-right" id="pagination_link"></div>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-9"><h3>Referral Customers Redemptions</h3></div>
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
                              <th class="text-center">Reffered By</th>
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
        </div>
          
        <!-- Container-fluid Ends-->
        </div>
        <script>

        load_data();

        function load_data(query = '', page_number = 1)
        {
          var form_data = new FormData();

          form_data.append('query', query);

          form_data.append('page', page_number);

          var ajax_request = new XMLHttpRequest();

          ajax_request.open('POST', 'referral_customers_process.php');

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
                  html += '<td class="text-center">'+response.data[count].ref+'</td>';
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
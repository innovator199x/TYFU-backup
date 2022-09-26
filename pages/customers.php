
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
                  <button class="form-control btn btn-primary" style="width: 200px;" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="fa fa-plus"></i>Add Customer</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div id="basic-1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="basic-1_length"><label>Show <select name="basic-1_length" aria-controls="basic-1" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="basic-1_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="basic-1" data-bs-original-title="" title=""></label></div><table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                        <thead>
                          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 144.375px;">Name</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 239.797px;">Position</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 106.766px;">Office</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 44.7344px;">Age</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 96.3438px;">Start date</th><th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80.9844px;">Salary</th></tr>
                        </thead>
                        <tbody>
                        <tr role="row" class="odd">
                            <td class="sorting_1">Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Angelica Ramos</td>
                            <td>Chief Executive Officer (CEO)</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09</td>
                            <td>$1,200,000</td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Bradley Greer</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13</td>
                            <td>$132,000</td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Brenden Wagner</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>28</td>
                            <td>2011/06/07</td>
                            <td>$206,850</td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Bruno Nash</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>38</td>
                            <td>2011/05/03</td>
                            <td>$163,500</td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Caesar Vance</td>
                            <td>Pre-Sales Support</td>
                            <td>New York</td>
                            <td>21</td>
                            <td>2011/12/12</td>
                            <td>$106,450</td>
                          </tr><tr role="row" class="odd">
                            <td class="sorting_1">Cara Stevens</td>
                            <td>Sales Assistant</td>
                            <td>New York</td>
                            <td>46</td>
                            <td>2011/12/06</td>
                            <td>$145,600</td>
                          </tr><tr role="row" class="even">
                            <td class="sorting_1">Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                          </tr></tbody>
                      </table><div class="dataTables_info" id="basic-1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="basic-1_paginate"><a class="paginate_button previous disabled" aria-controls="basic-1" data-dt-idx="0" tabindex="0" id="basic-1_previous" data-bs-original-title="" title="">Previous</a><span><a class="paginate_button current" aria-controls="basic-1" data-dt-idx="1" tabindex="0" data-bs-original-title="" title="">1</a><a class="paginate_button " aria-controls="basic-1" data-dt-idx="2" tabindex="0" data-bs-original-title="" title="">2</a><a class="paginate_button " aria-controls="basic-1" data-dt-idx="3" tabindex="0" data-bs-original-title="" title="">3</a><a class="paginate_button " aria-controls="basic-1" data-dt-idx="4" tabindex="0" data-bs-original-title="" title="">4</a><a class="paginate_button " aria-controls="basic-1" data-dt-idx="5" tabindex="0" data-bs-original-title="" title="">5</a><a class="paginate_button " aria-controls="basic-1" data-dt-idx="6" tabindex="0" data-bs-original-title="" title="">6</a></span><a class="paginate_button next" aria-controls="basic-1" data-dt-idx="7" tabindex="0" id="basic-1_next" data-bs-original-title="" title="">Next</a></div></div>
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
        <?php include('./template/footer.php'); ?>
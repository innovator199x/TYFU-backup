
        <?php 
        $sidebar_active = 'review';
        include('./template/header.php');
        $results = mysqli_query($conn, "SELECT * FROM bt_review WHERE bt_review.user_id = $id AND bt_review.isDELETE = 0");

        $results_review_site = mysqli_query($conn, "SELECT * FROM user_settings WHERE user_settings.user_id = $id");
        $data_review_site = mysqli_fetch_assoc($results_review_site);
        ?>
       

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Review</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./review">                                       <i data-feather="folder"></i></a></li>
                    <li class="breadcrumb-item">Review</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                    <div class="default-according style-1" id="accordionoc">
                        <div class="col-lg-12">
                            <a href="http://thankyoufollowup.com/TestMy/r/0/0" target="_blank" class="btn btn-success"><i class="fa fa-external-link"></i> Preview</a>
                            <a href="#" target="_blank" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#addlink"><i class="icofont icofont-ui-add"></i> Add Link</a>
                        </div><br>
                        <div class="card">
                            <div class="card-header bg-primary">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="false" aria-controls="collapseicon2"><i class="icofont icofont-ui-edit"></i>Edit Review Text</button>
                            </h5>
                            </div>
                            <div class="collapse" id="collapseicon2" data-bs-parent="#accordionoc">
                            <div class="card-body">
                                <div class="form-group">
                                  <label class="control-label" for="review_site_description"></label>
                                      <textarea id="editor1" name="editor1" cols="20" rows="10">
                                      <?php 
                                      if ($data_review_site['review_site_description'] != '') {
                                        echo $data_review_site['review_site_description'];
                                      } else {
                                        echo "<h3>We are very happy that you enjoyed your experience. We would really appreciate it if you left us a review on one of the sites below.</h3>";
                                      }
                                      ?>
                                      </textarea>
                                  
                                  </div><br>
                              <center><button style="width: 150px;" type="button" id="save_form" name="review_page_des_submit" class="btn btn-info" onclick="save_review_text()">   <i class="fa fa-save"></i> Save Text </button></center>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="review-table">
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Platform</th> 
                                <th>Type</th>
                                <th>Review Link</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;
                            while($data = mysqli_fetch_array($results)) {
                            ?>
                          <tr>
                            <td><?=$i++;?></td>
                            <td><?=$data['platform'];?></td>
                            <td><?=$data['type'];?></td>
                            <td><?=$data['review_link'];?></td>
                            <td>
                            <a href="javascript:;" onclick="delete_review(<?php echo $data['id']; ?>)" class="btn btn-danger"> <i class="icofont icofont-ui-delete"></i> </a>
                            </td>
                          </tr>
                            <?php
                            }
                            ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>


          </div>
          <!-- Container-fluid Ends-->

          <div class="modal fade" id="addlink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Review Link Site</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                      <div>
                          <label>Note: (For Google review site, please include the place id following the instruction below.</label>
                          <p>Instruction: (add the link/Place ID)</p>
                          <ul>
                              <li>Go to Google Maps Platform by clicking the link: <a href="https://bit.ly/3Ob0BM5" target="_blank">https://bit.ly/3Ob0BM5</a></li>
                              <li>On the "place id's" field you will see a map and a box to "enter a location".</li>
                              <li>Enter your business address and click enter.</li>
                              <li>Copy the place id.</li>
                              <li>Your entry should be review link/place ID (www.yourbusiness.com/yourplaceIDhere).</li>
                          </ul>
                          <p>For assistance, contact our support team.</p>
                      </div>
                      <div class="form-group clearfix">
                        <div class="col-md-12">
                            <select name="question" id="question" class="form-control border_s">
                                <option>Select Platform</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Google">Google</option>
                                <option value="Yelp">Yelp</option>
                                <option value="TripAdvisor">TripAdvisor</option>
                                <option value="Angies List">Angies List</option>
                                <option value="Foursquare">Foursquare</option>
                                <option value="Opentable">Opentable</option>
                                <option value="Bing Places">Bing Places</option>
                                <option value="Better Business Bureau">Better Business Bureau</option>
                                <option value="Yellow Pages">Yellow Pages</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                      </div><br>   
                      <div id="link" class="form-group clearfix">
                        <div class="col-md-12">
                              <input type="text" name="review_link" id="review_link" placeholder="Enter Site Review Link/Place ID for Google Flatform" class="form-control"><br>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-secondary" onclick="save_review_link()" type="button">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
          function delete_review(id) {
            if (confirm('Are you sure you want to delete it?')) {
              $.ajax({
              url: 'action.php',
              type: 'POST',
              async: false,
              data:{
                  id:id,
                  delete_review: 1,
              },
                  success: function(response){
                    if (response == 1) {
                      swal("Success!", "Successfully saved.", "success");
                      setTimeout(function(){
                        window.location.reload();
                      }, 1000);
                    } else {
                      swal(
                            "Error!", "Something went wrong.", "error"           
                        );
                    }
                    
                  }
              });
            }
          }

          function save_review_text(){
            review_text = CKEDITOR.instances.editor1.getData();
            $.ajax({
              url: 'action.php',
              type: 'POST',
              async: false,
              data:{
                  review_text:review_text,
                  save_review_text: 1,
              },
                  success: function(response){
                    if (response == 1) {
                      swal("Success!", "Successfully saved.", "success");
                      setTimeout(function(){
                        window.location.reload();
                      }, 1000);
                    } else {
                      swal(
                            "Error!", "Something went wrong.", "error"           
                        );
                    }
                    
                  }
              });
          }

          function save_review_link(){
            let question = $('#question').val()
            let review_link = $('#review_link').val()

            $.ajax({
              url: 'action.php',
              type: 'POST',
              async: false,
              data:{
                  question:question,
                  review_link:review_link,
                  save_review_link: 1,
              },
                  success: function(response){
                    if (response == 1) {
                      swal("Success!", "Successfully saved.", "success");
                      setTimeout(function(){
                        window.location.reload();
                      }, 1000);
                    } else {
                      swal(
                            "Error!", "Something went wrong.", "error"           
                        );
                    }
                    
                  }
              });
          }
        </script>
        <?php include('./template/footer.php'); ?>
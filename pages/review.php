
        <?php 
        $sidebar_active = 'review';
        include('./template/header.php');
        $results = mysqli_query($conn, "SELECT * FROM bt_review WHERE bt_review.user_id = $id AND bt_review.isDELETE = 0");
        // $data = mysqli_fetch_assoc($results);
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
                            </div><br>
                            <div class="card">
                                <div class="card-header bg-primary">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon1" aria-expanded="false"><i class="icofont icofont-ui-add"></i>Add Review Site Link</button>
                                </h5>
                                </div>
                                <div class="collapse" id="collapseicon1" aria-labelledby="headingeight" data-bs-parent="#accordionoc">
                                    <div class="card-body">
                                    <form method="post" id="reg-form" onsubmit="return check_form();">
                            	  
 								    
		       
                                  <!--</a><input type="text" name='question' id="question" placeholder='Enter Platform' class="form-control" />-->
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
                                     
                                      <div class="col-md-11">
                                          <select name="question" class="form-control border_s">
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
                                     
                                      <div class="col-md-11">
                                            <input type="text" name="answer1" id="ans1" placeholder="Enter Site Review Link/Place ID for Google Flatform" class="form-control"><br>
                                      </div>
                                  </div>
                                      
                                     
                                    <input type="hidden" name="user_id" value="">
                                  
                                                                      <!-- <input onclick="change()" type="submit" class="btn btn-primary" value="Save" id="myButton1" /> -->
  
                                  <span id="addr1"></span>
  
                                      <center><button style="width: 200px;" type="submit" id="save_form1" name="question_submit" class="btn btn-info">   Add Review Site Link </button></center>
             
                             </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-primary">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="false" aria-controls="collapseicon2"><i class="icofont icofont-ui-edit"></i>Edit Review Text</button>
                                </h5>
                                </div>
                                <div class="collapse" id="collapseicon2" data-bs-parent="#accordionoc">
                                <div class="card-body">
                                 	<form method="post" id="reg-form2" onsubmit="return check_form2();">
                                              <div class="form-group">
        											<label class="control-label" for="review_site_description"></label>
                                                    <textarea id="editor1" name="editor1" cols="20" rows="10">
                                                    sdasdasdas
                                                    </textarea>
    	                               
                                              </div><br>

           	 				          	<center><button style="width: 150px;" type="submit" id="save_form" name="review_page_des_submit" class="btn btn-info">  <i class="fa fa-save"></i> Save Text </button></center>
           
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <!-- <div class="table-responsive">
                              <table class="table display" id="basic-1"> -->

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
        </script>
        <?php include('./template/footer.php'); ?>
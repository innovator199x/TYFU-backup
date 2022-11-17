
        <?php 
        $sidebar_active = 'offer_referral';
        include('./template/header.php');

        if(isset($_POST['submit'])) {

          $filename = $_FILES["offer_image"]["name"];
          $tempname = $_FILES["offer_image"]["tmp_name"];
          $folder = "../assets/img/offer/" . $filename;

          move_uploaded_file($tempname, $folder);

          $query = "
          INSERT INTO review (
            user_id,
            offer_insentive,
            offer_days, 
            address, 
            referral_incentive, 
            redeem_pin, 
            offer_image
          ) 
          VALUES (
            $id,
            '".$_POST['offer_details']."',
            '".$_POST['offer_expire']."', 
            '".$_POST['offer_address']."', 
            '".$_POST['offer_incentive']."', 
            '".$_POST['offer_pin']."', 
            '".$filename."'
            )
          ";

          mysqli_query($conn, $query);
        }

        if(isset($_POST['edit_submit'])) {

          $filename = $_FILES["offer_image_edit"]["name"];
          $tempname = $_FILES["offer_image_edit"]["tmp_name"];
          $folder = "../assets/img/offer/" . $filename;

          if ($filename != '') {
            move_uploaded_file($tempname, $folder);
            $image_name = $filename;
          } else {
            $image_name = $_POST['offer_image_file'];
          }

          $query = "
          UPDATE review SET
            offer_insentive = '".$_POST['offer_details_edit']."',
            offer_days = '".$_POST['offer_expire_edit']."', 
            address = '".$_POST['offer_address_edit']."', 
            referral_incentive = '".$_POST['offer_incentive_edit']."', 
            redeem_pin = '".$_POST['offer_pin_edit']."', 
            offer_image = '".$image_name."'
            WHERE id = '".$_POST['review_id']."'
          ";
          // echo $query;
          mysqli_query($conn, $query);
        }
        
        $results = mysqli_query($conn, "SELECT * FROM review WHERE review.user_id = $id AND review.isDELETE = 0");

        $results_review_site = mysqli_query($conn, "SELECT * FROM user_settings WHERE user_settings.user_id = $id");
        $data_review_site = mysqli_fetch_assoc($results_review_site);

        ?>

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Offer/Referral</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./offer_referral">                                       <i data-feather="archive"></i></a></li>
                    <li class="breadcrumb-item">Offer/Referral</li>
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
                            <a href="#" target="_blank" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#addoffer"><i class="icofont icofont-ui-add"></i> Add Offer</a>
                        </div><br>
                        
                      </div>
                      <hr>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="review-table">
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Offer Code</th> 
                                <th>Offer Validity</th>
                                <th>Redeem Pin</th>
                                <th>Referral Incentive</th>
                                <th>Offer Details</th>
                                <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;
                            while($data = mysqli_fetch_array($results)) {
                            ?>
                          <tr>
                            <td><?=$i++;?></td>
                            <td><?=$data['id'];?></td>
                            <td><?=$data['offer_days'];?></td>

                            <td><?=$data['redeem_pin'];?></td>
                            <td><?=$data['referral_incentive'];?></td>
                            <td><?=$data['offer_insentive'];?></td>
                            <td class="text-center">
                            <a href="javascript:;" onclick="delete_offer(<?php echo $data['id']; ?>)" class="btn btn-danger"> <i class="icofont icofont-ui-delete"></i> </a>
                            <a href="javascript:;" onclick="edit_offer(<?php echo $data['id']; ?>)" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#editoffer"> <i class="icofont icofont-ui-edit"></i> </a>
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

          <div class="modal fade" id="addoffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Offer</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="" method="post" enctype="multipart/form-data" name="form1">
                <div class="modal-body">
                  <div class="card-body">
                      <div class="form-group clearfix">
                        <div class="col-md-12">
                            <label>Enter Offer Details</label>
                            <textarea id="offer_details" name="offer_details" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label>Offer Expiration Days</label>
                            <input type="number" id="offer_expire" name="offer_expire" class="form-control" value="" required></input>
                        </div>
                        <div class="col-md-12">
                            <label>Enter Address and Phone Number</label>
                            <input type="text" id="offer_address" name="offer_address" class="form-control" value="" required></input>
                        </div>
                        <div class="col-md-12">
                            <label>Enter Referral Incentive</label>
                            <input type="text" id="offer_incentive" name="offer_incentive" class="form-control" value="" required></input>
                        </div>
                        <div class="col-md-12">
                            <label>Enter Offfer Redeem Pin</label>
                            <input type="number" id="offer_pin" name="offer_pin" class="form-control" value="" required></input>
                        </div>
                        <div class="col-md-12">
                            <label>Choose Offer Image</label>
                            <input type="file" id="offer_image" name="offer_image" class="form-control" accept="image/*" required></input>
                        </div>
                      </div><br>   
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-secondary">Add Now</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="editoffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Offer</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="" method="post" enctype="multipart/form-data" name="form1">
                <div class="modal-body" id="edit_offer">
                  
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="edit_submit" class="btn btn-secondary">Edit Now</button>
                </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <script>
          function delete_offer(id){
            if (confirm('Are you sure?')) {
              $.ajax({
                url: 'action.php',
                type: 'POST',
                async: false,
                data:{
                    id:id,
                    delete_offer: 1,
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

          function edit_offer(id){
            $.ajax({
              url: 'action.php',
              type: 'POST',
              async: false,
              data:{
                  id:id,
                  edit_offer: 1,
              },
                  success: function(response){
                    document.getElementById('edit_offer').innerHTML = response;
                    // $('#edit_offer').innerHTML = response;
                  }
              });
          }
        </script>
        <?php include('./template/footer.php'); ?>

        <?php 
        $sidebar_active = 'thank_you';
        include('./template/header.php'); ?>

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Thank You</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./settings">                                       <i data-feather="thumbs-up"></i></a></li>
                    <li class="breadcrumb-item">Thank You</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">


          <div class="col-xl-12 xl-100 col-lg-12 box-col-12">
              <div class="card">
                  <div class="card-header">
                    <h5 class="pull-left">Manage Thank You</h5>
                  </div>
                  <div class="card-body">
                    <div class="tabbed-card">
                      <ul class="pull-right nav nav-pills nav-primary" id="pills-clrtabinfo" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabinfo" data-bs-toggle="pill" href="#pills-clrhomeinfo" role="tab" aria-controls="pills-clrhome" aria-selected="true">Thank You Email</a></li>
                        <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabinfo" data-bs-toggle="pill" href="#pills-clrprofileinfo" role="tab" aria-controls="pills-clrprofile" aria-selected="false">Thank You SMS</a></li>
                      </ul>
                      <div class="tab-content" id="pills-clrtabContentinfo">
                        <div class="tab-pane fade show active" id="pills-clrhomeinfo" role="tabpanel" aria-labelledby="pills-clrhome-tabinfo">
                            <button id="prev_email" class="btn btn-success pull-right" type="button" onclick="preview_html()" style=""><i class="fa fa-external-link"></i>  Preview Email</button>
                            <button id="prev_email" class="btn btn-primary" align="center" type="button" onclick="preview_html()" style=""><i class="fa fa-save"></i>  Save Changes</button>
                            <br>
                            <br>
                            <div class="row">
                              <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Subject</label>
                                    <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputPassword1">Select Follow-Up Template</label><br>
                                    <button id="prev_email" class="btn btn-primary" type="button"><i class="fa fa-envelope-o"></i>Choose Template</button>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="thank_you_email_body">Email Color</label>
                                    <input type="color" class="form-control border_s" id="thank_you_email_color" name="thank_you_email_color" value="" colorpick-eyedropper-active="true">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="thank_you_email_body">Button Color</label>
                                    <input type="color" class="form-control border_s" id="thank_you_email_color" name="thank_you_email_color" value="" colorpick-eyedropper-active="true">
                                </div>
                                
                              </div>
                              <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="control-label" for="thank_you_email_body">Email Body</label><br>
                                    <textarea id="editor1" name="editor1" cols="20" rows="10">

                                    </textarea>
                                </div>
                              </div>
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane fade" id="pills-clrprofileinfo" role="tabpanel" aria-labelledby="pills-clrprofile-tabinfo">
                        <button id="prev_email" class="btn btn-primary" align="center" type="button" onclick="preview_html()" style=""><i class="fa fa-save"></i>  Save Changes</button><br><br>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">SMS Body</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="">
                            </div>
                            <div class="alert alert-primary">
                            <h3><i class="fa fa-exclamation-circle"></i> Use These Merge Tags In Your SMS Body</h3>
                            
                                <p><strong>Customer Name: </strong>&nbsp;&nbsp;%name%</p>
                                <p><strong>Follow Up Link: </strong>&nbsp;&nbsp;%survey_link%</p>
                                <p><strong>Business Name: </strong>&nbsp;&nbsp;%business_name%</p>
                                <p>Note: These merge tags will be automatically replaced with their described identity.</p>
                                <p>e.g: %name% will be replaced with the name of the customer name when sms will be sent to a customer.</p>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          </div>
          <!-- Container-fluid Ends-->
        </div>
        <?php include('./template/footer.php'); ?>
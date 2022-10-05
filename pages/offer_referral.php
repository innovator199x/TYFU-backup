
        <?php 
        $sidebar_active = 'offer_referral';
        include('./template/header.php'); ?>

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
                            </div><br>
                            <div class="card">
                                <div class="card-header bg-primary">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon1" aria-expanded="false"><i class="icofont icofont-ui-add"></i>Add/Edit Offer</button>
                                </h5>
                                </div>
                                <div class="collapse" id="collapseicon1" aria-labelledby="headingeight" data-bs-parent="#accordionoc">
                                    <div class="card-body">
                                    <div class="panel panel-body">
                        <!--<div class="panel panel-body" style="display: none;" id="add_offer_list">-->
                        	<form method="post" id="reg-form" enctype="multipart/form-data" onsubmit="return check_form();">
                            	       
								
								 
		                              <!--<div class="form-group">
                                      <label class="control-label">Enter Offer Text</label>
                                        <input type="text" name='question' id="question" placeholder='Enter Offer Text' class="form-control" />
                                      </div>-->
                                       <div class="form-group">
                                          <label class="control-label">Enter Offer Details <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-question-circle" data-original-title="Add the offer/reward/coupon you want to give to your customers. Providing a good offer/reward/coupon will attract more customers to come back. EX. %15 off or Free X or bring a friend, and both of you will receive X% off."></i></label>
                                          <textarea name="question1" id="question1" placeholder="Enter Offer Details" class="form-control border_s"></textarea>
                                      </div>
                                      
                                      
                        			 <div class="form-group">
                                      <label class="control-label">Offer Expiration Days <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-question-circle" data-original-title="The point of the offer is to get the customer to come back to the business sooner and make more purchases. That's why all offers should have an expiration date."></i></label>
                                        <input id="my_picker" required="" name="answer1" type="number" placeholder="Enter Number of Days" class="form-control border_s" value="">
                                      </div>
                        
                        
                                      <div class="form-group">
                                        <label class="control-label">Enter Address and Phone Number <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-question-circle" data-original-title="Add here the address and phone number that you would like to appear on the offer page."></i></label>
                                        <textarea name="address" placeholder="Enter Address and Phone Number" class="form-control border_s"></textarea> 
                                      </div>
                                                            
                        		     
                                      
                                       <div class="form-group">
                                        <label class="control-label">Enter Referral Incentive <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-question-circle" data-original-title="Add here the percentage amount for the incentive you would like to give to your customer."></i></label>
                                       <input name="refferal_incentive" placeholder="10% off" class="form-control border_s">
                                       
                                      </div>
                                    
                                        <!--<div class="form-group">
                                        <label class="control-label">Enter Share Incentive</label>
                                       <input name='share_incentive' placeholder='10% off' class="form-control">
                                       <span class="help-block"><strong>Note:</strong> Share Incentive for your customer friend that will be repalced with %share_incentive% tag  in "Incentive Description"</span>
                                      </div>-->
                                    
                                      
                                       <div class="form-group">
                                        <label class="control-label">Enter Offfer Redeem Pin <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-question-circle" data-original-title="Add here the pin code that your cashier can use to redeem an offer. Please note that this code must be shared only to those authorized personnel in your company/business whom your customer can redeem the offer."></i></label>
                                        <input name="redeem_pin" placeholder="Enter Incentive Redeem Pin" class="form-control border_s" required="">
                                      </div>
                                      
                                     
                                     
                       			                           
                        
                       				<div class="form-group clearfix">
           								<label for="file-5">Choose Offer Image</label>
           									<div class="content">
        										<div class="col-md-2">
													<input type="file" name="file-5" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple="">
													<label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></figure> <span>Choose a file…</span></label>
												</div>
                                                <div id="img_offer" class="col-md-2" style="display: none;">
													<img class="img img-responsive">
												</div>
											</div>
									</div>
            
          
																
                     
                        		<input type="hidden" name="user_id" value="99">
                                <input type="hidden" name="offer_id" value="">
                        		<br>
                         	
                       			<!-- <input onclick="change()" type="submit" class="btn btn-primary" value="Save" id="myButton1" /> -->

                    			<span id="addr1"></span>

           	 					<center><button type="submit" style="width: 170px;" id="save_form1" name="question_submit" class="btn btn-info"> Add/Edit Offer </button></center>
           
                           </form>
                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            <hr>
                            <div class="panel panel-body">
                                    <div class="table-responsive">
                            <div id="tab_logic_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="tab_logic_length" class="dataTables_length"><label></div></div><div class="col-xs-6"><div class="dataTables_filter" id="tab_logic_filter"><label></label></div></div></div><table class="table dataTable" id="tab_logic" aria-describedby="tab_logic_info">
                            <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="tab_logic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending" style="width: 51px;">No.</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="tab_logic" rowspan="1" colspan="1" aria-label="Offer Code: activate to sort column ascending" style="width: 120px;">Offer Code</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="tab_logic" rowspan="1" colspan="1" aria-label="Offer Validity: activate to sort column ascending" style="width: 143px;">Offer Validity</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="tab_logic" rowspan="1" colspan="1" aria-label="Redeem Pin: activate to sort column ascending" style="width: 130px;">Redeem Pin</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="tab_logic" rowspan="1" colspan="1" aria-label="Referral Incentive: activate to sort column ascending" style="width: 185px;">Referral Incentive</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="tab_logic" rowspan="1" colspan="1" aria-label="Offer Details: activate to sort column ascending" style="width: 138px;">Offer Details</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="tab_logic" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 128px;">Action</th></tr>
                                        </thead>
                        
                            <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                                <td class="  sorting_1">1</td>
                                <td class=" ">69</td>
                                <!--<td></td>-->
                                
                                <td class=" ">1000 days</td>
                                <td class=" ">123</td>
                                <td class=" ">10</td>
                                <!--<td></td>-->
                                <td class=" ">Test offer</td>
                                <td class=" "> 
                                    <!--<a href="?id=69"  class="btn btn-danger" > <i class="icm icm-remove8"></i> </a>-->
                                    <a href="javascript:;" onclick="delete_confirmation(69)" class="btn btn-danger"> <i class="icm icm-remove8"></i> </a>
                                    <a href="javascript:;" onclick="edit_offer(69)" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                </td>
                            </tr></tbody></table><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"></li></ul></div></div></div></div>
                            </div>  
                            </div>
                        </div>
                  </div>
                </div>


          </div>
          <!-- Container-fluid Ends-->
        </div>
        <?php include('./template/footer.php'); ?>
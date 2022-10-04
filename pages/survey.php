
        <?php 
        $sidebar_active = 'survey';
        include('./template/header.php'); ?>

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Survey</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./list">                                       <i data-feather="settings"></i></a></li>
                    <li class="breadcrumb-item">Survey</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                <button id="prev_email" class="btn btn-success pull-left" type="button" onclick="preview_html()" style="" data-bs-original-title="" title="" data-original-title="btn btn-success pull-left"><i class="fa fa-external-link"></i>  Preview</button>
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">

                    <div class="card" id="default">
                    <div class="card-header">
                        <h5>Add Survey Question For Customer</h5>
                        <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                        </ul>
                        </div>
                    </div>
                    <div class="card-body btn-showcase">
                    <div class="panel panel-body">
                                    <form method="post" id="reg-form">
                              
                                

                                            <input type="text" name="question" value="" id="question" placeholder="Enter Your Question" class="form-control"><br>
                                            
                                             
                                                <label class="checkbox-inline no-padding">
                                                    <input type="radio" name="question_type" id="question_multiple" checked="" value="multiple" class="question_type "> Multiple Choice Answers 
                                                    <input type="radio" name="question_type" id="question_written" value="written" class="question_type "> Written Answer
                                                </label>
                                            
                                            
                                            <br><br>
                                            
                                          <div class="multiple_answer_div">
                                            <input type="text" value="" name="answer1" id="ans1" placeholder="Answer 1 " class="form-control">
                                            <br>
                                            <input type="text" value="" name="answer2" id="ans2" placeholder="Answer 2 " class="form-control">
                                            <br>
                                            <input type="text" value="" name="answer3" id="ans3" placeholder="Answer 3 Optional" class="form-control">
                                            <br>
                                            <input type="text" value="" name="answer4" id="ans4" placeholder="Answer 4 Optional" class="form-control">
                                            <br>
                                            <input type="text" value="" name="answer5" id="ans5" placeholder="Answer 5 Optional" class="form-control">
                                            <input type="hidden" name="user_id" value="">
                                            <input type="hidden" name="status" value="1">
                                            
                                            
                                            <br>
                                          </div>  
                                          
                                            
                                            
                                            
                                                            <!-- <input onclick="change()" type="submit" class="btn btn-success" value="Save" id="myButton1" /> -->

                                        <span id="addr1"></span>

                                        <center><button type="submit" id="save_form1" name="question_submit" class="btn btn-info"> Add A New Review Question - Survey Tab </button></center>

                                    </form>
                                </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="card" id="default">
                    <div class="card-header">
                        <h5>Questions List</h5>
                        <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                        </ul>
                        </div>
                    </div>
                    <div class="card-body btn-showcase">
                    <div class="panel-group accordion accordion3 ui-sortable" id="accordion3">
                        <div class=" panel panel-info" style="">
                        </div>                    
                       
                       
                             
                                <!--<div class="col-md-12 ">--->
                                 
                                
                                                            
                                    <div class=" panel panel-default item-sort" style="margin-top: 5px;" id="207">
                                            <div class="panel panel-heading handle">
                                                <h4 class="panel-title" style="width: 70%">
                                                   
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_1" aria-expanded="false"> <b>Question: </b> How was our service? </a>
                                                </h4>
                                                <div class="test">
                                                    
                                                <div class="btn btn-success pull-right" style="margin-top: -25px;"><i class="icm icm-move"></i></div>
                                                
                                                <div class="pull-right" style="margin-top: -27px;">
                                                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 122px;"><div class="bootstrap-switch-container" style="width: 180px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 60px;">Show</span><span class="bootstrap-switch-label" style="width: 60px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 60px;">Hide</span><input checked="" data-on-text="Show" data-on-color="success" data-off-text="Hide" value="207" class="switch-size" type="checkbox"></div></div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                            <div id="collapse_1" class="panel-collapse page_row_parent collapse" aria-expanded="false" style="height: 0px;"> 
                                            <div class="panel panel-body">
                                           
                                                                                            <ul style="list-style: none;">
                                                        <li><i class="fa fa-hand-o-right"></i>Ans1: &nbsp;Good</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans2: &nbsp;Bad</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans3: &nbsp;-</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans4: &nbsp;-</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans5: &nbsp;-</li>                                          
                                                      </ul>
                                                   
                                                
                                                
                                                 
                                                
                                            </div>
                                            <div class="panel panel-footer">
                                                <center><a href="javascript:;" class="btn btn-danger" onclick="del_question(207,this)"><i class="icm icm-remove2"></i></a></center>
                                            </div>
                                            </div>
                                        </div>
                                        
                                       <!--</div> -->
                                        
                                    
                                         
                                <!--<div class="col-md-12 ">--->
                                 
                                
                                                            
                                    <div class=" panel panel-default item-sort" style="margin-top: 5px;" id="206">
                                            <div class="panel panel-heading handle">
                                                <h4 class="panel-title" style="width: 70%">
                                                   
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_2" aria-expanded="false"> <b>Question: </b> How old are you? </a>
                                                </h4>
                                                <div class="test">
                                                    
                                                <div class="btn btn-success pull-right" style="margin-top: -25px;"><i class="icm icm-move"></i></div>
                                                
                                                <div class="pull-right" style="margin-top: -27px;">
                                                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 122px;"><div class="bootstrap-switch-container" style="width: 180px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 60px;">Show</span><span class="bootstrap-switch-label" style="width: 60px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 60px;">Hide</span><input checked="" data-on-text="Show" data-on-color="success" data-off-text="Hide" value="206" class="switch-size" type="checkbox"></div></div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                            <div id="collapse_2" class="panel-collapse page_row_parent collapse" aria-expanded="false" style="height: 0px;"> 
                                            <div class="panel panel-body">
                                           
                                                                                            <ul style="list-style: none;">
                                                        <li><i class="fa fa-hand-o-right"></i>Ans1: &nbsp;18-20</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans2: &nbsp;21-25</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans3: &nbsp;26-30</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans4: &nbsp;-</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans5: &nbsp;-</li>                                          
                                                      </ul>
                                                   
                                                
                                                
                                                 
                                                
                                            </div>
                                            <div class="panel panel-footer">
                                                <center><a href="javascript:;" class="btn btn-danger" onclick="del_question(206,this)"><i class="icm icm-remove2"></i></a></center>
                                            </div>
                                            </div>
                                        </div>
                                        
                                       <!--</div> -->
                                        
                                    
                                         
                                <!--<div class="col-md-12 ">--->
                                 
                                
                                                            
                                    <div class=" panel panel-default item-sort" style="margin-top: 5px;" id="204">
                                            <div class="panel panel-heading handle">
                                                <h4 class="panel-title" style="width: 70%">
                                                   
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3" aria-expanded="false"> <b>Question: </b> How did you find us? </a>
                                                </h4>
                                                <div class="test">
                                                    
                                                <div class="btn btn-success pull-right" style="margin-top: -25px;"><i class="icm icm-move"></i></div>
                                                
                                                <div class="pull-right" style="margin-top: -27px;">
                                                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 122px;"><div class="bootstrap-switch-container" style="width: 180px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 60px;">Show</span><span class="bootstrap-switch-label" style="width: 60px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 60px;">Hide</span><input checked="" data-on-text="Show" data-on-color="success" data-off-text="Hide" value="204" class="switch-size" type="checkbox"></div></div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                            <div id="collapse_3" class="panel-collapse page_row_parent collapse" aria-expanded="false" style="height: 0px;"> 
                                            <div class="panel panel-body">
                                           
                                                                                            <ul style="list-style: none;">
                                                        <li><i class="fa fa-hand-o-right"></i>Ans1: &nbsp;Friend</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans2: &nbsp;Social Media</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans3: &nbsp;Online Review Site</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans4: &nbsp;Walk/Drive by</li>
                                                        <li><i class="fa fa-hand-o-right"></i>Ans5: &nbsp;Other</li>                                          
                                                      </ul>
                                                   
                                                
                                                
                                                 
                                                
                                            </div>
                                            <div class="panel panel-footer">
                                                <center><a href="javascript:;" class="btn btn-danger" onclick="del_question(204,this)"><i class="icm icm-remove2"></i></a></center>
                                            </div>
                                            </div>
                                        </div>
                                        
                                       <!--</div> -->
                                        
                                    
                                         
                                <!--<div class="col-md-12 ">--->
                                 
                                
                                                            
                                    <div class=" panel panel-default item-sort" style="margin-top: 5px;" id="208">
                                            <div class="panel panel-heading handle">
                                                <h4 class="panel-title" style="width: 70%">
                                                   
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_4" aria-expanded="false"> <b>Question: </b> Please right your experience shortly. </a>
                                                </h4>
                                                <div class="test">
                                                    
                                                <div class="btn btn-success pull-right" style="margin-top: -25px;"><i class="icm icm-move"></i></div>
                                                
                                                <div class="pull-right" style="margin-top: -27px;">
                                                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 122px;"><div class="bootstrap-switch-container" style="width: 180px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 60px;">Show</span><span class="bootstrap-switch-label" style="width: 60px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 60px;">Hide</span><input checked="" data-on-text="Show" data-on-color="success" data-off-text="Hide" value="208" class="switch-size" type="checkbox"></div></div>
                                                </div>
                                                </div>
                                                
                                            </div>
                                            <div id="collapse_4" class="panel-collapse page_row_parent collapse" aria-expanded="false" style="height: 0px;"> 
                                            <div class="panel panel-body">
                                           
                                                                                                   <div class="text-center">
                                                    
                                                            <h6>Written Answer</h6>
                                                    
                                                       </div>
                                                 
                                                
                                            </div>
                                            <div class="panel panel-footer">
                                                <center><a href="javascript:;" class="btn btn-danger" onclick="del_question(208,this)"><i class="icm icm-remove2"></i></a></center>
                                            </div>
                                            </div>
                                        </div>
                                        
                                       <!--</div> -->
                                        
                                    
                                                                            </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="card" id="default">
                    <div class="card-header">
                        <h5>Add UpSell Question</h5>
                        <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                        </ul>
                        </div>
                    </div>
                    <div class="card-body btn-showcase">
                    <div class="panel panel-body">
                                    <form method="post" id="reg-form2">
                                     <input type="hidden" name="status" value="0">
                                        <div class="row">
                                          <div class="pull-right">
                                            <!-- <div class="bootstrap-switch-off bootstrap-switch-id-upsell bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 122px;"><div class="bootstrap-switch-container" style="width: 180px; margin-left: -60px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 60px;">Show</span><span class="bootstrap-switch-label" style="width: 60px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 60px;">Hide</span><input data-on-text="Show" data-on-color="success" data-off-text="Hide" id="upsell" value="" class="switch-size" type="checkbox"></div></div> -->
                                          
                                          </div>
                                          <br>
                                          <div class="col-md-9">
                                        
                                           
                                                
                                          
                                               <div class="form-group">
                                                
                                                   <label>UpSell Question <i data-toggle="tooltip" data-placement="top" title="" class="fa fa-question-circle" data-original-title="Upselling Is Easier Than Selling to New Customers, and It Helps You Grow"></i></label>
                                                   <textarea rows="4" class="form-control border_s" name="question" id="question1"> To show our appreciation for your recent visit, we would like to offer you a one-time X deal on the following services. If interested, click on one of the services and we will be in touch shortly.    </textarea>  <br>
                                                
                                                    
                                                </div>
                                          </div>
                                         
                                        </div>
                                             
                                             <input type="hidden" name="question_type" id="question_type" value="upsell">
                                             
                                               <div>
                                               
                                                <p><mark style="background-color: green;">Create Extra Services Check List</mark></p>
                                               </div>
                                            
                                            <br>
                                           
                                           
                                              	     
                                               <div class="input_fields_wrap row">
                                              
                                                      	                                                        
                                                        
                                                          <div class="form-group clearfix">  
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <input class="form-control" placeholder="Enter Service" type="text" name="answer1" value=""> 
                                                                </div>                                                   
                                                                <div class="col-md-3">
                                                                <button type="button" class="add_field_button btn btn-success"><i class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
              
                                                          </div>
                                                
                                                        
                                                        
                                                                                                      
                                              
                                                         
                                             
                                                 
                                                 </div>
                                               
                                           <br>
                                        
                                        <center><button type="submit" id="save_form1" name="question_submit2" class="btn btn-info"> Add UpSell Question</button></center>

                                    </form>
                                </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="alert alert-success">
                        <h3><i class="fa fa-exclamation-circle"></i> Important Notice:</h3>                                                    
                        <p><i class="fa fa-hand-o-right"></i> &nbsp;You can add as many questions as you want in the system but it will only display 10 questions on the survey page which has 'show' on the status.</p>
                        <p><i class="fa fa-hand-o-right"></i> &nbsp;You can change the status of the question using the switch button.</p>
                        <p><i class="fa fa-hand-o-right"></i> &nbsp;You can manage the order of the questions on the survey page by dragging it up and down.</p> 
                    </div>
                </div>
            </div>


          </div>
          <!-- Container-fluid Ends-->
        </div>
        <?php include('./template/footer.php'); ?>
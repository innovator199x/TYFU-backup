
        <?php 
        $sidebar_active = 'survey';
        include('./template/header.php');
        $results = mysqli_query($conn, "SELECT * FROM questions WHERE questions.isDelete = 0 AND questions.user_id = $id AND questions.question_type!='upsell'");
        ?>

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
                <div class="col-sm-12 col-xl-6">
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
                                <input type="text" name="question" value="" id="question" placeholder="Enter Your Question" class="form-control"><br>
                                    <label class="checkbox-inline no-padding">
                                        <input type="radio" name="question_type" onchange="question_type1()" id="question_multiple" checked="" value="multiple" class="question_type"> Multiple Choice Answers 
                                        <input type="radio" name="question_type" onchange="question_type2()" id="question_written" value="written" class="question_type "> Written Answer
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
                                    <input type="hidden" name="status" id="status" value="1">
                                    <br>
                                </div>  
                                <span id="addr1"></span>
                                <center><button type="button" id="save_form1" name="question_submit" onclick="add_new_review()" class="btn btn-info"> Add A New Review Question - Survey Tab </button></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                    <div class="card-header">
                        <h5>Questions List</h5><span>Green - Show | Red - Hidden</span>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-spin fa-cog"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="default-according" id="accordionclose">
                            <?php 
                            $i = 1;
                            $a = 1;
                            while($data = mysqli_fetch_array($results)) {
                            ?>
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    <h5 class="mb-0">
                                        <button style="background-color:<?php echo ($data['status'] == 1)? 'rgb(81 187 37 / 80%);':'#dc3545;'; ?>" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i++; ?>" aria-expanded="true" aria-controls="heading1"><?=$data['question']?></button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapse<?php echo $a++; ?>" aria-labelledby="heading1" data-bs-parent="#accordionclose">
                                <div class="card-body">
                                    <?php if($data['question_type'] == 'written'){ ?>
                                        <div class="text-center">     
                                            <h6>Written Answer</h6>
                                        </div>
                                    <?php } else { ?>
                                    <ul style="list-style: none;">
                                        <li><i class="fa fa-hand-o-right"></i>Ans1:</b> &nbsp;<?php echo ($data['ans1']=='')?'-':$data['ans1']; ?></li>
                                        <li><i class="fa fa-hand-o-right"></i>Ans2:</b> &nbsp;<?php echo ($data['ans2']=='')?'-':$data['ans2']; ?></li>
                                        <li><i class="fa fa-hand-o-right"></i>Ans3:</b> &nbsp;<?php echo ($data['ans3']=='')?'-':$data['ans3']; ?></li>
                                        <li><i class="fa fa-hand-o-right"></i>Ans4:</b> &nbsp;<?php echo ($data['ans4']=='')?'-':$data['ans4'];; ?></li>
                                        <li><i class="fa fa-hand-o-right"></i>Ans5:</b> &nbsp;<?php echo ($data['ans5']=='')?'-':$data['ans5']; ?></li>                                          
                                    </ul>
                                    <?php } ?>
                                    <br>
                                    <ul style="list-style: none;">
                                        <li><i class="fa fa-eye"></i>Hide:</b> &nbsp;
                                        <input type="checkbox" onchange="update_survey_status(<?php echo $data['id']; ?>,<?php echo $data['status']; ?>)" <?php echo ($data['status'] == 1)? '':'checked'; ?>/>
                                        </li>                                        
                                    </ul>
                                    <div class="text-center">
                                        <a href="javascript:;" onclick="delete_survey(<?php echo $data['id']; ?>)" class="btn btn-danger"> <i class="icofont icofont-ui-delete"></i> </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-6">

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
                                        
                                        <!-- <center><button type="submit" id="save_form1" name="question_submit2" class="btn btn-info"> Add UpSell Question</button></center> -->

                                    </form>
                                </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
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
        <script>
        function question_type1() {
            $(".multiple_answer_div").show(1000);
        }

        function question_type2() {
            $(".multiple_answer_div").hide(1000);
        }
        
        function add_new_review() {

            if($('input[name="question_type"]:checked').val()=='multiple')
            {
                if($("#question").val()==""){
                    
                    swal(
                        "Alert!", "Please Enter Your Question", "error"           
                    );
                    
                        $("#question").focus();
        
                        return false;
        
                    } 
                    if($("#ans1").val()==""){
                    
                    swal(
                        "Alert!", "Please Enter Answer 1", "error"           
                    );
                    
                        $("#ans1").focus();
        
                        return false;
        
                    } 
                    if($("#ans2").val()==""){
                    
                    swal(
                        "Alert!", "Please Enter Answer 2", "error"           
                    );
                    
                        $("#ans2").focus();
        
                        return false;
        
                    } 
            }else
            {
                if($("#question").val()==""){
                    
                    swal(
                        "Alert!", "Please Enter Your Question", "error"           
                    );
                    
                        $("#question").focus();
        
                        return false;
        
                    } 
            }
        question = $("#question").val();
        question_type = $('input[name="question_type"]:checked').val();
        
        ans1 = $("#ans1").val();
        ans2 = $("#ans2").val();
        ans3 = $("#ans3").val();
        ans4 = $("#ans4").val();
        ans5 = $("#ans5").val();
        status = $("#status").val();
            $.ajax({
              url: 'action.php',
              type: 'POST',
              async: false,
              data:{
                question: question,
                question_type: question_type,
                ans1: ans1,
                ans2: ans2,
                ans3: ans3,
                ans4: ans4,
                ans5: ans5,
                status: status,
                add_new_review: 1,
              },
                  success: function(response){
                    // alert(response);
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

        function delete_survey(id){
            if (confirm("Are you sure?")) {
            $.ajax({
              url: 'action.php',
              type: 'POST',
              async: false,
              data:{
                id: id,
                delete_survey: 1,
              },
                  success: function(response){
                    if (response == 1) {
                      swal("Success!", "Successfully deleted.", "success");
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

        function update_survey_status(sid, status){
            $.ajax({
              url: 'action.php',
              type: 'POST',
              async: false,
              data:{
                sid: sid,
                status: status,
                update_survey_status: 1,
              },
                  success: function(response){
                    if (response == 1) {
                      swal("Success!", "Successfully Updated.", "success");
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
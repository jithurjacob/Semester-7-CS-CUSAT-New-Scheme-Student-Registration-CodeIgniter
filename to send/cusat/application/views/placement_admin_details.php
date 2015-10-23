<div class="middle">
    <div class="container">
<?php $this->load->helper('inflector'); ?>
        <div class="row about">
            <div class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>Unverified exam Details</h2>
                    <br />
                    <br />
                    
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Student</th>
                                <th>Company</th>
                                <th>Details</th>
                                <th>Verify</th>
                                <th>Reject</th>
                            </thead>
                            <?php foreach ($exam_details as $exam): ?>
                            <tr id="<?php     echo 'data'.$exam['id']; ?>">
                                <td>
                                    <?php    echo humanize($exam['name']); ?>
                                </td>
                                <td>
                                    <?php     echo $exam['company']; ?>
                                </td>
                                <td>
                                    <?php     echo $exam['details']; ?>
                                </td>
                               
                                
                                <td><a onclick="accept('exam','<?php     echo  $this->encrypt->encode($exam['id']) ; ?>','<?php     echo  $exam['id'] ; ?>');">Verify</a></td>
                                <td><a onclick="reject('exam','<?php     echo  $this->encrypt->encode($exam['id']) ; ?>','<?php     echo  $exam['id'] ; ?>');">Reject</a></td>
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                
                </div>
                <br />
                    <div id="result"></div>
                    <br />
                    <div class="home_steps well text-justify noborder">
                    <h2>Unverified Job Offer Details</h2>
                    <br />
                    <br />
                    
                    <div class="responsive-table">
                        <table id="offer_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Student</th>
                                <th>Company</th>
                                <th>Details</th>
                                <th>Verify</th>
                                <th>Reject</th>
                            </thead>
                            <?php
                            function student_name($value,$student_details)
                            {
                                foreach ($student_details as $student) {
                                    if($value==$student["username"])
                                        return $student["name"];
                                }
                                return $value;
                            }
                            ?>
                            <?php foreach ($offer_details as $offer): ?>
                            <tr id="<?php     echo 'data'.$offer['id']; ?>">
                                <td>
                                    <?php    echo humanize(student_name($offer['students_username'],$student_details)); ?>
                                </td>
                                 <td>
                                    <?php    echo humanize($offer['name']); ?>
                                </td>
                                <td>
                                    <?php     echo $offer['description']; ?>
                                </td>
                               
                                
                                <td><a onclick="accept('offer','<?php echo  $this->encrypt->encode($offer["id"]) ; ?>','<?php echo  $offer["id"];?>');">Verify</a></td>
                                <td><a onclick="reject('offer','<?php echo  $this->encrypt->encode($offer["id"]) ; ?>','<?php echo  $offer["id"];?>');">Reject</a></td>
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                
                </div>

                <br>
                <br>
                <div class="home_steps well text-justify noborder">
                    <h2>Add exam details</h2>
                    <br />
                    <br />
                     <?php $this->load->helper('form'); $this->load->helper('url');
                      echo form_open('/exam/add_exams', array('class' => 'form-register ', 'role' => 'form')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        
                        <tr>
                            <td>
                                <label for="name">Name</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="username" placeholder="Student Name" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="company">Company</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="company" placeholder="Company Name" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="details">Details</label>
                            </td>
                            <td><textarea class="form-control margin_bottom_10" name="details" placeholder="Details"  required></textarea>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="year_pass">Year of Passing</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="year_pass" placeholder="Year of Passing" type="number"  required>
                            </td>

                        </tr>
                         <?php if (isset($exams_form_error_msg)) if ($exams_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($exams_form_success_msg)) if ($exams_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_form_success_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
                                <br>
                            </td>
                        </tr>

                        </table>
                        </div>
                        </form>
                </div>
                <br>
                <div class="home_steps well text-justify noborder">
                    <h2>Job Offer Details</h2>
                    <br />
                    <br />
                    
                    <div class="responsive-table">
                        <table id="offer_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Student</th>
                                <th>Company</th>
                                <th>Details</th>
                                
                            </thead>
                            
                            <?php foreach ($verified_offer_details as $offer): ?>
                            <tr id="<?php     echo 'data'.$offer['id']; ?>">
                                <td>
                                    <?php    echo humanize(student_name($offer['students_username'],$student_details)); ?>
                                </td>
                                 <td>
                                    <?php    echo humanize($offer['name']); ?>
                                </td>
                                <td>
                                    <?php     echo $offer['description']; ?>
                                </td>
                               
                                
                                
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                
                </div>
                <br>

                <br>
                <div class="home_steps well text-justify noborder">
                    <h2>exam Details</h2>
                    <br />
                    <br />
                    
                    <div class="responsive-table">
                        <table id="offer_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Student</th>
                                <th>Company</th>
                                <th>Year of Passing</th>
                                <th>Details</th>
                                
                            </thead>
                            <?php
                          // var_dump($verified_exam_details);
                            ?>
                            <?php foreach ($verified_exam_details as $offer): ?>
                            <tr id="<?php     echo 'data'.$offer['id']; ?>">
                                <td>
                                    <?php    echo humanize(student_name($offer['username'],$student_details)); ?>
                                </td>
                                 <td>
                                    <?php    echo humanize($offer['company']); ?>
                                </td>
                                <td>
                                    <?php    echo humanize($offer['year_pass']); ?>
                                </td>
                                <td>
                                    <?php     echo $offer['details']; ?>
                                </td>
                               
                                
                                
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                
                </div>
                <br>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
var ok='<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Validated Successfully</div>';
var fail='<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Validation failed    </div>';


      function accept(type,id_,id){
        
    var url='<?php echo base_url(); ?>index.php/exam/validate_exam_ajax';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','valid':'1','type':type,'id':id_},
  type:'POST',
  url:url,
  success: function(result){
    if(result=="ok"){
        $('#data'+id).remove();
        $('#result').html(ok);
    }
    else{
    $('#result').html(fail);
    }
    },error: function(result){
      $('#result').html(result);
      
    }
  });
}
function reject(type,id_,id){
    
    var url='<?php echo base_url(); ?>index.php/exam/validate_exam_ajax';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','valid':'-1','type':type,'id':id_},
  type:'POST',
  url:url,
  success: function(result){
    if(result=="ok"){
        $('#data'+id).remove();
        $('#result').html(ok);
    }
    else{
    $('#result').html(fail);
    }
    },error: function(result){
      $('#result').html(result);
      
    }
  });
}
  
</script>

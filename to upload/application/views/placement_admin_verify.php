<div class="middle">
    <div class="container">
<?php $this->load->helper('inflector'); ?>
        <div class="row about">
            <div class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>Unverified Accounts</h2>
                    <br />
                    <br />
                    <h3 class="">Companies</h3>
                    <br />
                    <br />
                    <div class="responsive-table">
                        <table id="company_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Mobile Number</th>
                                <th>Verify</th>
                                <th>Reject</th>
                            </thead>
                            <?php foreach ($company_newreg as $company): ?>
                            <tr id="<?php  $enc_usr=$this->encrypt->encode($company["username"]);   echo 'company'.$company['company_id']; ?>">
                                <td>
                                    <?php    echo $company['username']; ?>
                                </td>
                                <td>
                                    <?php     echo humanize($company['name']); ?>
                                </td>
                                <td>
                                    <?php     echo $company['email']; ?>
                                </td>
                                <td>
                                    <?php     echo $company['website']; ?>
                                </td>
                                <td>
                                    <?php     echo $company['mobno']; ?>
                                </td>
                                
                                <td><a onclick="accept('<?php     echo  $enc_usr?>','company',<?php echo 'company'.$company['company_id']; ?>);">Verify</a></td>
                                <td><a onclick="reject('<?php     echo $enc_usr ?>','company',<?php echo 'company'.$company['company_id']; ?>);">Reject</a></td>
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <br />
                    <div id="result"></div>
                    <br />
                    <h3 class="">Students</h3>
                    <br />
                    <br />
                    <div class="responsive-table">
                        <table id="students_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Email</th>
                                <th>Admnission Number</th>
                                <th>Register Number</th>
                                <th>Year of Passing</th>
                                <th>Verify</th>
                                <th>Reject</th>
                            </thead>
                            <?php
                            function branch_name($branch,$branch_details)
                            {
                                
                                  foreach( $branch_details as $branch_){
                                   if($branch==$branch_['id']){ 
                                      
                                        return $branch_['name'];
                           
                                         } }

                            }
                            ?>
                            <?php foreach ($students_newreg as $student): ?>
                            <tr id="<?php   $enc_usr= $this->encrypt->encode($student["username"]); echo 'students'.$student['student_id']; ?>">
                                <td>
                                    <?php   echo $student['username']; ?>
                                </td>
                                <td>
                                    <?php     echo humanize($student['name']); ?>
                                </td>
                                <td>
                                    <?php    echo branch_name($student['branch'],$branch_details); ?>
                                </td>
                                <td>
                                    <?php    echo $student['email']; ?>
                                </td>
                                <td>
                                    <?php    echo $student['admnno']; ?>
                                </td>
                                <td>
                                    <?php    echo $student['regno']; ?>
                                </td>
                                <td>
                                    <?php    echo $student['year_pass']; ?>
                                </td>
                                <td><a onclick="accept('<?php     echo  $enc_usr?>','student',<?php echo 'students'.$student['student_id']; ?>);">Verify</a></td>
                                <td><a onclick="reject('<?php     echo $enc_usr ?>','student',<?php echo 'students'.$student['student_id']; ?>);">Reject</a></td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>




</div>

<script type="text/javascript">
var ok='<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>User Validated Successfully</div>';
var fail='<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>User Validation failed    </div>';


      function accept(userid,type,id){
        
    var url='<?php echo base_url(); ?>index.php/exam/validate_reg_ajax/a';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','type':type,'userid':userid},
  type:'POST',
  url:url,
  success: function(result){
    if(result=="ok"){
        $(id).remove();
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
function reject(userid,type,id){
    
    var url='<?php echo base_url(); ?>index.php/exam/validate_reg_ajax/r';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','type':type,'userid':userid},
  type:'POST',
  url:url,
  success: function(result){
    if(result=="ok"){
        $(id).remove();
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

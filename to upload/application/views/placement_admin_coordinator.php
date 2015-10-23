<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12">
 <div class="home_steps well text-justify noborder">
                    <h2>Coordinators List</h2>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="coordinator_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Year</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Revoke Permission</th>
                            </thead>
                            <?php
                            $this->load->helper('inflector');
                             function branch($value='',$branch_details)
                            {  
                               // print_r($branch_details);
                                foreach ( $branch_details as $branch_){
                                    if($branch_['id']==$value)
                                        return $branch_['name'];
                                   }
                            }

                             foreach ($coordinator_list as $coordinator): ?>
                            <tr id="<?php  $enc_usr=$this->encrypt->encode($coordinator["username"]);   echo 'coordinator'.$coordinator['student_id']; ?>">
                                <td>
                                    <?php     echo "<img class='profile_pic_table' src='".base_url()."profile_pics/".$coordinator['pic']." '>"; ?>
                                </td>
                                <td>
                                    <?php     echo humanize($coordinator['name']); ?>
                                </td>
                                <td>
                                    <?php     echo branch($coordinator['branch'],$branch_details); ?>
                                </td>
                                <td>
                                    <?php     echo $coordinator['year_pass']; ?>
                                </td>
                                <td>
                                    <?php     echo $coordinator['mobno']; ?>
                                </td>
                                <td>
                                    <?php     echo $coordinator['email']; ?>
                                </td>
                                <td><a onclick="reject('<?php     echo $enc_usr ?>','coordinator',<?php echo 'coordinator'.$coordinator['student_id']; ?>);">Revoke</a></td>
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>

                    </div>
                    <div id="result_">
                            
                        </div>
                    <div class="home_steps well text-justify noborder">
                    <h2>Add Coordinators</h2>
                    <br>
                    <br>
                    <?php 
                        $this->load->helper('form');
                    echo form_open( '/exam/admin_coordinatorlist', array( 'class'=>'form-register', 'role' => 'form','onsubmit'=>'load_details();return false;')); ?>
                    <div class="responsive-table">
                        <table class="table table-condensed text-left">
                            
                            <tr>
                            <td>
                                <label for="year_pass">Year of passing</label>
                            </td>
                            <td>
                            <select class="form-control margin_bottom_10" name="year_pass" id="year_pass" required>
                                                                 
                                    <?php  print_r($year_details); foreach ( $year_details as $year_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $year_['year_pass'];?>"><?php  echo $year_['year_pass'];?></option>
                                        <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="branch">Branch</label>
                            </td>
                            <td>
                                <select class="form-control margin_bottom_10" name="branch" id="branch" required>
                                                                 
                                    <?php  foreach ( $branch_details as $branch_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $branch_['id'];?>"   ><?php  echo $branch_['name'];?></option>
                                        <?php endforeach ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Show students</button>
                                <br>
                            </td>
                        </tr>
                        </table>
                        </div>
                        </form>
                        <div id="result">
                            
                        </div>
                    </div>
</div>
           
        </div>


    </div>




</div>

<script type="text/javascript">

function load_details () {
  var url='<?php echo base_url(); ?>index.php/exam/student_list_year_branch';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','year_pass':$('#year_pass').val(),'branch':$('#branch').val(),'type':'coordinator'},
  type:'POST',
  url:url,
  success: function(result){
    
        $('#result').html(result);
   
    
    
    },error: function(result){
      $('#result').html(result);
      
    }
  }); 
}


var ok='<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Operation completed Successfully</div>';
var fail='<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>OPeration failed    </div>';

    function accept(userid,type,id){
        
    var url='<?php echo base_url(); ?>index.php/exam/validate_reg_ajax/a';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','type':type,'userid':userid},
  type:'POST',
  url:url,
  success: function(result){
    if(result=="ok"){
        $(id).remove();
        $('#result_').html(ok);
    }
    else{
    $('#result_').html(fail);
    }
    },error: function(result){
      $('#result_').html(result);
      
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
        $('#result_').html(ok);
    }
    else{
    $('#result_').html(fail);
    }
    },error: function(result){
      $('#result_').html(result);
      
    }
  });
}
  
</script>



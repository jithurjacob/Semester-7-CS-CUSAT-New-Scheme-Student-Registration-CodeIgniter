<div class="middle">
    <div class="container">
<?php $this->load->helper('inflector'); ?>
        <div class="row about">
            <div class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>College Details</h2>
                    <br />
                    <br />
                    
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>College</th>
                                <th>Degree</th>
                                <th>Branches</th>
                                
                            </thead>
                            <?php foreach ($college_details as $college): ?>
                            <tr >
                                <td>
                                    <?php    echo humanize($college['name']); ?>
                                </td>
                                <td>
                                 <?php $degid=-1; foreach ($degree_details as $degree): ?>

                                    <?php   if($degree['college_id']==$college['id']) {  echo humanize($degree['degree_name'])."<br>";$degid=$degree['id']; }?>

                                 <?php endforeach ?>
                                </td>
                                <td>
                                <?php  foreach ($branch_details as $branch): ?>
                                    <?php  if($branch['college_course'] == $degid)   echo humanize($branch['branch_name'])."<br>"; ?>
                                       <?php endforeach ?>
                                </td>
                               
                                
                               
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                
                </div>
               
                <br>
                <br>
                <div class="home_steps well text-justify noborder">
                    <h2>Add college details</h2>
                    <br />
                    <br />
                     <?php $this->load->helper('form'); $this->load->helper('url');
                      echo form_open('/exam/add_college', array('class' => 'form-register ', 'role' => 'form')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        
                        <tr>
                            <td>
                                <label for="name">Name</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="name" placeholder="College Name" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="username">Email</label>
                            </td>
                            <td><input type="email" class="form-control margin_bottom_10" name="username" placeholder="Email" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="details">Password</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="password" placeholder="Password"  required>
                            </td>

                        </tr>
                        
                         <?php if (isset($exams_add_clg_form_error_msg)) if ($exams_add_clg_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_add_clg_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($exams_add_clg_form_success_msg)) if ($exams_add_clg_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_add_clg_form_success_msg; ?>
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
                <br>
                <div class="home_steps well text-justify noborder">
                    <h2>Add Degree details</h2>
                    <br />
                    <br />
                     <?php $this->load->helper('form'); $this->load->helper('url');
                      echo form_open('/exam/add_degree', array('class' => 'form-register ', 'role' => 'form')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        
                       
                        <tr>
                            <td>
                                <label for="college">College Name<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <select  class="form-control margin_bottom_10" name="college" id="college" required>
                                    <option class="form-control margin_bottom_10" value="select">Select College</option>
                                    <?php foreach ( $clg_details as $clg_): ?>
                                    <option class="form-control margin_bottom_10" value="<?php  echo $clg_['id'];?>" <?php echo set_value( 'clg')==$clg_[ 'id'] ? 'selected="selected"' : '' ; ?> >
                                        <?php echo $clg_[ 'name'];?>
                                    </option>
                                    <?php endforeach ?>
                                </select>

                            </td>
                        </tr>

                    <tr>
                            <td>
                                <label for="name">Name</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="name" placeholder="Degree Name" required>
                            </td>

                        </tr>
                       
                        
                         <?php if (isset($exams_add_degree_form_error_msg)) if ($exams_add_degree_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_add_degree_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($exams_add_degree_form_success_msg)) if ($exams_add_degree_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_add_degree_form_success_msg; ?>
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
                <br>
                <div class="home_steps well text-justify noborder">
                    <h2>Add Branch details</h2>
                    <br />
                    <br />
                     <?php $this->load->helper('form'); $this->load->helper('url');
                      echo form_open('/exam/add_branch', array('class' => 'form-register ', 'role' => 'form')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        
                       
                        <tr>
                            <td>
                                <label for="college_addbranch">College Name<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <select onchange="javascript:load_degree();" class="form-control margin_bottom_10" name="college_addbranch" id="college_addbranch" required>
                                    <option class="form-control margin_bottom_10" value="select">Select College</option>
                                    <?php foreach ( $clg_details as $clg_): ?>
                                    <option class="form-control margin_bottom_10" value="<?php  echo $clg_['id'];?>" <?php echo set_value( 'clg')==$clg_[ 'id'] ? 'selected="selected"' : '' ; ?> >
                                        <?php echo $clg_[ 'name'];?>
                                    </option>
                                    <?php endforeach ?>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="degree_addbranch">Degree Name<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <select  class="form-control margin_bottom_10" name="degree_addbranch" id="degree_addbranch" required>
                                </select>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label for="branchname">Name</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="branchname" placeholder="Branch Name" required>
                            </td>

                        </tr>
              
                       
                        
                         <?php if (isset($exams_add_branch_form_error_msg)) if ($exams_add_branch_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_add_branch_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($exams_add_branch_form_success_msg)) if ($exams_add_branch_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $exams_add_branch_form_success_msg; ?>
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

 <div class="home_steps well text-justify noborder">
                    <h2>Edit College Details</h2>
                    <br />
                    <br />
                    Here you can easily easily disable/enable colleges,degrees and branches easily.<br>
                    To disable an item press <span class="glyphicon glyphicon-eye-close"></span> Disabled items and their sub items wouldnt be available in menus<br>
                    To enable an item press <span class="glyphicon glyphicon-eye-open"></span> Only enabled items would be available in menus<br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>College</th>
                                <th>Degree</th>
                                <th>Branches</th>
                                
                            </thead>
                            <?php $enable='<span class="glyphicon glyphicon-eye-open"></span>';
                            $disable='<span class="glyphicon glyphicon-eye-close"></span>'; ?>
                            <?php foreach ($college_details as $college): ?>
                            <tr >
                                <td>
                                    <?php    echo humanize($college['name']);

                                    if($college['valid']==1){
                                     ?>
                                    <a href="javascript:action('disable','college',<?php echo $college['id']; ?>);"><?php echo $disable;?></a>
                                    <?php }else{?>
                                    <a href="javascript:action('enable','college',<?php echo $college['id']; ?>);"><?php echo $enable;?></a>
                                    <?php }?>
                                </td>
                                <td>
                                 <?php $degid=-1; foreach ($degree_details as $degree): ?>

                                    <?php   if($degree['college_id']==$college['id']) { 
                                     echo humanize($degree['degree_name']);
                                     $degid=$degree['id']; 
                                      

                                       if($degree['valid']==1){
                                     ?>
                                    <a href="javascript:action('disable','degree',<?php echo $degree['id']; ?>);"><?php echo $disable;?></a>
                                    <?php }else{?>
                                    <a href="javascript:action('enable','degree',<?php echo $degree['id']; ?>);"><?php echo $enable;?></a>
                                     <?php } ?>
                                    <br>
                                   <?php } ?>
                               
                                 <?php endforeach ?>
                                </td>
                                <td>
                                <?php  foreach ($branch_details as $branch): ?>
                                    <?php  if($branch['college_course'] == $degid)  { echo humanize($branch['branch_name']);
                                     if($branch['valid']==1){
                                     ?>
                                    <a href="javascript:action('disable','branch',<?php echo $branch['id']; ?>);"><?php echo $disable;?></a>
                                    <?php }else{?>
                                    <a href="javascript:action('enable','branch',<?php echo $branch['id']; ?>);"><?php echo $enable;?></a>

                                    <?php } ?>
                                    <br>
                                   <?php } ?>
                                       <?php endforeach ?>
                                </td>
                               
                                
                               
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                
                </div>
               
                <br>
                <br>

                   

                <br>
                <br>
                
                <br>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
var url = '<?php echo base_url(); ?>index.php/exam/';

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
function action(type,item,id){////here
    alert('This feature is under construction');
    return false;
    var url='<?php echo base_url(); ?>index.php/exam/';
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
  function load_degree() {
    if ($("#college_addbranch").val() == "select" || $("#college_addbranch").val() == "") {
        $("#degree_addbranch").html("");
        return false;
    }
    $.ajax({
        url: url + "degree_list",
        type: 'POST',

        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            "college_id": $("#college_addbranch").val()
        },
        success: function(result) {
            $("#degree_addbranch").html(result);
        }

    });
}


</script>

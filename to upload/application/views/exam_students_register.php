<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
                <!-- <form class="form-signin"  role="form"> -->

                <?php $this->load->helper('form');
                 $this->load->helper('url');
                  echo form_open('/exam/students_register_verify', array('class' => 'form-register ', 'role' => 'form', 'id' => 'form1')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        <tr>
                            <h2 class="form-signin-heading margin_bottom_30">Register Now</h2>
                        </tr>
                        <tr>
                            All fields marked * are required
                        </tr>
                        <tr>
                            <br>
                            <br>
                        </tr>
                        <tr>
                            <td>
                                <label for="admnno">Admission Number</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="admnno" placeholder="Adimission Number" value="<?php echo set_value('admnno'); ?>" required>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label for="seccode">Security Code</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="seccode" placeholder="Security Code" value="<?php echo set_value('seccode'); ?>" required>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label for="monthyear">Academic Month/Year</label>
                            </td>
                            <td>
                            <input  class="form-control margin_bottom_10" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label for="college">College Name</label>
                            </td>
                            <td>
                                <select onchange="javascript:load_degree();"  class="form-control margin_bottom_10" name="college" id="college" required>
                                     <option class="form-control margin_bottom_10" value="select">Select College</option>                             
                                    <?php  foreach ( $clg_details as $clg_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $clg_['id'];?>"  <?php echo set_value('clg')==$clg_['id'] ?  'selected="selected"' : ''  ; ?> ><?php  echo $clg_['name'];?></option>
                                        <?php endforeach ?>
                                </select>

                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label for="degree">Degree Name</label>
                            </td>
                            <td>
                                 <select onchange="javascript:load_branches();" class="form-control margin_bottom_10" name="degree" id="degree" required>
                                 <option class="form-control margin_bottom_10">Select Degree</option>
                                 <option class="form-control margin_bottom_10">BTech</option>
                                 </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="branch">Branch Name</label>
                            </td>
                            <td> <select  class="form-control margin_bottom_10" id="branch" name="branch" required>
                                 
                                 </select>
                            </td>
                        </tr>
                        <tr>
                        <td><label for="captcha">Captcha</label></td>
                        <td>
                            
                            <?php
                            if(base_url()=="http://127.0.0.1/cusat/"){
                                $this->load->helper('captcha');
                                $vals = array(
     
                                     'img_path'  => 'captcha/',
                                     'img_url'   => base_url().'captcha/',
                                     'img_width'    => '150',
                                      'img_height' => '50',
                                       'img_width'  => '240',
                                      'expiration' => 7200
                               );

                                $cap = create_captcha($vals);
                                if($cap==FALSE)
                                       echo "<div>ERROR CREATING CAPTCHA CONTACT ADMINISTRATOR</div>";

                                $data = array(
                                    'captcha_time'  => $cap['time'],
                                   'ip_address'    => $this->input->ip_address(),
                                      'word'  => $cap['word']
                              );
                                if($cap!=FALSE){
                                $query = $this->db->insert_string('captcha', $data);
                                $this->db->query($query);
                                }
                                echo '<div class="margin_bottom_10">Submit the word you see below:</div>';
                                echo '<div class="margin_bottom_10">'.$cap['image'].'</div>';
                                echo '<input class="form-control margin_bottom_10" type="text" placeholder="Captcha" name="captcha" value="" required />';
                            
                            }else{
                               echo $recaptcha_html; 

                            
                            }


                            ?>
                        </td>
                        </tr>

                        <?php if (isset($register_form_error_msg)) if ($register_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $register_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($register_form_success_msg)) if ($register_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $register_form_success_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>
                </form>






            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
                        <?php $this->view('exam_news',$news_data); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
                        <?php $this->view('exam_login_sidebar'); ?>
                    </div>
                </div>


            </div>
        </div>


    </div>




</div>

<script type="text/javascript">
$("#form1").prop("action","javascript:load_data();");
var url='<?php echo base_url(); ?>index.php/exam/';
    function load_data () {
        
    }
    function load_degree () {
        if($("#college").val()=="select"){$("#degree").html(""); return false;}
       $.ajax({
                        url:url+"degree_list",
                        type:'POST',
                       
                        data:{
                            '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
                            "college_id" : $("#college").val()
                        },
                        success:function(result){
                            $("#degree").html(result);
                        }
                   
                    });  
    }
    function load_branches () {
       $.ajax({
                        url:url+"branch_list",
                        type:'POST',
                       
                        data:{
                            '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
                            "course_id" : $("#course").val()
                        },
                        success:function(result){
                            $("#branch").val(result)
                        }
                   
                    });  
    }
</script>

<?php
$this->load->helper('url');
$this->load->helper('array');
$this->load->helper('inflector');
?>
<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12" style="min-height:500px;">
               <div class="row">
                    <h2>Welcome, <?php echo humanize(element('name', $student_details[0]));
?></h2>
               </div>
               <br>
               <br>
               <div class="col-md-8" style="min-height:400px;">
               <div class="responsive-table">
<table class="table table-condensed text-left">
                        <tr>
                        <td>Username</td><td><?php echo element('username', $student_details[0]);
?></td>
                        </tr>
                        <tr>
                        <td>Email</td><td><?php echo element('email', $student_details[0]);
?></td>
                        </tr>
                        <tr>
                        <td>Admission Number</td><td><?php echo element('admnno', $student_details[0]);
?></td>
                        </tr>
                        <tr>
                        <td>Registration Number</td>
                        <td><?php echo element('regno', $student_details[0]);?></td>
                        </tr>
                        <tr>
                        <td><br><br><br><br></td>
                        <td><br><br><br><br></td>
                        </tr>
                        <tr>
                        <td><h3>Your profile</h3></td>
                        <td><br><br><br><br></td>
                        </tr>
                        <tr>
                        <td colspan="2"><br>
                        Admin and verified companies could view your complete details but you can restrict what other students and your friends view about you.Using this you could check how others view your profile.This option helps you to verify your privacy settings.To change what others could view about you use privacy settings under settings menu
                        <br></td>
                         </tr>
                      
                        <tr>
                          <td>View your profile as</td>
                          <td>
                            <select class="form-control margin_bottom_10" id="privacy_level" name="privacy_level" required>
                                <option class="form-control margin_bottom_10" value="self"  >Yourself</option>
                                <option class="form-control margin_bottom_10" value="classmates"  >Classmates</option>
                                <option class="form-control margin_bottom_10" value="batchmates"  >Batchmates</option>
                                <option class="form-control margin_bottom_10" value="admin"  >Admin and companies</option>
                                <option class="form-control margin_bottom_10" value="anyone"  >Others</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input class="btn btn-lg btn-primary btn-block" onclick="load_details()" type="submit" value="Go" /></td>
                        </tr>
                        </table>

                        <?php $this->load->helper('form');
                 $this->load->helper('url');
                  echo form_open('/exam/viewprofile', array('class' => 'form-register ', 'role' => 'form','method'=>'post','target'=>'_blank' ,  'id'=>'invisible_form' )); ?>

    <input id="target" name="target" type="hidden" value="newtab">
    <input id="profile_settings_check" name="profile_settings_check" type="hidden" value="true">
    <input id="type" name="type" type="hidden" value="default">
  <input id="id" name="id" type="hidden" value="<?php echo  $this->encrypt->encode(element('username', $student_details[0]).'@#$');?>">
</form>
<script type="text/javascript">

function load_details () {

   $('#type').val($('#privacy_level').val());
    $('#invisible_form').submit();
    return true;

}
</script>
               </div>
               </div>
               
               <div class="col-md-4" style="max-width:200px;">
                    <img src="<?php echo base_url();?>profile_pics/<?php echo element('pic', $student_details[0]);?>" style="max-height:200px;max-width:200px;"  class="margin_top_30">
<br /><br />
               <br>
               <?php $this->load->helper('form');
                echo form_open_multipart('exam/upload_profile_pic_student','accept="image/jpeg"');?>
<input type="file" name="userfile" />

<br /><br />
<?php if (isset($error)) if ($error !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $error; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($upload_data)) if ($upload_data !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $upload_data; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
<input class="btn btn-lg btn-primary btn-block" type="submit" value="Upload" />
               </form>
               </div>
            </div>
             <!-- <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
<?php // $this->view('exam_news'); ?>
</div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
<?php //$this->view('exam_login_sidebar'); ?>
</div>
                </div>


            </div>  -->
        </div>


    </div>




</div>



<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12">
                <!-- <form class="form-signin"  role="form"> -->

                <?php 
                $this->load->helper('form');
                 $this->load->helper('url');
                  $this->load->helper('array'); 
                if (isset($student_details[0])) {
                 $name = element('name', $student_details[0]);
                  $year_pass = element('year_pass', $student_details[0]);
                   $gender = element('gender', $student_details[0]);
                    $branch = element('branch', $student_details[0]);
                     $semester = element('semester', $student_details[0]);
                      $dob = element('dob', $student_details[0]);
                       $perm_addr = element('perm_addr', $student_details[0]); 
                       $temp_addr = element('temp_addr', $student_details[0]);
                        $mobno = element('mobno', $student_details[0]);
//                         $contactno = element('contactno', $student_details[0]); 
                         $tenth = element('tenth', $student_details[0]);
                          $twelth = element('twelth', $student_details[0]);
                           $entrance_rank = element('entrance_rank', $student_details[0]);
                            }
                             if(isset($error)) 
                                if($error==TRUE){

                                   $name = set_value('name'); 
                                   $year_pass = set_value('year_pass');
                                   $gender = set_value('gender');
                                   $branch = set_value('branch');
                                   $semester = set_value('semester');
                                    $dob = set_value('dob');
                                    $perm_addr = set_value('perm_addr');
                                    $temp_addr = set_value('temp_addr');
                                    $mobno = set_value('mobno');
//                                    $contactno = set_value('contactno');
                                    $tenth = set_value('tenth');
                                    $twelth = set_value('twelth');
                                    $entrance_rank =set_value('entrance_rank');
                                     
                                     
                                             }
     echo form_open('/exam/students_update_verify', array('class' => 'form-register', 'role' => 'form')); 
     ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        <tr>
                            <h2 class="form-signin-heading margin_bottom_30">Update your details</h2>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Name</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="name" placeholder="Name" value="<?php echo  $name; ?>" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="gender">Gender</label>
                            </td>
                            <td>
                                
                                <select class="form-control margin_bottom_10" name="gender" required>
                                <option class="form-control margin_bottom_10" value="Male"  <?php echo $gender=='Male' ?  'selected="selected"' : ''  ; ?>>Male</option>
                                <option class="form-control margin_bottom_10" value="Female"  <?php echo $gender=='Female' ?  'selected="selected"' : ''  ; ?>>Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="branch">Branch</label>
                            </td>
                            <td>
                                 <!-- <select class="form-control margin_bottom_10" name="branch" required>
                                  -->                                
                                    <?php  foreach( $branch_details as $branch_): if(  $branch==$branch_['id']){ ?>
                                       <!--  <option class="form-control margin_bottom_10" value="<?php // echo $branch_['id'];?>"  <?php //echo $branch==$branch_['name'] ?  'selected="selected"' : ''  ; ?> ><?php//  echo $branch_['name'];?></option> -->
                                        <input class="form-control margin_bottom_10" readonly="readonly" name="branch" placeholder="Branch" value="<?php echo $branch_['name']; ?>" required>
                           
                                        <?php } endforeach ?>
                                <!-- </select> --> 
                                

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="semester">Semester</label>
                            </td>
                            <td>
                                <select class="form-control margin_bottom_10" name="semester" required>
                                                                 
                                    <?php  foreach ( $semester_details as $sem_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $sem_['name'];?>"  <?php echo $semester==$sem_['name'] ?  'selected="selected"' : ''  ; ?> ><?php  echo $sem_['name'];?></option>
                                        <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="dob">Date of Birth</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="dob" placeholder="Date of Birth DD/MM/YYYY" pattern="[0-9][0-9]/[0-9][0-9]/[0-9][0-9][0-9][0-9]" value="<?php echo  $dob; ?>" required>
                            </td>
                        </tr>
                        <!--  -->
                        <tr>
                            <td>
                                <label for="perm_addr">Permanent Address</label>
                            </td>
                            <td>
                                <textarea cols="20" rows="5" class="form-control margin_bottom_10" name="perm_addr" placeholder="Permanent Address" required ><?php echo  $perm_addr; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="taddr">Current Address</label>
                            </td>
                            <td>
                                <textarea cols="20" rows="5" class="form-control margin_bottom_10" name="temp_addr" placeholder="Current Address" ><?php echo $temp_addr; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="mobno">Mobile Number</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="mobno" placeholder="Mobile Number" value="<?php echo  $mobno; ?>" required>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>
                                <label for="contactno">Contact Number</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="contactno" placeholder="Contact Number" value="<?php //echo $contactno; ?>" required>
                            </td>
                        </tr> -->
                        <tr>
                            <td>
                                <label for="tenth">SSLC or Equivalent
                                    <br>percentage</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="tenth" placeholder="Percentage" value="<?php echo  $tenth; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="twelth">Higher Secondary
                                    <br>or Equivalent percentage</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="twelth" placeholder="Percentage" value="<?php echo  $twelth; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="entrance_rank">Entrance Rank</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="entrance_rank" placeholder="Entrance Rank" value="<?php echo  $entrance_rank; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="year_pass">Year of Passing</label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" readonly="readonly" name="year_pass" placeholder="Year of passing out" value="<?php echo  $year_pass; ?>" required>
                            </td>
                        </tr>
                        <?php if (isset($update_form_error_msg)) {if ($update_form_error_msg !="" ) {?>
                        <tr>
                            <td colspan="2">
                                <div class="alert   alert-danger  alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $update_form_error_msg;?>
                                </div>
                            </td>
                        </tr>
                        <?php }}?>

                        <?php if (isset($update_form_success_msg)) {if ($update_form_success_msg !="" ) {?>
                        <tr>
                            <td colspan="2">
                                <div class="alert   alert-success  alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $update_form_success_msg;?>
                                </div>
                            </td>
                        </tr>
                        <?php }}?>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>
                </form>






            </div>
            <!--  <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
<?php //$this->view('exam_news'); ?>
</div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
<?php //$this->view('exam_login_sidebar'); ?>
</div>
                </div>


            </div> -->
        </div>


    </div>




</div>

<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>Change Password</h2>
                    <br>
                    <br>
                    <?php 
                        $this->load->helper('form');
                    echo form_open( '/exam/students_update_password', array( 'class'=>'form-register', 'role' => 'form')); ?>
                    <div class="responsive-table">
                        <table class="table table-condensed text-left">
                            
                            <tr>
                            <td>
                                <label for="password">Password</label>
                            </td>
                            <td><input type="password" AUTOCOMPLETE="off" name="password" class="form-control margin_bottom_10" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="r_password">Retype Password</label>
                            </td>
                            <td><input type="password" AUTOCOMPLETE="off" name="r_password" class="form-control margin_bottom_10" placeholder="Retype Password" value="<?php echo set_value('r_password'); ?>" required>
                            </td>
                        </tr>

                        <?php if (isset($update_form_error_msg)) if ($update_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $update_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($update_form_success_msg)) if ($update_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $update_form_success_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
                                <br>
                            </td>
                        </tr>
                        </table>
                    </div>
                    </form>
                </div>
                <div class="home_steps well text-justify noborder">
                <?php

                 $this->load->helper('url');
                  $this->load->helper('array'); 
                if (isset($student_details[0])) {
                 $privacy_profile_pic = element('privacy_profile_pic', $student_details[0]);
                  $privacy_personal = element('privacy_personal', $student_details[0]);
                   $privacy_academic = element('privacy_academic', $student_details[0]);
                    $privacy_resume = element('privacy_resume', $student_details[0]);
               }

                ?>
                    <h2>Privacy Settings</h2>
                    <br>
                    <br>
                    <h5>Admin and verified companies could view your complete details but you can restrict what other students and your friends view about you.Use view profile in your home page to verify privacy settings.</h5>
                    <br>
                    <br>
                    <?php 
                        $this->load->helper('form');
                    echo form_open( '/exam/students_update_privacy', array( 'class'=>'form-register', 'role' => 'form')); ?>
                    <div class="responsive-table">
                        <table class="table table-condensed text-left">
                            
                            <tr>
                            <td colspan="3" style="width:60%">
                                <label for="privacy_profile_pic">Who can view your Profile Picture </label>
                            </td>
                            <td>

                                <select class="form-control margin_bottom_10" name="privacy_profile_pic" required>
                                <option class="form-control margin_bottom_10" value="none"  <?php echo $privacy_profile_pic=='none' ?  'selected="selected"' : ''  ; ?>>None</option>
                                <option class="form-control margin_bottom_10" value="classmates"  <?php echo $privacy_profile_pic=='classmates' ?  'selected="selected"' : ''  ; ?>>Classmates</option>
                                <option class="form-control margin_bottom_10" value="batchmates"  <?php echo $privacy_profile_pic=='batchmates' ?  'selected="selected"' : ''  ; ?>>Batchmates</option>
                                <option class="form-control margin_bottom_10" value="anyone"  <?php echo $privacy_profile_pic=='anyone' ?  'selected="selected"' : ''  ; ?>>Anyone</option>
                                </select>
                            </td>
                        </tr>
                         <tr>
                            <td colspan="3">
                                <label for="privacy_personal">Who can view your Personal Details </label>
                            </td>
                            <td>

                                <select class="form-control margin_bottom_10" name="privacy_personal" required>
                                <option class="form-control margin_bottom_10" value="none"  <?php echo $privacy_personal=='none' ?  'selected="selected"' : ''  ; ?>>None</option>
                                <option class="form-control margin_bottom_10" value="classmates"  <?php echo $privacy_personal=='classmates' ?  'selected="selected"' : ''  ; ?>>Classmates</option>
                                <option class="form-control margin_bottom_10" value="batchmates"  <?php echo $privacy_personal=='batchmates' ?  'selected="selected"' : ''  ; ?>>Batchmates</option>
                                <option class="form-control margin_bottom_10" value="anyone"  <?php echo $privacy_personal=='anyone' ?  'selected="selected"' : ''  ; ?>>Anyone</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label for="privacy_academic">Who can view your Academic Details </label>
                            </td>
                            <td>

                                <select class="form-control margin_bottom_10" name="privacy_academic" required>
                                <option class="form-control margin_bottom_10" value="none"  <?php echo $privacy_academic=='none' ?  'selected="selected"' : ''  ; ?>>None</option>
                                <option class="form-control margin_bottom_10" value="classmates"  <?php echo $privacy_academic=='classmates' ?  'selected="selected"' : ''  ; ?>>Classmates</option>
                                <option class="form-control margin_bottom_10" value="batchmates"  <?php echo $privacy_academic=='batchmates' ?  'selected="selected"' : ''  ; ?>>Batchmates</option>
                                <option class="form-control margin_bottom_10" value="anyone"  <?php echo $privacy_academic=='anyone' ?  'selected="selected"' : ''  ; ?>>Anyone</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label for="privacy_resume">Who can view your Resume </label>
                            </td>
                            <td>

                                <select class="form-control margin_bottom_10" name="privacy_resume" required>
                                <option class="form-control margin_bottom_10" value="none"  <?php echo $privacy_resume=='none' ?  'selected="selected"' : ''  ; ?>>None</option>
                                <option class="form-control margin_bottom_10" value="classmates"  <?php echo $privacy_resume=='classmates' ?  'selected="selected"' : ''  ; ?>>Classmates</option>
                                <option class="form-control margin_bottom_10" value="batchmates"  <?php echo $privacy_resume=='batchmates' ?  'selected="selected"' : ''  ; ?>>Batchmates</option>
                                <option class="form-control margin_bottom_10" value="anyone"  <?php echo $privacy_resume=='anyone' ?  'selected="selected"' : ''  ; ?>>Anyone</option>
                                </select>
                            </td>
                        </tr>
                        <?php if (isset($privacy_form_error_msg)) if ($privacy_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="4">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $privacy_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($privacy_form_success_msg)) if ($privacy_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="4">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $privacy_form_success_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
                                <br>
                            </td>
                        </tr>
                        </table>
                        </div>
                        </form>
                    
                </div>
            </div>

        </div>


    </div>




</div>

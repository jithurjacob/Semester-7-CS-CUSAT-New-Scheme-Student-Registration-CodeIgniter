<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
                <!-- <form class="form-signin"  role="form"> -->

                <?php $this->load->helper('form');
                 $this->load->helper('url');
                  echo form_open('/exam/students_register_verify', array('class' => 'form-register ', 'role' => 'form')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        <tr>
                            <h2 class="form-signin-heading margin_bottom_30">Register Now</h2>
                        </tr>
                        <tr>
                            All fields are required
                        </tr>
                        <tr>
                            <br>
                            <br>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Name</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label  for="username">User Name</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">Email</label>
                            </td>
                            <td><input type="email" class="form-control margin_bottom_10" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
                            </td>
                        </tr>
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
                        <tr>
                            <td>
                                <label for="branch">Branch</label>
                            </td>
                            <td>
                                <select class="form-control margin_bottom_10" name="branch" required>
                                                                 
                                    <?php  foreach ( $branch_details as $branch_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $branch_['id'];?>"  <?php echo set_value('branch')==$branch_['id'] ?  'selected="selected"' : ''  ; ?> ><?php  echo $branch_['name'];?></option>
                                        <?php endforeach ?>
                                </select>

                            </td>
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
                                <label for="regno">Registration Number</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="regno" placeholder="Registration Number" value="<?php echo set_value('regno'); ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="year_pass">Year of Passing</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="year_pass" placeholder="Year of passing out" value="<?php echo set_value('year_pass'); ?>" required>
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

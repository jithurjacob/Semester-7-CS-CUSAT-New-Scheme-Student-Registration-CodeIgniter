<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
      <!-- <form class="form-signin"  role="form"> -->

<?php
$this->load->helper('form');
$this->load->helper('url');
echo form_open('/exam/students_register_verify', array('class' => 'form-register ', 'role' => 'form'));
?>


    <h2 class="form-signin-heading margin_bottom_30">Register Now</h2>
    <input class="form-control margin_bottom_10" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>" required>
    <input class="form-control margin_bottom_10" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required>
    <input type="email" class="form-control margin_bottom_10" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
    <input type="password" name="password" class="form-control margin_bottom_10" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
    <input type="password" name="r_password" class="form-control margin_bottom_10" placeholder="Retype Password" value="<?php echo set_value('r_password'); ?>" required>
    <input class="form-control margin_bottom_10" name="admnno" placeholder="Adimission Number" value="<?php echo set_value('admnno'); ?>" required>
    <input class="form-control margin_bottom_10" name="regno" placeholder="Registration Number" value="<?php echo set_value('regno'); ?>" required>
    <input class="form-control margin_bottom_10" name="year_pass" placeholder="Year of passing out" value="<?php echo set_value('year_pass'); ?>" required>
<?php
if(isset($register_form_error_msg))
if ($register_form_error_msg != "") {
?>
    <div   class = "alert   alert-danger  alert-dismissable" >
    <button type="button" class="close"   data-dismiss="alert"   aria-hidden="true" > &times; </button>
    <?php
    echo $register_form_error_msg; ?>
</div>

<?php
} ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <br>
    
</form>





                
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
                       <?php
$this->view('exam_news'); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
                         <?php
$this->view('exam_login_sidebar'); ?>
                    </div>
                </div>


            </div>
        </div>


    </div>




</div>



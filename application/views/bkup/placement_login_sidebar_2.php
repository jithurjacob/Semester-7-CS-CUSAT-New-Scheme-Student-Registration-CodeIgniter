<!-- <form class="form-signin"  role="form"> -->

<?php
$this->load->helper('form');
$this->load->helper('url');
echo form_open('exam/loginverify', array('class' => 'form-signin', 'role' => 'form'));
?>


    <h2 class="form-signin-heading">Please sign in</h2>
    
           <input class="form-control margin_bottom_10" name="username" placeholder="Username" >
    <input type="password" name="password" class="form-control margin_bottom_10" placeholder="Password" >
<?php
if(isset($login_form_error_msg))
if ($login_form_error_msg != "") {
?>
    <div   class = "alert   alert-danger  alert-dismissable" >
    <button type="button" class="close"   data-dismiss="alert"   aria-hidden="true" > &times; </button>
    <?php
    echo $login_form_error_msg; ?>
</div>

<?php
} ?>

<?php
echo anchor('/exam/home/forgotpassword', 'Forgot Password', 'class="pull-left margin_bottom_10 linktext"'); ?>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <br>
    <div class="text-center">OR</div>
    <div class="register">
        <h4>Register Now</h4>
        <div>
        <!-- <ul class="block">
            <li class="pull-left text-left inline linktext">
 -->                <?php
echo anchor('/exam/students/register', 'Student', 'class="pull-left linktext"'); ?>
<!--             </li>
            <li class="pull-right text-right inline linktext"> -->
                <?php
echo anchor('/exam/company/register', 'Company', 'class="pull-right linktext"'); ?>
            <!-- </li>
        </ul> -->
        </div>
    </div>
</form>

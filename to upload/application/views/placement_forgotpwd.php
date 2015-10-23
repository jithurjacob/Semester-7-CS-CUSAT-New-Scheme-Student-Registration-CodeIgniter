<div class="middle">
    <div class="container">
        <div class="row about">
            <div class="col-md-12">
                <?php
                $this->load->helper('form');
                $this->load->helper('url');
                echo form_open('/exam/forgot_pwd', array('class' => 'form-register ', 'role' => 'form')); ?>
                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        <tr>

                        <h2 class="form-signin-heading margin_bottom_30">Forgot Password</h2>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Enter your registerd Email address</label>
                            </td>
                            <td>
                                <input type="email" class="form-control margin_bottom_10" name="email" placeholder="Enter your Email" required>
                            </td>
                        </tr>


                        <?php if (isset($forgotpwd_form_error_msg)) if ($forgotpwd_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $forgotpwd_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($forgotpwd_form_success_msg)) if ($forgotpwd_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $forgotpwd_form_success_msg; ?>
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
            </div>
        </div>
    </div>
</div>

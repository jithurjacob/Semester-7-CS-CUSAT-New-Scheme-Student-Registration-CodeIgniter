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
                    echo form_open( '/exam/company_update_password', array( 'class'=>'form-register', 'role' => 'form')); ?>
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
                
            </div>

        </div>


    </div>




</div>

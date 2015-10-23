<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
                <div class="home_steps well text-justify noborder">
                    
                    <h3>Download Registration Form</h3>
                     <?php
                $this->load->helper('form');
                $this->load->helper('url');
                echo form_open('/exam/students_register_verify', array('class' => 'form-register ', 'role' => 'form', 'id' => 'form1', 'style' => 'margin-left:20%;margin-right:20%;width:60%;', 'target'=>'_blank'));
                ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        
                        
                        <tr>
                        <br>
                        <br>
                        </tr>
                        <tr>
                            <td width="150px">
                                <label for="admnno">Admission Number<sup>*</sup>
                                </label>
                            </td>
                            <td width="250px">
                                <input type="number" class="form-control margin_bottom_10" name="admnno" id="admnno" placeholder="Admission Number"  required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="securitycode">Security Code<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="securitycode" id="securitycode" placeholder="Security Code"  required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hash">Print Hash<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <input class="form-control margin_bottom_10" name="hash" id="hash" placeholder="Print Hash"  required>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2">
                                <div id="result"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" id="button1" type="submit">Download</button>
                                
                                <br>
                            </td>
                        </tr>

                    </table>



                </div>
                </form>

                    <br>
                    
                    <br>
                </div>
                <div class="home_steps well text-justify noborder">
                   
                    
                    <h3>Download Exam Registration Form</h3>
                    
                    <br>
                    
                    <br>
                </div>
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
    $("#form1").prop("action", "javascript:load_data();");
    var url = '<?php echo base_url(); ?>index.php/exam/';
    function load_data () {
      var admnno = $("#admnno").val();
      var hash = $("#hash").val();
        var securitycode = $("#securitycode").val();
        if (admnno <= 0 || admnno == "")
            alert("Enter correct Admission number");
        else if (securitycode == "")
            alert("Enter correct security code");
        else if (hash == "")
            alert("Enter correct hash");
        else{
            $("#form1").prop("action", "<?php echo base_url();?>index.php/exam/download_registerform");
            $("form1").submit();
        }

            
    }
    function success (argument) {
        return '<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Registration successful... Registration ID :'+argument+'</div>';
        //Automatically redirecting you to home page in 5<script>setTimeout(function (){window.location=(\"<?php echo base_url();?>\");}, 5000);<\/script> seconds or <a href=\"<?php echo base_url();?>\">click here</a>
    }
    function failure (argument) {
        return '<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Download  failed...  '+argument+' </div>';

    }
</script>



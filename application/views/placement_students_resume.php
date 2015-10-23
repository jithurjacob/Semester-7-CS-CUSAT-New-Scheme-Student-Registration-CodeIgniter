<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>Resume</h2>
                    <br>
                    <br>
                    <?php $this->load->helper('array'); if (isset($student_details)) if (element('resume', $student_details[0]) != NULL) { ?>
                    <object data="<?php     echo base_url() . 'resume/' . element('resume', $student_details[0]);; ?>" type="application/pdf" width="100%" height="1000px">
                        alt:<a href="<?php     echo base_url() . 'resume/resume.pdf'; ?>">Download PDF</a>
                    </object>
                    <?php } else echo "<h4>Upload your resume</h4>"; ?>
                </div>
                <div class="home_steps well text-justify noborder">
                    <h2>Upload Resume</h2>
                    <br>
                    <br>
                    <?php $this->load->helper('form'); 
                    echo form_open_multipart('exam/upload_resume_student',array( 'class'=>'form-register', 'role' => 'form', 'accept="application/pdf"' )); ?>
                    <h4>Select your resume : </h4>
                    <input type="file" name="userfile" />
                    
                    <br />
                    <br />
                    <?php if (isset($error)) if ($error !="" ) { ?>
                    <tr>
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $error; ?>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if (isset($upload_data)) if ($upload_data !="" ) { ?>
                    <tr>
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $upload_data; ?>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upload" />
                    </form>
                </div>
            </div>

        </div>


    </div>




</div>

<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-9">
                <!-- <form class="form-signin"  role="form"> -->

                <?php
                $this->load->helper('form');
                $this->load->helper('url');
                echo form_open('/exam/students_register_verify', array('class' => 'form-register ', 'role' => 'form', 'id' => 'form1', 'style' => 'margin-left:20%;margin-right:20%;width:60%;', 'enctype' => "multipart/form-data"));
                ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        <tr>
                        <h2 class="form-signin-heading margin_bottom_30">Register Now</h2>
                        </tr>
                        <tr>
                            All fields marked * are required
                        </tr>
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
                                <label for="year">Academic Month/Year<sup>*</sup>
                                </label>
                            </td>
                            <td>

                                <select required="required" class="form-control margin_bottom_10" id="month" name="month">
                                    <option value="select">Select Month</option>
                                    <option value="July">July</option>
                                </select>
                                <select required="required" id="year" name="year" class="form-control margin_bottom_10">
                                    <option value="select">Select Year</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="college">College Name<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <select onchange="javascript:load_degree();" class="form-control margin_bottom_10" name="college" id="college" required>
                                    <option class="form-control margin_bottom_10" value="select">Select College</option>
                                    <?php foreach ($clg_details as $clg_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php echo $clg_['id']; ?>" <?php echo set_value('clg') == $clg_['id'] ? 'selected="selected"' : ''; ?> >
                                            <?php echo $clg_['name']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="degree">Degree Name<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <select onchange="javascript:load_branches();" class="form-control margin_bottom_10" name="degree" id="degree" required>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="branch">Branch Name<sup>*</sup>
                                </label>
                            </td>
                            <td>
                                <select class="form-control margin_bottom_10" id="branch" name="branch" required>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <label for="email">Email Address<sup>*</sup>
                                </label>
                            </td>
                            <td >
                                <input class="form-control margin_bottom_10" name="email" id="email" placeholder="Email Address" required  >
                            </td>
                        </tr>

                        <!-- values to add-->

                        <tr class="step2">
                            <td>
                                <label for="name">Student Name<sup>*</sup>
                                </label>
                            </td>
                            <td > <input class="form-control margin_bottom_10" name="name" id="name"placeholder="Student Name"  >

                            </td>
                        </tr>
                        <tr class="step2">
                            <td>
                                <label for="sem">Semester<sup>*</sup>
                                </label>
                            </td>
                            <td>

                                <select required="required" id="sem" name="sem" class="form-control margin_bottom_10">
                                    <option value="select">Select Semester</option>
                                    <option value="2">1&amp;2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>

                            </td>
                        </tr>

                        <tr class="step2">
                            <td >
                                <label for="dob">Date of Birth<sup>*</sup>
                                </label>
                            </td>
                            <td ><input class="form-control margin_bottom_10" name="dob" type="date" id="dob"placeholder="Date of Birth"  >

                            </td>
                        </tr>
                        <tr class="step2">
                            <td >
                                <label for="age">Age<sup>*</sup>
                                </label>
                            </td>
                            <td >
                                <input class="form-control margin_bottom_10" name="age" type="number" id="age"placeholder="Student Age"  >
                            </td>
                        </tr>
                        <tr class="step2">
                            <td >
                                <label for="gender">Gender<sup>*</sup>  </label>
                            </td>
                            <td>
                                <select class="form-control margin_bottom_10" id="gender" name="gender" >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="step2">
                            <td >
                                <label for="nationality">Nationality<sup>*</sup>
                                </label>
                            </td>
                            <td ><select class="form-control margin_bottom_10" id="nationality" name="nationality">
                                    <option value="indian">Indian</option>
                                    <option value="other">Others</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="step2">
                            <td >
                                <label for="curraddr">Current Address<sup>*</sup>
                                </label>
                            </td>
                            <td ><textarea class="form-control margin_bottom_10" name="curraddr"  id="curraddr"placeholder="Current Address"  ></textarea>
                            </td>
                        </tr>
                        <tr class="step2">
                            <td >
                                <label for="permaddr">Permanent Address<sup>*</sup>
                                </label>
                            </td>
                            <td ><textarea class="form-control margin_bottom_10" name="permaddr"  id="permaddr" placeholder="Permanent Address"  ></textarea>
                            </td>
                        </tr>

                        <tr class="step2">
                            <td >
                                <label for="mobno">Mobile Number<sup>*</sup>
                                </label>
                            </td>
                            <td >
                                <input class="form-control margin_bottom_10" name="mobno" type="number" id="mobno"placeholder="Mobile Number"  >
                            </td>
                        </tr>

                        <tr class="step2">
                            <td >
                                <label for="guardname">Father/Guardian Name<sup>*</sup>
                                </label>
                            </td>
                            <td width="400px">
                                <input class="form-control margin_bottom_10" name="guardname" id="guardname"placeholder="Father/Guardian Name"  >
                            </td>
                        </tr>
                        <tr class="step2">
                            <td >
                                <label for="caste">Caste<sup>*</sup>
                                </label>
                            </td>
                            <td width="400px"><input class="form-control margin_bottom_10" name="caste" id="caste"placeholder="Caste"  >
                            </td>
                        </tr>


                        <tr class="step2">
                            <td >
                                <label for="pic">Photograph<sup>*</sup>
                                </label>
                            </td>
                            <td >

                                <div id="image_preview_pic">
                                    <img id="previewing_pic" src="<?php echo base_url(); ?>css/images/noimage.png" />
                                    <img id="previewing_pic_hidden" style="display:none" src="<?php echo base_url(); ?>css/images/noimage.png" />
                                </div> 
                                <hr id="line">    
                                <div id="selectImage_pic">
                                    <label>Select Your Image</label><br/>
                                    <input type="file" name="pic" id="pic"  />

                                </div> 

                                <div id="message_pic">          
                                </div>
                            </td>
                        </tr>
                        <tr class="step2">
                            <td >
                                <label for="sign">Signature<sup>*</sup>
                                </label>
                            </td>
                            <td >

                                <div id="image_preview_sign">
                                    <img id="previewing_sign" src="<?php echo base_url(); ?>css/images/noimage.png" />
                                    <img id="previewing_sign_hidden" style="display:none" src="<?php echo base_url(); ?>css/images/noimage.png" />
                                </div> 
                                <hr id="line">    
                                <div id="selectImage_sign">
                                    <label>Select Your Image</label><br/>
                                    <input type="file" name="sign" id="sign"  />

                                </div> 

                                <div id="message_sign">          
                                </div>
                            </td>
                        </tr>


                        <!-- end -->
                        <tr class="step2">
                            <td>
                                <label for="captcha">Captcha<sup>*</sup>
                                </label>
                            </td>
                            <td>

                                <?php
                                if (base_url() == "http://127.0.0.1/cusat/") {
                                    $this->load->helper('captcha');
                                    $vals = array('img_path' => 'captcha/', 'img_url' => base_url() . 'captcha/', 'img_width' => '150', 'img_height' => '50', 'img_width' => '240', 'expiration' => 7200);
                                    $cap = create_captcha($vals);
                                    if ($cap == FALSE)
                                        echo "
                                <div>ERROR CREATING CAPTCHA CONTACT ADMINISTRATOR</div>";
                                    $data = array('captcha_time' => $cap['time'], 'ip_address' => $this->input->ip_address(), 'word' => $cap['word']);
                                    if ($cap != FALSE) {
                                        $query = $this->db->insert_string('captcha', $data);
                                        $this->db->query($query);
                                    } echo '
                                <div class="margin_bottom_10">Submit the word you see below:</div>';
                                    echo '
                                <div class="margin_bottom_10">' . $cap['image'] . '</div>';
                                    echo '
                                <input class="form-control margin_bottom_10" type="text" placeholder="Captcha" name="captcha" id="captcha" value=""  />';
                                } else {
                                    echo $recaptcha_html;
                                }
                                ?>
                            </td>
                        </tr>

                        <?php if (isset($register_form_error_msg)) if ($register_form_error_msg != "") { ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="alert   alert-danger  alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <?php echo $register_form_error_msg; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php if (isset($register_form_success_msg)) if ($register_form_success_msg != "") { ?>
                                <tr >
                                    <td colspan="2">
                                        <div class="alert   alert-success  alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <?php echo $register_form_success_msg; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <tr >
                            <td colspan="2">
                                <div id="result"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" id="button1" type="submit">Register</button>
                                <button class="btn btn-lg btn-primary btn-block" id="button2" onclick="javascript:return  edit()" >Edit Data</button>
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
                        <?php $this->view('exam_news', $news_data); ?>

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
    $(".step2 , #button2").hide();
    var url = '<?php echo base_url(); ?>index.php/exam/';

    function register() {
        var admnno = $("#admnno").val();
        var securitycode = $("#securitycode").val();
        var month = $("#month").val();
        var year = $("#year").val();
        var college = $("#college").val();
        var degree = $("#degree").val();
        var branch = $("#branch").val();
        var email = $("#email").val();

        var name = $("#name").val();
        var sem = $("#sem").val();
        var dob = $("#dob").val();
        var age = $("#age").val();
        var gender = $("#gender").val();
        var nationality = $("#nationality").val();
        var curraddr = $("#curraddr").val();
        var permaddr = $("#permaddr").val();
        var mobno = $("#mobno").val();
        var guardname = $("#guardname").val();
        var caste = $("#caste").val();
        var captcha = $("#captcha").val();
        var pic = $("#previewing_pic").attr("src");
        var sign = $("#previewing_sign").attr("src");
        
        $.ajax({
                url: url + "students_register_add",
                type: 'POST',
                
                data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                    "admnno": admnno,
                    "securitycode": securitycode,
                    "month": month,
                    "year": year,
                    "college": college,
                    "degree": degree,
                    "branch": branch,
                    "email": email,
                    "name":name,
                    "sem":sem,
                    "dob":dob,
                    "age":age,
                    "gender":gender,
                    "nationality":nationality,
                    "curraddr":curraddr,
                    "permaddr":permaddr,
                    "mobno":mobno,
                    "guardname":guardname,
                    "caste":caste,
                    "captcha":captcha,
                    "pic":pic,
                    "sign":sign

                },
                success: function (result) {
                  result=  result.split(";");
                  alert(result);
                  alert(result[0]+":::"+result[1]);
                    if (result[0] == "ok") 
                       
                        $('#result').html(success(result[1]));
                    
                    else if (result[0] == "not ok")
                       
                        $('#result').html(failure(result[1]));
                    
                   
                    
                }

            });
    }
    function success (argument) {
        return '<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Registration successful... Registration ID :'+argument+'</div>';
        //Automatically redirecting you to home page in 5<script>setTimeout(function (){window.location=(\"<?php echo base_url();?>\");}, 5000);<\/script> seconds or <a href=\"<?php echo base_url();?>\">click here</a>
    }
    function failure (argument) {
        return '<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Registration failed...  '+argument+' </div>';

    }
    function edit() {
        
        $("#name , #sem , #dob , #age , #gender , #nationality , #curraddr , #permaddr , #mobno , #guardname , #caste , #captcha , #pic , #sign").prop("disabled", false);
        $("#form1").prop("action", "javascript:students_register();");
        $("#button2").hide();
        $('#button1').text('Register');
        return false;
       
    }
    function students_register() {
       
        var admnno = $("#admnno").val();
        var securitycode = $("#securitycode").val();
        var month = $("#month").val();
        var year = $("#year").val();
        var college = $("#college").val();
        var degree = $("#degree").val();
        var branch = $("#branch").val();
        var email = $("#email").val();

        var name = $("#name").val();
        var sem = $("#sem").val();
        var dob = $("#dob").val();
        var age = $("#age").val();
        var gender = $("#gender").val();
        var nationality = $("#nationality").val();
        var curraddr = $("#curraddr").val();
        var permaddr = $("#permaddr").val();
        var mobno = $("#mobno").val();
        var guardname = $("#guardname").val();
        var caste = $("#caste").val();
        var captcha = $("#captcha").val();
        var pic = $("#previewing_pic").attr("src");
        var sign = $("#previewing_sign").attr("src");
        var pic_h = $("#previewing_pic_hidden").prop("height");
        var pic_w = $("#previewing_pic_hidden").prop("width");
        var sign_h = $("#previewing_sign_hidden").prop("height");
        var sign_w = $("#previewing_sign_hidden").prop("width");
        var pic = $("#pic").val();
        var sign = $("#sign").val();

        if (admnno <= 0 || admnno == "")
            alert("Enter correct Admission number");
        else if (securitycode == "")
            alert("Enter correct security code");
        else if (month == "" || month == "select")
            alert("Enter correct Month");
        else if (year == "" || year == "select")
            alert("Enter correct Year");
        else if (college == "" || college == "select")
            alert("Enter correct college");
        else if (degree == "" || degree == "select")
            alert("Enter correct degree");
        else if (branch == "" || branch == "select")
            alert("Enter correct branch");
        else if (email == "")
            alert("Enter correct email");
        else if (name == "")
            alert("Enter correct name");
        else if (sem == "" || sem == "select")
            alert("Enter correct sem");
        else if (dob == "")
            alert("Enter correct dob");
        else if (age == "" || age<=0 || age >100)
            alert("Enter correct age");
        else if (gender == "")
            alert("Enter correct gender");
        else if (nationality == "")
            alert("Enter correct nationality");
        else if (curraddr == "")
            alert("Enter correct current address");
        else if (permaddr == "")
            alert("Enter correct permanent address");
        else if (mobno == "" || mobno.length!=10)
            alert("Enter correct mobno");
        else if (guardname == "")
            alert("Enter correct guardian name");
        else if (caste == "")
            alert("Enter correct caste");
        else if (captcha == "")
            alert("Enter correct captcha");
        else if (pic == "")
            alert("Enter correct pic");
        else if (sign == "")
            alert("Enter correct sign");
        else if (pic_w < 120 || pic_w > 400)
            alert("Photograph width must be between 120px and 400px ");
        else if (pic_h < 150 || pic_h > 550)
            alert("Photograph height must be between 150px and 550px ");
        else if (sign_w < 120 || sign_w > 400)
            alert("Signature width must be between 120px and 400px ");
        else if (sign_h < 10 || sign_h > 250)
            alert("Signature height must be between 10px and 250px ");
        else {
            alert("Please verify your data before submitting data");
            
            $("#admnno , #securitycode , #month , #year , #college , #degree , #branch , #email ,  #name , #sem , #dob , #age , #gender , #nationality , #curraddr , #permaddr , #mobno , #guardname , #caste , #captcha , #pic , #sign").prop("disabled", true);
            $('#button2').show();
            $('#button1').text('Complete Registration');
            $("#form1").prop("action", "javascript:register();");
        }


    }
    function load_data() {
        var admnno = $("#admnno").val();
        var securitycode = $("#securitycode").val();
        var month = $("#month").val();
        var year = $("#year").val();
        var college = $("#college").val();
        var degree = $("#degree").val();
        var branch = $("#branch").val();
        var email = $("#email").val();
        if (admnno <= 0 || admnno == "")
            alert("Enter correct Admission number");
        else if (securitycode == "")
            alert("Enter correct security code");
        else if (month == "" || month == "select")
            alert("Enter correct Month");
        else if (year == "" || year == "select")
            alert("Enter correct Year");
        else if (college == "" || college == "select")
            alert("Enter correct college");
        else if (degree == "" || degree == "select")
            alert("Enter correct degree");
        else if (branch == "" || branch == "select")
            alert("Enter correct branch");
        else if (email == "")
            alert("Enter correct email");
        else
            $.ajax({
                url: url + "students_register_loaddata",
                type: 'POST',
                dataType: 'json',
                data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                    "admnno": admnno,
                    "securitycode": securitycode,
                    "month": month,
                    "year": year,
                    "college": college,
                    "degree": degree,
                    "branch": branch,
                    "email": email
                },
                success: function (result) {
                    

                    if (result.valid == "false")
                        $('#result').html(failure(result.msg));
                    else {
                        $("#admnno").prop("disabled", "disabled");
                        $("#securitycode").prop("disabled", "disabled");
                        $("#month").prop("disabled", "disabled");
                        $("#year").prop("disabled", "disabled");
                        $("#college").prop("disabled", "disabled");
                        $("#degree").prop("disabled", "disabled");
                        $("#branch").prop("disabled", "disabled");
                        $("#email").prop("disabled", "disabled");
                        $("#name").val(result.name);
                        $(".step2").slideDown();
                        $("#form1").prop("action", "javascript:students_register();");
                    }
                }

            });


    }

    function load_degree() {
        if ($("#college").val() == "select" || $("#college").val() == "") {
            $("#degree , #branch").html("");
            return false;
        }
        $.ajax({
            url: url + "degree_list",
            type: 'POST',
            data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                "college_id": $("#college").val()
            },
            success: function (result) {
                $("#degree").html(result);
            }

        });
    }

    function load_branches() {
        if ($("#college").val() == "select" || $("#college").val() == "" || $("#degree").val() == "select" || $("#degree").val() == "") {
            $("#branch").html("");
            return false;

        }

        $.ajax({
            url: url + "branch_list",
            type: 'POST',
            data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                "course_id": $("#degree").val()
            },
            success: function (result) {
                $("#branch").html(result);

            }

        });
    }
</script>


<script type="text/javascript">
    $(document).ready(function (e) {//alert(1);


// Function to preview image

        $("#pic").change(function () {//alert(0);
            $("#message_pic").empty();         // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) ))
            {
                $('#previewing_pic').attr('src', '<?php echo base_url(); ?>css/images/noimage.png');
                $("#message_pic").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg and jpg Images type allowed</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded_pic;
                reader.readAsDataURL(this.files[0]);

            }
        });

        $("#sign").change(function () {//alert(0);
            $("#message_sign").empty();         // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;

            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
            {
                $('#previewing_sign').attr('src', '<?php echo base_url(); ?>css/images/noimage.png');
                $("#message_sign").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded_sign;
                reader.readAsDataURL(this.files[0]);
            }
        });
        function imageIsLoaded_pic(e) { //alert(3);
            $("#pic").css("color", "green");
            $('#image_preview_pic').css("display", "block");
            $('#previewing_pic').attr('src', e.target.result);
            $('#previewing_pic_hidden').attr('src', e.target.result);
            $('#previewing_pic').css('max-width', '400px');
            $('#previewing_pic').css('max-height', '550px');
        }
        ;
        function imageIsLoaded_sign(e) { //alert(3);
            $("#sign").css("color", "green");
            $('#image_preview_sign').css("display", "block");
            $('#previewing_sign').attr('src', e.target.result);
            $('#previewing_sign_hidden').attr('src', e.target.result);
            $('#previewing_sign').css('max-width', '400px');
            $('#previewing_sign').css('max-height', '250px');
        }
        ;
    });

</script>
